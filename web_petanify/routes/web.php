<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Petani\ForumController as PetaniForumController;
use App\Http\Controllers\Petani\PostController as PetaniPostController;
use App\Http\Controllers\Pembeli\ForumController as PembeliForumController;
use App\Http\Controllers\Pembeli\PostController as PembeliPostController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Petani\MarketplaceController as PetaniMarketplaceController;
use App\Http\Controllers\Admin\MarketplaceController as AdminMarketplaceController;
use App\Http\Controllers\Pembeli\ArtikelController as PembeliArtikelController;
use App\Http\Controllers\Petani\ProdukController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Petani\OrderController;
use App\Http\Controllers\Petani\ProductController;
use App\Http\Controllers\Pembeli\DashboardController;
use App\Http\Controllers\Petani\ReviewController;
use App\Http\Middleware\IsPetani;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsPembeli;
use App\Models\Forum;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Halaman Publik
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'petani') {
            return redirect()->route('petani.dashboard');
        } elseif ($user->role == 'pembeli') {
            return redirect()->route('pembeli.dashboard');
        }
    }
    return view('welcome');
});



/*
|--------------------------------------------------------------------------
| Dashboard Default (untuk user yang verified)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role == 'petani') {
        return redirect()->route('petani.dashboard');
    } elseif ($user->role == 'pembeli') {
        return redirect()->route('pembeli.dashboard');
    }
    return abort(403, 'Role tidak dikenal');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profil User (semua role)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/petani/{id}/etalase', [ProductController::class, 'etalase'])->name('petani.etalase');
       
});

/*
|--------------------------------------------------------------------------
| Route Khusus Role: PETANI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsPetani::class])
    ->prefix('petani')
    ->name('petani.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('petani.dashboard');
        })->name('dashboard');

        Route::get('/forum', [PetaniForumController::class, 'index'])->name('forum.index');
        Route::post('/forum/post', [PetaniPostController::class, 'store'])->name('post.store');
        Route::post('/forum/comment/{postId}', [PetaniPostController::class, 'storeComment'])->name('comment.store');
        Route::get('/forum/{id}', [PetaniForumController::class, 'show'])->name('forum.show');

        Route::get('/marketplace', [PetaniMarketplaceController::class, 'index'])->name('marketplace.index');
        Route::get('/dashboard', [\App\Http\Controllers\Petani\DashboardController::class, 'index'])->name('dashboard');
        Route::get('produk/{id}', [\App\Http\Controllers\Petani\ProductController::class, 'show'])->name('produk.show');
        Route::resource('kelola-produk', App\Http\Controllers\Petani\KelolaProdukController::class);

        Route::get('/petani/produk/{id}', [\App\Http\Controllers\Petani\ProductController::class, 'show'])->name('petani.produk.show');
        Route::get('petani/marketplace', [\App\Http\Controllers\Petani\MarketplaceController::class, 'index'])->name('petani.marketplace.index');
        Route::get('/keranjang', [\App\Http\Controllers\Petani\KeranjangController::class, 'index'])->name('keranjang');
        Route::post('/keranjang/update', [\App\Http\Controllers\Petani\KeranjangController::class, 'update'])->name('keranjang.update');
        Route::post('/cart/add', [\App\Http\Controllers\Petani\KeranjangController::class, 'add'])->name('cart.add');
         Route::post('/keranjang/update', [\App\Http\Controllers\Petani\KeranjangController::class, 'update'])
            ->name('keranjang.update');


        Route::get('/checkout', [\App\Http\Controllers\Petani\CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout', [\App\Http\Controllers\Petani\CheckoutController::class, 'store'])->name('checkout.store');

        Route::get('/orders', [\App\Http\Controllers\Petani\OrderController::class, 'index'])->name('orders.index');
        // Bisa tambahkan juga show detail order jika perlu
        Route::get('/orders/{id}', [\App\Http\Controllers\Petani\OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{order}/upload-bukti', [OrderController::class, 'uploadBukti'])->name('orders.upload_bukti');

         Route::get('/orders/bayar/{order}', [OrderController::class, 'bayarForm'])->name('orders.bayar');
         Route::post('/orders/bayar/{order}', [OrderController::class, 'uploadBukti'])->name('orders.upload_bukti');


        Route::get('video-pembelajaran', [\App\Http\Controllers\Petani\VideoLearningController::class, 'index'])
            ->name('videos.index');

        Route::get('video-pembelajaran/{video}', [\App\Http\Controllers\Petani\VideoLearningController::class, 'show'])
            ->name('videos.show');

        Route::post('petani/video-pembelajaran/{video}/komentar', [App\Http\Controllers\Petani\VideoLearningController::class, 'storeComment'])
    ->name('petani.videos.komentar.store');

            Route::post('video-pembelajaran/{video}/komentar', 
            [\App\Http\Controllers\Petani\VideoLearningController::class, 'storeComment'])
            ->name('videos.komentar.store');

             Route::get('/artikel', [PembeliArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/{id}', [PembeliArtikelController::class, 'show'])->name('artikel.show');
        
         Route::get('transfer', [\App\Http\Controllers\Petani\TransferPetaniController::class, 'index'])->name('transfer.index');

Route::get('/product/{id}/review', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('review.store');


        

    });

/*
|--------------------------------------------------------------------------
| Route Khusus Role: PEMBELI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsPembeli::class])
    ->prefix('pembeli')
    ->name('pembeli.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pembeli.dashboard');
        })->name('dashboard');

        // Dashboard (kirim data dari controller)
        Route::get('/dashboard', [\App\Http\Controllers\Pembeli\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/forum/{id}', [App\Http\Controllers\Pembeli\ForumController::class, 'show'])->name('forum.show');

        // Forum & Post
        Route::get('/forum', [PembeliForumController::class, 'index'])->name('forum.index');
        Route::post('/forum/post', [PembeliPostController::class, 'store'])->name('post.store');
        Route::post('/forum/comment/{postId}', [PembeliPostController::class, 'storeComment'])->name('comment.store');
         Route::get('/forum/{id}', [PembeliForumController::class, 'show'])->name('forum.show');
  
        // Marketplace
        Route::get('/marketplace', [\App\Http\Controllers\Pembeli\MarketplaceController::class, 'index'])->name('marketplace.index');

        // Produk & Etalase
        Route::get('/produk/{id}', [\App\Http\Controllers\Pembeli\ProductController::class, 'show'])->name('produk.show');
        Route::get('/etalase/{id}', [\App\Http\Controllers\Pembeli\ProductController::class, 'etalase'])->name('produk.etalase');

        // Keranjang
        Route::get('/keranjang', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'index'])->name('keranjang.index');
        Route::post('/keranjang/add', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'add'])->name('keranjang.add');
        Route::post('/keranjang/update', [\App\Http\Controllers\Pembeli\KeranjangController::class, 'update'])->name('keranjang.update');

        // Checkout
        Route::get('/checkout', [\App\Http\Controllers\Pembeli\CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout', [\App\Http\Controllers\Pembeli\CheckoutController::class, 'store'])->name('checkout.store');

        // Orders
        Route::get('/orders', [\App\Http\Controllers\Pembeli\OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [\App\Http\Controllers\Pembeli\OrderController::class, 'show'])->name('orders.show');
        Route::get('/orders/bayar/{id}', [\App\Http\Controllers\Pembeli\OrderController::class, 'bayarForm'])->name('orders.bayar');
        Route::post('/orders/upload-bukti/{id}', [\App\Http\Controllers\Pembeli\OrderController::class, 'uploadBukti'])->name('orders.uploadBukti');
  


        Route::get('video-pembelajaran', [\App\Http\Controllers\Pembeli\VideoLearningController::class, 'index'])
            ->name('videos.index');

        Route::get('video-pembelajaran/{video}', [\App\Http\Controllers\Pembeli\VideoLearningController::class, 'show'])
            ->name('videos.show');

        Route::post('pembeli/video-pembelajaran/{video}/komentar', [App\Http\Controllers\Pembeli\VideoLearningController::class, 'storeComment'])
             ->name('pembeli.videos.komentar.store');

            Route::post('video-pembelajaran/{video}/komentar', 
            [\App\Http\Controllers\Pembeli\VideoLearningController::class, 'storeComment'])
            ->name('videos.komentar.store');

 Route::get('/artikel', [PembeliArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/{id}', [PembeliArtikelController::class, 'show'])->name('artikel.show');
   



});

/*
|--------------------------------------------------------------------------
| Route Khusus Role: ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard utama dan endpoint data real-time
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/data', [\App\Http\Controllers\Admin\DashboardController::class, 'data'])->name('dashboard.data');

        // Forum
        Route::get('/forum', [AdminForumController::class, 'index'])->name('forum.index');
        Route::post('/forum/post', [AdminForumController::class, 'store'])->name('post.store');
        Route::delete('/forum/post/{id}', [AdminForumController::class, 'destroy'])->name('post.delete');
        Route::get('/forum/posts', [AdminForumController::class, 'managePosts'])->name('post.manage');
        Route::get('/forum/comments', [AdminForumController::class, 'manageComments'])->name('comment.manage');
        Route::delete('/forum/comment/{id}', [AdminForumController::class, 'deleteComment'])->name('comment.delete');

        // Kategori
        Route::resource('kategori', \App\Http\Controllers\Admin\KategoriController::class);

        // Orders
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{order}/verify', [AdminOrderController::class, 'verify'])->name('orders.verify');
        Route::post('/orders/{order}/cancel', [AdminOrderController::class, 'cancel'])->name('orders.cancel');

        // Produk
        Route::resource('produk', AdminMarketplaceController::class)->except(['show'])->names('produk');
        Route::patch('produk/{id}/promo/enable', [AdminMarketplaceController::class, 'enablePromo'])->name('produk.promo.enable');
        Route::patch('produk/{id}/promo/disable', [AdminMarketplaceController::class, 'disablePromo'])->name('produk.promo.disable');
        Route::patch('/produk/{id}/hotdeal-enable', [AdminMarketplaceController::class, 'enableHotDeal'])->name('produk.hotdeal.enable');
        Route::patch('/produk/{id}/hotdeal-disable', [AdminMarketplaceController::class, 'disableHotDeal'])->name('produk.hotdeal.disable');

        // Artikel & Video
        Route::resource('artikel', \App\Http\Controllers\Admin\ArtikelController::class)->names('artikel');
        Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class)->except('show');
        
        

    Route::resource('transfer_petani', App\Http\Controllers\Admin\TransferPetaniController::class)
        ->names('transfer_petani'); // CUKUP 'transfer_petani', JANGAN 'admin.transfer_petani'

    });

Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
Route::view('/terms-of-service', 'terms-of-service')->name('terms.service');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
