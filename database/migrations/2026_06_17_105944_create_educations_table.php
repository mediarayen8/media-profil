<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('educations', function (Blueprint $table) {
        $table->id();
        $table->string('institution'); // Nama sekolah/univ
        $table->string('degree');      // Jurusan/Gelar
        $table->string('start_year');  // Tahun mulai
        $table->string('end_year');    // Tahun lulus
        $table->string('gpa')->nullable(); // IPK (nullable jika tidak ada)
        $table->text('description')->nullable(); // Opsional
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
