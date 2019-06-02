@extends('adminlte::page')

@section('title', "Detalhes da forma de pagamento {$formapgto->description}")

@section('content_header')
    <h1>
        Forma de Pagamento: {{ $formapgto->description }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('formapgtos.index') }}">Forma de Pagamentos</a></li>
            <li><a href="{{ route('formapgtos.show', $formapgto->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $formapgto->id }}</p>
                <p><strong>Descrição: </strong>{{ $formapgto->description }}</p>
                <p><strong>Parcela: </strong>{{ $formapgto->parcela }}</p>
                <p><strong>Prazo Inicial: </strong>{{ $formapgto->prazoinicial }}</p>
                <p><strong>Dias Entre Parcelas: </strong>{{ $formapgto->diasentreparcelas }}</p>
                <p><strong>URL: </strong>{{ $formapgto->url }}</p>
                

                <hr>

                <form action="{{ route('formapgtos.destroy', $formapgto->id) }}" class="form" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Deletar a forma de pagamento {{ $formapgto->description }}
                    </button>

            </div>
        </div>
    </div>
@stop