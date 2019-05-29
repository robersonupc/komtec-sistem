@extends('adminlte::page')

@section('title', "Detalhes da marca {$brand->title}")

@section('content_header')
    <h1>
        Marca: {{ $brand->title }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('brands.index') }}">Marcas</a></li>
            <li><a href="{{ route('brands.show', $brand->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $brand->id }}</p>
                <p><strong>Título: </strong>{{ $brand->title }}</p>
                <p><strong>URL: </strong>{{ $brand->url }}</p>
                <p><strong>Descrição: </strong>{{ $brand->description }}</p>

                <hr>

                <form action="{{ route('brands.destroy', $brand->id) }}" class="form" method="POST">

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Deletar o marca {{ $brand->title }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@stop