<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advertisments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->string('nationality');
            $table->string('sex');
            $table->string('city');
            $table->tinyInteger('available_work_from_another_place');
            $table->string('job_name');
            $table->string('work_type');
            $table->integer('experience');
            $table->string('language');
            $table->string('language_level');
            $table->string('profession_specialist');
            $table->string('notification_timeslot');
            $table->double('salary');
            $table->text('description');
            $table->string('title');
            $table->string('title_name');
            $table->string('logo')->nullable();
            $table->integer('employs_accepted')->nullable();
            $table->string('status')->default('1');
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisments');
    }
};
