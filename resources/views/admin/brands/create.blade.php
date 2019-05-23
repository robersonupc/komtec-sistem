@extends('adminlte::page')

@section('title', 'Admin | Novo Produto')

@section('content_header')
    <h1>    
         Cadastro de Produtos
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('products.index') }}">Produtos</a></li>
            <li><a href="{{ route('products.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('products.store') }}" class="form" method="POST">
                @include('admin.products._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop