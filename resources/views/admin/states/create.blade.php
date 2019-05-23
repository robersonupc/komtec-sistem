@extends('adminlte::page')

@section('title', 'Admin | Novo UF')

@section('content_header')
    <h1>    
         Cadastro de UFs
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('states.index') }}">UFs</a></li>
            <li><a href="{{ route('states.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('states.store') }}" class="form" method="POST">
                @include('admin.states._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop