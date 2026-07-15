<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['user_id','company', 'position', 'start_date', 'end_date', 'description', 'display_order'];

    // Memastikan tanggal otomatis jadi objek Carbon
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
