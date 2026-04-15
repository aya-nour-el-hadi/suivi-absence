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
        Schema::create('cefs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stagiaire_id')
            ->constrained()
            ->onDelete('cascade');
            $table->integer('total_abssance');
            $table->integer('total_retard');
            $table->string('sanction');
            $table->string('evaluation_final')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cefs');
    }
};
