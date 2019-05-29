@extends('adminlte::page')

@section('title', "Detalhes da categoria {$category->title}")

@section('content_header')
    <h1>
        Categoria: {{ $category->title }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('categories.show', $category->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $category->id }}</p>
                <p><strong>Título: </strong>{{ $category->title }}</p>
                <p><strong>URL: </strong>{{ $category->url }}</p>
                <p><strong>Descrição: </strong>{{ $category->description }}</p>

                <hr>

                <form action="{{ route('categories.destroy', $category->id) }}" class="form" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Deletar o marca {{ $category->title }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@stop