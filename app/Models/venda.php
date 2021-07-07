<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_venda';
    
    protected $fillable = [

	'id_cliente',
	'valor_total',
	'statusvenda',

    ];
}
