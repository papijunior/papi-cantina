<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    // Tudo que for configuração deve ficar dentro destas chaves
    protected $fillable = ['nome', 'saldo', 'limite_diario', 'restricoes'];

    protected $casts = [
        'restricoes' => 'array',
    ];
}
