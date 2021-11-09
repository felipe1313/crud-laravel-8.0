@extends('layouts.admin')

@section('title','Adição de Tarefas')

@section('content')
    <h1>Adição </h1>
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
            <input type="text" name="title"><br><br>
            <input type="submit" value="Salvar">
        </label>
    </form>

@endsection