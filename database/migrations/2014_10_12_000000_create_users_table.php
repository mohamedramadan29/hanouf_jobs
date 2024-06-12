<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('wherelisting');
            $table->string('nationality');
            $table->string('sex');
            $table->string('city');
            $table->string('can_placed_from_to_another');
            $table->string('job_name');
            $table->string('work_type');
            $table->integer('experience');
            $table->string('language');
            $table->string('language_level');
            $table->string('profession_specialist');
            $table->string('notification_timeslot');
            $table->double('salary');
            $table->text('info');
            $table->string('logo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
