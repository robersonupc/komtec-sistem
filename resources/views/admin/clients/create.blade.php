@extends('adminlte::page')

@section('title', 'Admin | Nova Marca')

@section('content_header')
    <h1>    
         Cadastro de Marcas
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('brands.index') }}">Marcas</a></li>
            <li><a href="{{ route('brands.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('brands.store') }}" class="form" method="POST">
                @include('admin.brands._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop