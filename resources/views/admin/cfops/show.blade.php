@extends('adminlte::page')

@section('title', "Detalhes da CFOP {$cfop->description}")

@section('content_header')
    <h1>
        CFOP: {{ $cfop->description }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('cfops.index') }}">CFOP</a></li>
            <li><a href="{{ route('cfops.show', $cfop->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $cfop->id }}</p>
                <p><strong>Código: </strong>{{ $cfop->codigo }}</p>
                <p><strong>Num_Seq: </strong>{{ $cfop->numseq }}</p>
                <p><strong>Descrição: </strong>{{ $cfop->description }}</p>
                <p><strong>Ent_Sai: </strong>{{ $cfop->ent_sai }}</p>
                <p><strong>Operação: </strong>{{ $cfop->operacao }}</p>
                <p><strong>Descr_Int: </strong>{{ $cfop->descr_int }}</p>
                <p><strong>URL: </strong>{{ $cfop->url }}</p>
                <hr>

                <form action="{{ route('cfops.destroy', $cfop->id) }}" class="form" method="POST">
                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>

            </div>
        </div>
    </div>
@stop