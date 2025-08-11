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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->date('registered_at');
            $table->string('patient_name');
            $table->string('type');
            $table->foreignId('owner_id')->constrained('owners')->cascadeOnDelete();
            $table->foreignId('breed_id')->constrained('breeds')->cascadeOnDelete();
            $table->foreignId('vaccine_id')->constrained('vaccines')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
