<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\produtos;

class ProdutoComponente extends Component
{

    public $prod_id;
    
    public function render()
    {

      //$produtos = produtos::find($id);

        $produtos = produtos::get();

        $this->prod_id   = $produtos->CodProd;
        $this->descricao = $produtos->descricao;
        $this->grupo     = $produtos->grupo;
        $this->pvenda    = $produtos->pvenda;
        return view('livewire.produto-componente');
    }
}
