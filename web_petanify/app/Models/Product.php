<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang dapat diisi secara mass-assignment.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'satuan',
        'deskripsi',
        'foto',
        'user_id',
        'kategori_id',
        'status',
        'is_verified',
        'diskon',
        'is_promo',
        'promo_expired_at',
        'promo_diskon',
        'is_hot_deal',
    ];

    /**
     * Casting atribut ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga'             => 'integer',
        'stok'              => 'integer',
        'is_verified'       => 'boolean',
        'is_promo'          => 'boolean',
        'promo_diskon'      => 'float',
        'is_hot_deal'       => 'boolean',
        'diskon'            => 'float',
        'promo_expired_at'  => 'datetime',
    ];

    /**
     * Relasi ke pengguna yang membuat produk (Petani/Admin).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke kategori produk.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi ke review produk.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    /**
     * Menghitung rata-rata rating produk.
     *
     * @return float
     */
    public function averageRating(): float
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }

    /**
     * Relasi ke item pesanan yang pernah membeli produk ini.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    /**
     * Mengecek apakah produk sedang dalam masa promo.
     *
     * @return bool
     */
    public function isPromoActive(): bool
    {
        if (!$this->is_promo || is_null($this->promo_expired_at)) {
            return false;
        }

        return now()->lessThan($this->promo_expired_at);
    }

    /**
     * Mendapatkan harga setelah diskon atau promo (jika berlaku).
     *
     * @return float
     */
    public function finalPrice(): float
    {
        $price = $this->harga;

        if ($this->isPromoActive()) {
            $price -= $price * ($this->promo_diskon / 100);
        } elseif ($this->diskon > 0) {
            $price -= $price * ($this->diskon / 100);
        }

        return max($price, 0);
    }
}
