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
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_image');
            $table->string('hero_title');
            $table->string('hero_desc');
            $table->string('about_title');
            $table->longText('about_section')->nullable();
            $table->string('about_image')->nullable();

            $table->string('job_step1_title')->nullable();
            $table->longText('job_step1_desc')->nullable();
            $table->string('job_step2_title')->nullable();
            $table->longText('job_step2_desc')->nullable();
            $table->string('job_step3_title')->nullable();
            $table->longText('job_step3_desc')->nullable();

            $table->string('exper_step1_title')->nullable();
            $table->longText('exper_step1_desc')->nullable();
            $table->string('exper_step2_title')->nullable();
            $table->longText('exper_step2_desc')->nullable();
            $table->string('exper_step3_title')->nullable();
            $table->longText('exper_step3_desc')->nullable();

            $table->string('serv1_icon')->nullable();
            $table->string('serv1_title')->nullable();
            $table->text('serv1_desc')->nullable();
            $table->string('serv2_icon')->nullable();
            $table->string('serv2_title')->nullable();
            $table->string('serv2_desc')->nullable();
            $table->string('serv3_icon')->nullable();
            $table->string('serv3_title')->nullable();
            $table->string('serv3_desc')->nullable();
            $table->longText('why_section')->nullable();
            $table->longText('message_section')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
