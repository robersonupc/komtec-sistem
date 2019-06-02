@extends('adminlte::page')

@section('title', 'Admin | Editar Categoria')

@section('content_header')
    <h1>    
         Editar de Categoria {{ $category->title }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('categories.edit', $category->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                {{ Form::model($category, ['route' => ['categories.update', $category->id], 'class' => 'form']) }}
                    @method('PUT')
                    @include('admin.categories._partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop