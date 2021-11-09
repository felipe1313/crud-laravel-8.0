<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tarefa;


class HomeController extends Controller
{
    public function __invoker(){
       $list = Tarefa::all();

       foreach($list as $item){
           echo $item->titulo."<br/>";
       }
      
      
      
        // return view('welcome');
    }
   
}
