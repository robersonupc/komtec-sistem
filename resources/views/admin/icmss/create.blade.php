@extends('adminlte::page')

@section('title', 'Admin | Novo ICMS')

@section('content_header')
    <h1>    
         Cadastro de ICMS
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('icmss.index') }}">ICMSs</a></li>
            <li><a href="{{ route('icmss.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
        <div class="box box-primary">
            <div class="box-body">                
                @include('admin.includes.alerts')
            <form action="{{ route('icmss.store') }}" class="form" method="POST">
                @include('admin.icmss._partials.form')    
            </form>    
            </div>
        </div>
   </div>
@stop