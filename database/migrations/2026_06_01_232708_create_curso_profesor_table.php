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
        Schema::create('curso_profesor', function (Blueprint $table) {
             $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();
            $table->foreignId('profesor_id')
                ->constrained('profesores')
                ->cascadeOnDelete();
            $table->primary(['curso_id', 'profesor_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_profesor');
    }
};
