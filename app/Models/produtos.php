<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produtos';

    protected $filllable = [
    
            'descricao', 
            'grupo',
            'pvenda',
        

    ];
}
