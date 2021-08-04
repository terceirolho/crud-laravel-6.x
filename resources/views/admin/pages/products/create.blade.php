
<!--  diretivas --> 
@extends('admin.layouts.app')

<!--  titulo --> 
@section('title', 'cadastrar novo produto')
    

@section('content')
       <h1> cadastrar novo produto </h1> 

<!--  ver se existe erro  --> 
@if ($errors->any())
  <ul>
   @foreach ($errors->all() as $error)
        <li> {{$error}}</li>      
   @endforeach
  </ul>  
@endif

<form action = "{{route ('products.store') }}" method = "post" enctype="multipart/form-data"> 
  
    <!--  token para validar o token do formulario --> 
     @csrf
    
    <input type = "text" name ="name " placeholder="Nome:" > 
    <input type = "text" name ="description " placeholder="Descrição:" > 
    <input  type="file" name = "photo">
    <button type = "submit"> Enviar </button> 
    
</form>

@endsection


