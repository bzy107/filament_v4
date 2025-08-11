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
        Schema::create('owners', function (Blueprint $table) {
            // $table->id();
            // $table->string('email');
            // $table->string('owner_name');
            // $table->string('phone');
            // $table->timestamps();
            // $table->softDeletes();

            $table->bigIncrements('id');
            $table->unsignedBigInteger('link_id')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name_kana')->nullable();
            $table->string('first_name_kana')->nullable();
            $table->string('real_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('country')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->unsignedTinyInteger('is_retired')->default(0);
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
