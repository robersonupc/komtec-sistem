@extends('adminlte::page')

@section('title', 'Admin | Novo Endereço')

@section('content_header')
    <h1>    
         Cadastro de Endereços
    </h1>   
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('addresses.index') }}">Endereços</a></li>
        <li><a href="{{ route('addresses.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('addresses.store') }}" class="form" method="POST">
                @include('admin.addresses._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop