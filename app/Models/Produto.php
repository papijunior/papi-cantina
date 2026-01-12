<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Adicione esta linha para permitir o salvamento desses campos
    protected $fillable = [
        'nome',
        'preco_venda',
        'preco_custo_medio',
        'estoque_atual'
    ];
}
