<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    // Ini adalah kunci agar Laravel mencari tabel 'educations' (jamak)
    protected $table = 'educations';

    // Pastikan kolom-kolom ini ada di $fillable agar bisa diisi data
    protected $fillable = [
        'user_id', 
        'institution', 
        'degree', 
        'start_year', 
        'end_year', 
        'gpa', 
        'description'
    ];


// Opsional: Tambahkan relasi ke User
public function user() {
    return $this->belongsTo(\App\Models\User::class);
}
}