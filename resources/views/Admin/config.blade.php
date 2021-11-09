@extends('layouts.admin')

@section('title','Configurações')
@section('content')
    <h1>Configurações</h1>
    <x-alert>
      testando 123
    </x-alert>
       
  

    lista do bolo: 
    @if(count($lista) > 0)
    <ul>
        @foreach($lista as $item) 
        <li>{{$item}}</li>
        @endforeach
    </ul>
    @else 
    não ha igredientes
    @endif  <br>
    meu nome e {{$nome}} e minha idade e {{$idade}}
    @if($idade > 18)
    eu sou maior de idade
    @else 
    nao sou maior de idade <br>
    @endif
    @for($q=0; $q<=10;$q++)
     o numero e  {{$q}} <br>

    @endfor
    <form action="post">
        @csrf
        Nome:
        <input type="text" name="name"><br><br>
        Idade:
        <input type="text" name="idade"><br><br>
        <input type="submit" value="Enviar">
    </form>
    Versão : = {{$versao}}
@endsection