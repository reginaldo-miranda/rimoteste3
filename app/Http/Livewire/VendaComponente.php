<?php

namespace App\Http\Livewire;
//namespace App\Http\Requests;
use Illuminate\Http\Request;
use Livewire\Component;
use App\models\vendas;
use App\models\produto;
use App\models\vendasitens;
use App\Http\Livewire\document;
use App\Http\Livewire\produtos;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

//use App\Http\Livewire\DB;
use Livewire\WithPagination;

class VendaComponente extends Component
{   
    public $checar;
    public $id_cliente;

    public $nome = 'jose';

    public $descricao, $grupo, $pvenda, $prod_id; // cadastro produto
    public $buscapdv;

    public $id_venda;

    public $view ='formpdv';
    public $cliente = 1;
    public $qde;
    public $valortotal=100;
    public $status = 1;
    public $fechado = 2;
    public $post;
    public $totalvenda;
    public $totalv, $res , $numerovenda, $checa, $btn, $temp=1;

    public $inputdinh;
    public $inputcartao;
    public $inputpix;
    public $resultado, $total , $inputvlrtotal;

  
    public function render()
    {
        $produtos = DB::table('vendasitens')
           
        ->select('vendasitens.*', 'produtos.descricao')
        ->join('produtos', 'produtos.id', '=', 'vendasitens.id_produto')->where('status', '=', 1)->get();
        
         $this ->somar();
        // $this->mostarIdVenda();
         $this->checar();
        // $totalvenda = DB::select("SELECT SUM(qde * valorunit) as totalv
        // FROM vendasitens WHERE status = 1;"); */
              
        return view('livewire.venda-componente', ['produtos'=> $produtos]);
       // return view('livewire.produto-component',['produtos'=> $produtos]);
      
    }

    public function somar(){
            
       $totalvenda = DB::select("SELECT SUM(qde * valorunit) as totalv, count(status) as qdeitens
           FROM vendasitens WHERE status = 1;");
          
           $this->totalvenda = $totalvenda;   
          
               
    }
    public function checar()
    {
        $checar = DB::table('vendas')->where('statusvenda', '=', 1)->get();
      
        $this->checar = $checar->toArray();
      //  dd($checar);
       // return view('livewire.pdv_form', ['vendas'=> $checar] );
    }
/*
    public function mostarIdVenda(){

        $res  = DB::table('vendas')->get()->last();
            $this->res = $res->toArray();
         //  dd($res);
          
      }
    */
    public function edit($id)
    {
        $produtos = produto::find($id);
      //  dd($produtos);
          if(!empty($produtos)){  
             $this->prod_id   = $produtos->id;
             $this->descricao = $produtos->descricao;
             $this->grupo     = $produtos->grupo;
             $this->pvenda    = $produtos->pvenda;
        
            $this->gravar();
          }else{
            $this->prod_id = '';
            $this->descricao = '';
            
          }
                 
        //  return view('livewire.vendaitens-componente',['produtos'=> $produtos]);
    }


    public function abrir()
    {
        $stat = 1;
     
        $venda = vendas::create([
        // 'id_cliente' =>$this->cliente,
        // 'valor_total'=>$this->valortotal,
       'statusvenda'=>$stat,
    
       
                           
        ]);
        
    }



    public function gravar()
    {
        $res = vendas::get()->last();
        $this->id_venda = $res->id_venda; 
       // dd($id_venda);

        $vendaitens = vendasitens::create([
    

        'id_cliente'  => $this->cliente,
        'id_produto'  => $this->prod_id,
        'qde'         => $this->qde,
        'valorunit'   => $this->pvenda,
        'status'      => $this->status,
        'id_vendai'   => $res->id_venda,
        ]);

        $this->prod_id = '';
        $this->pvenda = '';
        //$this->descricao = '';
          
    

        
        

     //  $this->prod_id = '';
        
      //  $vendaitens->refresh();
        //  $this->getfocus(id);va
        //  $this->view = 'pdvbusca';
        //  return back()->withInput();
        //  $totalvenda  = DB::select("SELECT SUM(qde * valorunit)
        //  FROM vendasitens WHERE status = 1;");
        //  dd($totalvenda);
        //return view('livewire.vendaitens-componente',['vendaitens'=> $totalvenda]);
    }

    public function destruir($id)
    {
        vendasitens::destroy($id);
    }

    public function calfechamento(Request $request){ // tela de fechamento de caixa tableFechaCX
  
     
 
          
    }

    public function fecharvenda()  
    {   
       
       

        $produtos =  DB::update("update vendasitens SET STATUS = 2 WHERE id_cliente = 1");
        $vendas   =  DB::update("update vendas SET STATUSVENDA = 2 WHERE STATUSVENDA = 1");
       
        /*   $produtos = DB::table('vendasitens')
            ->join('produtos', 'produtos.id', '=', 'produtos.id')
            ->where('status', '=' , 1)
            ->select('vendasitens.*','produtos.descricao')->get();
            return view('livewire.vendaitens-componente',['produtos'=> $produtos]);
            return view('livewire.vendaitens-componente');
            /<script>
               $("#botaoabir").show();
            </script>
         */
        $this->qde = '';
        $this->prod_id = '';
        $this->pvenda = '';
        $this->descricao = '';
    }

    public function default()
    {
        // $this->nome = '';
        // $this->fone = '';
        // $this->view = ('livewire.vendaitens-componente');
        $this->qde = '';
        $this->prod_id = '';
        $this->pvenda = '';
    }

    function buscarprodpdv(){

        $searchprod = '%'. $this->searchprod .'%';
        $produtos = produto::where('descricao', 'LIKE', $searchprod)
                             ->orWhere('grupo', 'LIKE', $searchprod)  
                             ->orderby('id','desc')->paginate(4);
        /*   $produtos = produto::orderby('id','desc')->paginate(4); */
       
        return view('livewire.venda-componente',['produtos'=> $produtos]);

    }
    
   
}   


/*
exemplo de join

$users = DB::table('users')
    ->join('contacts', 'users.id', '=', 'contacts.user_id')
    ->join('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.*', 'contacts.phone', 'orders.price')
    ->get();
*/

 
