@extends('adminlte::page')

@section('title', "Detalhes da UF {$state->title}")

@section('content_header')
    <h1>
        UF: {{ $state->title }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('states.index') }}">UFs</a></li>
            <li><a href="{{ route('states.show', $state->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $state->id }}</p>
                <p><strong>Título: </strong>{{ $state->title }}</p>
                <p><strong>URL: </strong>{{ $state->url }}</p>
                <p><strong>UF: </strong>{{ $state->uf }}</p>

                <hr>

                <form action="{{ route('states.destroy', $state->id) }}" class="form" method="POST">
                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>

            </div>
        </div>
    </div>
@stop