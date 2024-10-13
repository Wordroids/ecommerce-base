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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
           // Polymorphic relationship fields
           $table->morphs('assetable'); // assetable_id and assetable_type columns

           $table->string('file_path'); // Path to the file
           $table->string('file_type')->nullable(); // Type of file: image, video, document, etc.
           $table->boolean('is_featured')->default(false); // Flag to mark if it's the featured asset
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
