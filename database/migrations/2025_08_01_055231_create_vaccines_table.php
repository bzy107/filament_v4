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
        Schema::create('vaccines', function (Blueprint $table) {
            // $table->id();
            // $table->string('vaccine_name');
            // $table->string('description');
            // $table->integer('duration_in_months');
            // $table->timestamps();
            // $table->softDeletes();

            $table->bigIncrements('id');
            $table->unsignedBigInteger('link_id');
            $table->string('room_name');
            $table->string('postal_code');
            $table->string('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccines');
    }
};
