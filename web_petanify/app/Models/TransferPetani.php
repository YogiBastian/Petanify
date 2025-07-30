<?php

// app/Models/TransferPetani.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferPetani extends Model
{
    use HasFactory;

    protected $table = 'transfer_petani';

    protected $fillable = [
        'petani_id',
        'nominal',
        'catatan',
        'foto_transfer',
    ];


    // Relasi ke user petani
    public function petani()
    {
        return $this->belongsTo(User::class, 'petani_id');
    }
}
