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
        Schema::create('disponibilities', function (Blueprint $table) {
            $table->id();
            $table->integer("day_by_week");
            $table->time("start_time");
            $table->time("end_time");
            $table->foreignId("doctor_id")->references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilities');
    }
};
