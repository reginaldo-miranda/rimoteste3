<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use HasFactory;

    protected $primaryKey = 'CodProd';

   // protected $primaryKey = 'id_produto';

    protected $filllable = [
    
            'Descricao', 
            'grupo',
            'PrecoVenda',
        

    ];
}
