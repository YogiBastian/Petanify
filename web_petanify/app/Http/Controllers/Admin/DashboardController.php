<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Untuk pertama kali load dashboard view
    public function index()
    {
        // Total pengguna
        $totalPetani = User::where('role', 'petani')->count();
        $totalPembeli = User::where('role', 'pembeli')->count();
        $totalUsers = $totalPetani + $totalPembeli;

        // Statistik forum
        $totalPosts = Post::count();
        $totalComments = Comment::count();

        // Persentase pengguna
        $totalPetaniPercentage = $totalUsers > 0 ? round(($totalPetani / $totalUsers) * 100) : 0;
        $totalPembeliPercentage = $totalUsers > 0 ? round(($totalPembeli / $totalUsers) * 100) : 0;

        return view('admin.dashboard', [
            'totalPetani' => $totalPetani,
            'totalPembeli' => $totalPembeli,
            'totalUsers' => $totalUsers,
            'totalPetaniPercentage' => $totalPetaniPercentage,
            'totalPembeliPercentage' => $totalPembeliPercentage,
            'totalPosts' => $totalPosts,
            'totalComments' => $totalComments,
        ]);
    }

    // Untuk ambil data realtime via fetch (dipakai di JS frontend)
    public function data()
    {
        // Total pengguna
        $totalPetani = User::where('role', 'petani')->count();
        $totalPembeli = User::where('role', 'pembeli')->count();
        $totalUsers = $totalPetani + $totalPembeli;

        // Statistik forum
        $totalPosts = Post::count();
        $totalComments = Comment::count();

        // Persentase
        $totalPetaniPercentage = $totalUsers > 0 ? round(($totalPetani / $totalUsers) * 100) : 0;
        $totalPembeliPercentage = $totalUsers > 0 ? round(($totalPembeli / $totalUsers) * 100) : 0;

        // Top 10 petani teraktif berdasarkan jumlah post
        $topPetani = User::withCount('posts')
            ->where('role', 'petani')
            ->orderByDesc('posts_count')
            ->limit(10)
            ->get(['id', 'name']);

        $topPetaniData = $topPetani->map(function ($user) {
            return [
                'name' => $user->name,
                'total_posts' => $user->posts_count,
            ];
        });

        // Statistik penjualan (order dengan status 'selesai', dikelompokkan per bulan)
        $salesRaw = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->where('status', 'selesai') // Sesuaikan jika nama status berbeda
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $salesLabels = [];
        $salesTotals = [];

        foreach ($salesRaw as $item) {
            $salesLabels[] = \Carbon\Carbon::create()->month($item->month)->format('F');
            $salesTotals[] = $item->total;
        }

        return response()->json([
            'totalPetani' => $totalPetani,
            'totalPembeli' => $totalPembeli,
            'totalPosts' => $totalPosts,
            'totalComments' => $totalComments,
            'totalPetaniPercentage' => $totalPetaniPercentage,
            'totalPembeliPercentage' => $totalPembeliPercentage,
            'topPetani' => $topPetaniData,
            'salesData' => [
                'labels' => $salesLabels,
                'values' => $salesTotals,
            ],
        ]);
    }
}
