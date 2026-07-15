<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Update tabel projects (asumsi nama tabel Anda 'projects')
    Schema::table('projects', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });

    // Update tabel experiences
    Schema::table('experiences', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });

    // Update tabel contacts
    Schema::table('contacts', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('projects', function (Blueprint $table) { $table->dropForeign(['user_id']); $table->dropColumn('user_id'); });
    Schema::table('experiences', function (Blueprint $table) { $table->dropForeign(['user_id']); $table->dropColumn('user_id'); });
    Schema::table('contacts', function (Blueprint $table) { $table->dropForeign(['user_id']); $table->dropColumn('user_id'); });
}
};
