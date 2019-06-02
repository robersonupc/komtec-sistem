@extends('adminlte::page')

@section('title', "Detalhes da Cidade {$city->title}")

@section('content_header')
    <h1>
        Cidade: {{ $city->title }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('cities.index') }}">Cidades</a></li>
            <li><a href="{{ route('cities.show', $city->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $city->id }}</p>
                <p><strong>Cidade: </strong>{{ $city->title }}</p>
                <p><strong>URL: </strong>{{ $city->url }}</p>

                <hr>

                <form action="{{ route('cities.destroy', $city->id) }}" class="form" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Deletar o cidade {{ $city->title }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@stop