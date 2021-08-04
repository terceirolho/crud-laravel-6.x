
<!--  diretivas --> 
@extends('admin.layouts.app')

<!--  titulo --> 
@section('title', 'Editar Produto')
    

@section('content')
       <h1> Editar Produto {{$id}}</h1> 

<form action = "{{route ('products.update', $id) }}" method = "post" > 
  
    @method('PUT')
    
    <!--  token para validar o token do formulario --> 
     @csrf
    <input type = "text" name ="name " placeholder="Nome:" > 
    <input type = "text" name ="description " placeholder="Descrição:" > 
    <button type = "submit"> Enviar </button> 
    
</form>

@endsection


