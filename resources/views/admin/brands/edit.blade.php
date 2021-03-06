@extends('adminlte::page')

@section('title', 'Admin | Editar Marca')

@section('content_header')
    <h1>    
        Editar de Marca {{ $brand->title }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('brands.index') }}">Marca</a></li>
            <li><a href="{{ route('brands.edit', $brand->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
<div class="content row">

    <div class="box box-success">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::model($brand, ['route' => ['brands.update', $brand->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.brands._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop