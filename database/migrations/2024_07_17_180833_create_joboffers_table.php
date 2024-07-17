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
        Schema::create('joboffers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adv_id')->references('id')->on('advertisments')->cascadeOnDelete();
            $table->integer('user_id');
            $table->integer('company_id');
            $table->longText('cover_letter');
            $table->longText('cover_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joboffers');
    }
};
