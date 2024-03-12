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
        Schema::create('falsh_cards', function (Blueprint $table) {
            $table->id();
            $table->uuid('set_id');
            $table->string('key');
            $table->string('value');
            $table->foreign('set_id')->references('id')->on('sets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('falsh_cards');
    }
};
