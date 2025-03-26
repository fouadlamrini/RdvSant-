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
        Schema::create('video_consultations', function (Blueprint $table) {
            $table->id();
            $table->string("video_link");
            $table->string("status");
            $table->foreignId("appointment_id")->constrained()->cascadeOnDelete();
            $table->foreignId("patient_id")->references('id')->on("users")->cascadeOnDelete();
            $table->foreignId("doctor_id")->references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_consultations');
    }
};
