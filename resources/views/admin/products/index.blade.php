@extends('adminlte::page')

@section('title', 'Admin | Produtos')

@section('content_header')
    <h1>
        <a href="{{ route('products.create') }}" class="btn btn-success btn-add">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
          Produtos
        </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
          <form action="{{ route('products.search') }}" class="form form-inline" method="POST">
              @csrf
            <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
              <input type="text" name="codeManufacturer" placeholder="Cód. Fabricante" class="form-control" value="{{ $data['codeManufacturer'] ?? '' }}">
              <input type="text" name="code" placeholder="Código" class="form-control" value="{{ $data['code'] ?? '' }}">
              <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
      
            @if (isset($data))
              <a href="{{ route('products.index') }}">(X) Limpar Pesquisa</a>
            @endif
      </div>
    </div>
        <div class="box box-primary">
            <div class="box-body">

              @include('admin.includes.alerts')

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Código</th>
                        <th scope="col">NCM</th>                        
                        <th scope="col">Categoria</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Compra</th>
                        <th scope="col">Margem</th>
                        <th scope="col">Venda</th>
                        <th scope="col">Qtde</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                      <tr>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->ncm->code }}</td>                        
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->brand->title }}</td>
                        <td>R$ {{ $product->pricePurchase }}</td>
                        <td>{{ $product->margin }}X</td>
                        <td>R$ {{ $product->priceSale }}</td> 
                        <td>{{ $product->qty }}</td>              
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="badge bg-yellow">
                                Editar
                               </a>
                               <a href="{{ route('products.show', $product->id) }}" class="badge bg-info">
                                 Detalhes
                               </a>
                        </td>
                      </tr> 
                      @endforeach       
                    </tbody>
                  </table>

                  

            </div>
        </div>
   </div>
@stop