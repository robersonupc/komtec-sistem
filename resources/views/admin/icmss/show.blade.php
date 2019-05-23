@extends('adminlte::page')

@section('title', "Detalhes do ICMS {$icms->description}")

@section('content_header')
    <h1>
        ICMS: {{ $icms->description }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('icmss.index') }}">ICMS</a></li>
            <li><a href="{{ route('icmss.show', $icms->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $icms->id }}</p>
                <p><strong>UF: </strong>{{ $icms->uf }}</p>
                <p><strong>Descrição: </strong>{{ $icms->description }}</p>
                <p><strong>Aliquota: </strong>{{ $icms->aliqicms }}</p>
                <p><strong>URL: </strong>{{ $icms->url }}</p>

                <hr>

                <form action="{{ route('icmss.destroy', $icms->id) }}" class="form" method="POST">
                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>

            </div>
        </div>
    </div>
@stop