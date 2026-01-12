<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lotes_estoque', function (Blueprint $table) {
            $table->id();
            // Use foreignId e constrained() que o Laravel resolve a tipagem automaticamente
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->foreignId('nota_fiscal_id')->constrained('notas_fiscais')->onDelete('cascade');

            $table->integer('quantidade_inicial');
            $table->integer('quantidade_atual');
            $table->decimal('preco_custo', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes_estoque');
    }
};
