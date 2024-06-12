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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('logo')->nullable();
            $table->text('info')->nullable();
            $table->string('wherelisting');
            $table->string('password');
            $table->tinyInteger('plan_selected')->nullable();
            $table->tinyInteger('plan_status')->nullable();
            $table->string('start_plan_time')->nullable();
            $table->tinyInteger('end_plan_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
