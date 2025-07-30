<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'alamat', 
        'no_hp', 
        'kode_pos', 
        'kota', 
        'provinsi',
        'nama_bank', 
        'no_rekening', 
        'nama_pemilik_rekening',
        'foto', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
      public function getProfilePhotoUrlAttribute()
    {
        // Check if the 'foto' column has a value (meaning the user has uploaded a photo)
        if ($this->foto) {
            // Build the URL using asset() and your storage path
            return asset('storage/foto_profil/' . $this->foto);
        }
        // If 'foto' column is empty, return the URL to your default image
        return asset('img/default-user.png'); // Ensure this file exists in public/img/
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\CustomResetPasswordNotification($token));
    }



}
