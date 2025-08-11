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
        Schema::create('breeds', function (Blueprint $table) {
            // $table->id();
            // $table->string('breed_name')->unique();
            // $table->string('species'); // e.g.: 'Dog', 'Cat'
            // $table->timestamps();
            // $table->softDeletes();

            $table->bigIncrements('id');
            // $table->unsignedBigInteger('status_id');
            // $table->unsignedBigInteger('banzuke_id');
            $table->string('rank_name');
            $table->string('direction');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('status_id')->references('id')->on('statuses');
            // $table->foreign('banzuke_id')->references('id')->on('banzukes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breeds');
    }
};
