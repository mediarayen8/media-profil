<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    // Menambahkan user_id agar data terikat dengan pemiliknya
    protected $fillable = [
        'user_id', 
        'name', 
        'category', 
        'proficiency'
    ];

    /**
     * Relasi ke User: Skill ini milik siapa?
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}