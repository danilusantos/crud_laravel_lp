<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table      = "produtos";
    protected $primaryKey = "produtoId";
    protected $fillable   = [
        'codigo',
        'descricao',
        'custoProducao',
        'unidade',
        'quantidadeEstoque'
    ];
}
