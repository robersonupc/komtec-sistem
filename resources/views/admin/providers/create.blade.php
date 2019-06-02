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

    <div class="box box-success">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::open(['route' => 'addresses.store', 'class' => 'form']) }}
                @include('admin.addresses._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop