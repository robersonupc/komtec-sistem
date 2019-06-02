@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')
    <h1>
        Cadastrar Novo Produto
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li><a href="{{ route('products.create') }}" class="active">Cadastrar</a></li>
    </ol>
@stop

@section('content')
<div class="content row">

    <div class="box box-primary">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::open(['route' => 'products.store', 'class' => 'form']) }}
                @include('admin.products._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop