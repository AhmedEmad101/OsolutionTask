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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('F08080')->nullable(); 
            $table->string('icon_url')->default('https://pixsector.com/icon/free-image-icon-png-vector/891')->nullable();
            $table->string('image_filter')->default('brightness(150%)')->nullable();
            $table->string('image_seed_offset')->default('1234')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
