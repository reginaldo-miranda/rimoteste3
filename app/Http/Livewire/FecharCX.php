<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\models\vendas;
use App\models\produto;
use App\models\vendasitens;
use App\Http\Livewire\document;
use App\Http\Livewire\produtos;


//use Livewire\Component;

class FecharCX extends Component
{   
    public $dinheiro = 10;
    public function render()
    {
        return view('livewire.fechar-c-x');
    }
}
