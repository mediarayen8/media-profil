<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
    'user_id', 'full_name', 'job_title', 'bio', 'photo_path', 'linkedin_url', 'github_url', 'whatsapp'
];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Tambahkan di dalam class Profile
public function getPhotoUrlAttribute()
{
    return $this->photo_path ? asset('storage/' . $this->photo_path) : null;
}
}