@extends('adminlte::page')

@section('title', 'Admin | Editar Marca')

@section('content_header')
    <h1>    
         Editar de Marca {{ $brand->title }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('brands.index') }}">Marcas</a></li>
            <li><a href="{{ route('brands.edit', $brand->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('brands.update', $brand->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.brands._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop