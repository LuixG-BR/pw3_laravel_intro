<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    // 
    protected $fillable = ['titulo', 'local', 'vagas', 'preco_inscricao'];
}
