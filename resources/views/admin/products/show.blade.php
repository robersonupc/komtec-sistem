@extends('adminlte::page')

@section('title', "Detalhes do produto {$product->name}")

@section('content_header')
    <h1>
        Produto: {{ $product->name }}
    </h1>

    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('products.index') }}">Produtos</a></li>
            <li><a href="{{ route('products.show', $product->id) }}" class="active">Detalhes</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $product->id }}</p>
                <p><strong>Nome: </strong>{{ $product->name }}</p>
                <p><strong>NCM: </strong>{{ $product->ncm->code }}</p>
                <p><strong>Código: </strong>{{ $product->code }}</p>
                <p><strong>Categoria: </strong>{{ $product->category->title }}</p>
                <p><strong>Marca: </strong>{{ $product->brand->title }}</p>
                <p><strong>Cód. Fabricante: </strong>{{ $product->codeManufacturer }}</p>
                <p><strong>Valor de Compra: </strong>{{ $product->pricePurchase }}</p>
                <p><strong>Margem: </strong>{{ $product->margin }}</p>
                <p><strong>Valor de Venda: </strong>{{ $product->priceSale }}</p>
                <p><strong>Qtde: </strong>{{ $product->qty }}</p>
                <p><strong>URL: </strong>{{ $product->url }}</p>
                <p><strong>Observação: </strong>{{ $product->note }}</p>

                <hr>

                <form action="{{ route('products.destroy', $product->id) }}" class="form" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">
                            Deletar o produto {{ $product->name }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@stop