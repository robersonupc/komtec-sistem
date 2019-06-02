@extends('adminlte::page')

@section('title', 'Admin | Nova CFOP')

@section('content_header')
    <h1>    
         Cadastro de CFOP
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('cfops.index') }}">CFOP</a></li>
            <li><a href="{{ route('cfops.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
<div class="content row">

    <div class="box box-primary">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::open(['route' => 'cfops.store', 'class' => 'form']) }}
                @include('admin.cfops._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop