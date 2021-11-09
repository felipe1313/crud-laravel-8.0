<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request){
       // $url = $request->url();
       //pega todos os dados enviados via get e post
       //$data = $request->all();
        $lista = [
        'farinha',
        'ovo',
        'manteiga'
    ];
      
      
       $data = [
            'nome' => 'felipe',
             'idade' =>'80',
             'lista' => $lista
            ];
        
      
        return view('Admin.config',$data);

    }
    public function info(){
       echo "configurações info";
    }
    public function permissoes(){
       echo "configurações de permissoes";
    }
}
