<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('souscription', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->string('token');
            $table->foreignId('campagne_id');
            $table->foreign('campagne_id')->references('id')->on('campagne')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('souscription');
    }
};
