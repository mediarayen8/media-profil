<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan form edit profil
    public function edit()
    {
        // Menggunakan auth()->user() untuk konsistensi
        $profile = Profile::firstOrCreate(['user_id' => auth()->id()]);
        return view('admin.profile.edit', compact('profile'));
    }

    // Memperbarui data profil
    public function update(Request $request)
    {
        $profile = Profile::where('user_id', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'full_name'    => 'required|max:255',
            'job_title'    => 'nullable|max:255',
            'bio'          => 'nullable',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'linkedin_url' => 'nullable|url',
            'github_url'   => 'nullable|url',
            'whatsapp'     => 'nullable|string'
        ]);

        // 1. Pisahkan data photo dari array $validated agar tidak error saat update()
        $dataToUpdate = $request->except(['photo']);

        // 2. Proses upload foto baru jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama dari storage
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            // Simpan foto baru dan tambahkan path ke data update
            $dataToUpdate['photo_path'] = $request->file('photo')->store('profiles', 'public');
        }

        // 3. Update hanya data yang sudah dibersihkan
        $profile->update($dataToUpdate);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}