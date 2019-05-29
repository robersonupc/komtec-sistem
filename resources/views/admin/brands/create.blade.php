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

    <div class="box box-success">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::open(['route' => 'brands.store', 'class' => 'form']) }}
                @include('admin.brands._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop