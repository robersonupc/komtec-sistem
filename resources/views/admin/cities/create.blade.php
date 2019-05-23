@extends('adminlte::page')

@section('name', 'Admin | Nova Cidade')

@section('content_header')
    <h1>    
         Cadastro de Cidades
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('cities.index') }}">Cidades</a></li>
            <li><a href="{{ route('cities.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('cities.store') }}" class="form" method="POST">
                @include('admin.cities._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop