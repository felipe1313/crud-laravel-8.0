<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;


class TarefasController extends Controller
{
   public function list(){
      //$list = DB::select('SELECT * FROM tarefas');
      //metodo eloquent ORM
      $list = Tarefa::all();
      return view('tarefas.list', [
         'list' => $list
      ]);
   }
   public function add(){
       return view('tarefas.add');
    }

    public function addAction(Request $request){
         $request->validate([
            'title' => ['required','string']
         ]);       
         
         $title = $request->input('title');  

         // DB::insert('INSERT INTO tarefas (titulo) VALUES(:title)',[
         //    'title' => $title
         // ]);
         //Abaixo metodo ELOQUENT ORM PRA SALVAR
         $t = new Tarefa;
         $t->titulo = $title;
         $t->save();

         return redirect()->route('tarefas.list');

       
    }

    public function edit($id){
      //  $data = DB::select('SELECT * FROM tarefas WHERE id = :id',[
      //     'id'=>$id
      //  ]);
      //METODO ELOQUENT orm abaixo
       $data = Tarefa::find($id);
       if($data){
          return view('tarefas.edit',[
             'data'=>$data
          ]);
       }else{
          return redirect()->route('tarefas.list');
       }
       
    }

    public function editAction(Request $request, $id){
      $request->validate([
         'title' => ['required','string']
      ]);
      $titulo = $request->input('title');
         //   DB::update('UPDATE tarefas SET titulo = :titulo WHERE id
         //   =:id', [
         //      'id'=>$id,
         //      'titulo' => $titulo
         //   ]);
           $t = Tarefa::find($id);
           $t->titulo = $titulo;
           $t->save();

         
         return redirect()->route('tarefas.list');



        
    }
    public function del($id){
      //  DB::delete('DELETE FROM tarefas WHERE id = :id',[
      //     'id'=> $id
      //  ]);
       Tarefa::find($id)->delete();
       return redirect()->route('tarefas.list');
    }
    public function done($id){
      //  DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id',[
      //     'id'=> $id
      //  ]);
       $t = Tarefa::find($id);
       if($t){
       $t->resolvido = 1 - $t->resolvido;
       $t->save();
       }

      return redirect()->route('tarefas.list');
    }
}
