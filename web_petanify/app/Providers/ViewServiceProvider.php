use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

public function boot()
{
    View::composer('partials.navigation', function ($view) {
        $cartCount = 0;
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'petani' && method_exists($user, 'keranjangPetani')) {
                $cartCount = $user->keranjangPetani()->count();
            } elseif ($user->role === 'pembeli' && method_exists($user, 'keranjangPembeli')) {
                $cartCount = $user->keranjangPembeli()->count();
            }
        }

        $view->with('cartCount', $cartCount);
    });
}
