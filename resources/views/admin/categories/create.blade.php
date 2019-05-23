@extends('adminlte::page')

@section('title', 'Admin | Nova Categoria')

@section('content_header')
    <h1>    
         Cadastro de Categorias
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('categories.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('categories.store') }}" class="form" method="POST">
                @include('admin.categories._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop