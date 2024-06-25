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
            $table->string('nationality')->nullable();
            $table->string('sex')->nullable();
            $table->string('city')->nullable();
            $table->string('can_placed_from_to_another')->nullable();
            $table->string('job_name')->nullable();
            $table->string('work_type')->nullable();
            $table->integer('experience')->nullable();
            $table->string('language')->nullable();
            $table->string('language_level')->nullable();
            $table->string('profession_specialist')->nullable();
            $table->string('notification_timeslot')->nullable();
            $table->double('salary')->nullable();
            $table->text('info')->nullable();
            $table->string('logo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('email_confirm')->default('0');
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
