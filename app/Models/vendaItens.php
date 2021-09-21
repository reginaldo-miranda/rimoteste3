<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendaItens extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_vendaitens';

    protected $fillable =[
                    
            'id_venda',
            'id_cliente',
            'id_produto', 
            'qde', 
            'valorunit', 
            'statusitens', 
        

    ];
}
