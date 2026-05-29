<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    //Define os campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'preco', 'estoque'];
}
