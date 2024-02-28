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
        Schema::create('post', function (Blueprint $t) {
            $t->id();
            $t->string('location')->nullable();
            $t->string('image');
            $t->string('description')->nullable();
            $t->foreignId('albumid')->nullable()->constrained('albums')->onDelete('set null');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
