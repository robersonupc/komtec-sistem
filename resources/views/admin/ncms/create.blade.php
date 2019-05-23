@extends('adminlte::page')

@section('title', 'Admin | Nova NCM')

@section('content_header')
    <h1>    
         Cadastro de NCM
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('ncms.index') }}">NCM</a></li>
            <li><a href="{{ route('ncms.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('ncms.store') }}" class="form" method="POST">
                @include('admin.ncms._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop