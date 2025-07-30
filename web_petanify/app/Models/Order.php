<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Jika ingin menambah fillable bisa di sini
    protected $guarded = [];

    // app/Models/Order.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }


}
