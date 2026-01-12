<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
}

protected $fillable = ['nome', 'saldo', 'limite_diario', 'restricoes'];

protected $casts = [
    'restricoes' => 'array', // Transforma o JSON do banco em array do PHP automaticamente
];
