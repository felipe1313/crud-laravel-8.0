@extends('layouts.admin')

@section('title','Edição de Tarefas')

@section('content')
    <h1>Edição</h1>



    <h1>Editar Titulo </h1>
        @if($errors->any())
                <x-alert> 
                    @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                    @endforeach
                    
                </x-alert>            
                
        @endif
    <form action="" method="post">
        @csrf
        <label for="">
            Titulo da Tarefa:<br>
            <input type="text" name="title" value="{{ $data->titulo }}"><br><br>
            <input type="submit" value="Atualizar">
        </label>
    </form>

@endsection