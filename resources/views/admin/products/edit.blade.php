@extends('adminlte::page')

@section('title', 'Admin | Editar Produto')

@section('content_header')
    <h1>    
        Editar de Produto {{ $product->description }}
    </h1>  
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li><a href="{{ route('products.edit', $product->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('products.update', $product->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.products._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop