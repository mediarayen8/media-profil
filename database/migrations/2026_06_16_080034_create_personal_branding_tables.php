<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. Profiles
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });

        // 3. Projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('tech_stack');
            $table->string('image_path')->nullable();
            $table->string('project_url')->nullable();
            $table->integer('display_order')->default(0); // Untuk urutan tampilan
            $table->boolean('is_published')->default(true); // Untuk kontrol visibilitas
            $table->timestamps();
        });

        // 4. Experiences
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('position');
            $table->string('period'); // Atau $table->text('period');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 5. Skills (Baru: dengan proficiency)
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // misal: Laravel
            $table->string('category'); // misal: Backend
            $table->integer('proficiency')->default(50); // Nilai 1-100
            $table->timestamps();
        });

        // 6. Contact Messages
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('users');
    }
};