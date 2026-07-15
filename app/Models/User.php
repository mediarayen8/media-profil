<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @property string $name
 * @property \App\Models\Profile|null $profile
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke Profile (DITAMBAHKAN UNTUK MENGATASI ERROR)
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Relasi ke Portfolio/Proyek
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class); 
    }

    /**
     * Relasi ke Skill
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class); 
    }

    /**
     * Relasi ke Pengalaman
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class); 
    }

    /**
     * Relasi ke Pendidikan
     */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class); 
    }
}