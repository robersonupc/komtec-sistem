@extends('adminlte::page')

@section('title', "Detalhes da ncm {$ncm->code}")

@section('content_header')
    <h1>
        NCM: {{ $ncm->code }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('ncms.index') }}">NCM</a></li>
            <li><a href="{{ route('ncms.show', $ncm->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $ncm->id }}</p>
                <p><strong>Código: </strong>{{ $ncm->code }}</p>                
                <p><strong>Descrição: </strong>{{ $ncm->description }}</p>
                <p><strong>URL: </strong>{{ $ncm->url }}</p>

                <hr>

                <form action="{{ route('ncms.destroy', $ncm->id) }}" class="form" method="POST">
                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>

            </div>
        </div>
    </div>
@stop