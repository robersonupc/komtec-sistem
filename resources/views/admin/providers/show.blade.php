@extends('adminlte::page')

@section('title', "Detalhes do endereço {$address->street}")

@section('content_header')
    <h1>
        Endereço: {{ $address->street }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('addresses.index') }}">Endereços</a></li>
            <li><a href="{{ route('addresses.show', $address->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $address->id }}</p>
                <p><strong>Rua: </strong>{{ $address->street }}</p>
                <p><strong>URL: </strong>{{ $address->url }}</p>
                <p><strong>Bairro: </strong>{{ $address->neighborhood }}</p>
                <p><strong>CEP: </strong>{{ $address->zipeCode }}</p>
                <p><strong>Complemento: </strong>{{ $address->complement }}</p>
                <p><strong>Cidade: </strong>{{ $address->city->title }}</p>
                <p><strong>UF: </strong>{{ $address->state->title }}</p>

                <hr>

                <form action="{{ route('addresses.destroy', $address->id) }}" class="form" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Deletar o endereço {{ $address->street }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@stop