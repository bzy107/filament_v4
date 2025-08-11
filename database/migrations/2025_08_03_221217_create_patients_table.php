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
            // $table->id();
            // $table->date('registered_at');
            // $table->string('patient_name');
            // $table->string('type');
            // $table->foreignId('owner_id')->constrained('owners')->cascadeOnDelete();
            // $table->foreignId('breed_id')->constrained('breeds')->cascadeOnDelete();
            // $table->foreignId('vaccine_id')->constrained('vaccines')->cascadeOnDelete();
            // $table->timestamps();
            // $table->softDeletes();


            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('breed_id');
            $table->unsignedBigInteger('vaccine_id')->nullable();
            $table->string('name_history')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->dateTime('information_date', 0)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('owners');
            $table->foreign('breed_id')->references('id')->on('breeds');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
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
