@extends('adminlte::page')

@section('title', 'Admin | Nova Forma de Pagamento')

@section('content_header')
    <h1>    
        Cadastro de Forma de Pagamento
    </h1>   
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('formapgtos.index') }}">Forma de Pagamento</a></li>
            <li><a href="{{ route('formapgtos.create') }}" class="active">Cadastrar</a></li>
    </ol>
    
@stop

@section('content')
<div class="content row">

    <div class="box box-primary">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::open(['route' => 'formapgtos.store', 'class' => 'form']) }}
                @include('admin.formapgtos._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop