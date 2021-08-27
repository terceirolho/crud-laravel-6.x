 {{--  diretivas --}} 
@extends('admin.layouts.app')

@section('title', 'Gestao de Produtos')
    

@section ('content') 
      <h1>  exibindo os produtos  </h1>

      <a href="{{ route('products.create') }}"> cadastrar </a>

    @component('admin.components.card')
    @slot ('title')
         <h1> titulo card </h1>

    @endslot
         Um card de exemplo
    @endcomponent
       
      <hr>

      @include ('admin.alerts.alerts', ['content' => ' alerta de preços'])

      <hr>

     {{-- testar se existe a variavel teste3 --}} 
      @if(isset($products))
          @foreach ($products as $product)

          <p class="@if ($loop->last) last @endif">  {{$product}} </p>
          {{-- {{$product->title}} --}} 
        {{--      <img src='{{url("storage/{$prodcut->image}")}}'> --}} 
          @endforeach
     @endif 

     <hr>
 
     {{-- se nao existir vai pro loop --}} 
     @forelse ($products as $product)
     <p class="@if ($loop->first) last @endif"> {{$product}} </p> 
       
      {{-- verifica se existe --}}    
     @empty 
       <p> nao existe produtos cadastrados </p> 
         
     @endforelse
    
     <hr>


    {{-- if e else --}}  
   @if ($teste === '123')
       É igual

       @elseif ($teste == 123)
       é igual a 123

       @else
       é diferente

    @endif


    {{-- nao sei --}}  
    @unless ($teste === '123')
         hduashdu
          @else 
          oahdihas    
    @endunless

    
     {{-- nao sei --}}   
    @isset ($teste2)
         <p> {{$teste2}}</p>
    @endisset

    
    {{-- array --}}   
    @empty($teste3)
          <p> vazio... </p>
        
    @endempty

    {{-- autentificação --}} 
    @auth
     <p> Autenticado </p>
    @else 
     <p> Não Autenticado </p>
    @endauth


     {{-- so vai entrar se nao tiver autentificado --}} 
    @guest
    <p> Não Autenticado </p>   
    @endguest

     {{-- verificação --}} 

    @switch($teste)
        @case(1)
            Igual 1
            @break
        @case(2)
             Igual 2
            @break

        @case(123)
             Igual 123
            @break  

        @default
            Default
    @endswitch


@endsection 


@push ('styles')

     <style> 
          .last {background: #CCC;}
     </style>
  
@endpush 


@push('scripts')

       <script>
           document.body.style.background = '#999'
        </script> 
    
@endpush
