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
              <select name="category" class="form-control">
                <option value="">Categoria</option>
                @foreach ($categories as $id => $category)
                  <option value="{{ $id }}" @if (isset($filters['category']) && $filters['category'] == $id)
                    selected
                  @endif>{{ $category }}</option>                    
                @endforeach
              </select>
              <select name="ncm" class="form-control">
                  <option value="">NCM</option>
                  @foreach ($ncms as $id => $ncm)
                    <option value="{{ $id }}" @if (isset($filters['ncm']) && $filters['ncm'] == $id)
                    selected
                  @endif>{{ $ncm }}</option>                    
                  @endforeach
                </select>
                <select name="brand" class="form-control">
                    <option value="">Marcas</option>
                    @foreach ($brands as $id => $brand)
                      <option value="{{ $id }}" @if (isset($filters['brand']) && $filters['brand'] == $id)
                      selected
                    @endif>{{ $brand }}</option>                    
                    @endforeach
                  </select>
              <input type="text" name="name" placeholder="Nome: " class="form-control" value="{{ $filters['name'] ?? '' }}">
              <input type="text" name="pricePurchase" placeholder="Preço: " class="form-control" value="{{ $filters['pricePurchase'] ?? '' }}">
              <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
            
            @if (isset($request))
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
                        <th scope="col">Nome</th>
                        <th scope="col">Código</th>
                        <th scope="col">NCM</th>                        
                        <th scope="col">Categoria</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Qtde</th>
                        <th scope="col">Descrição</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                      <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->ncm->code }}</td>                        
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->brand->title }}</td>
                        <td>R$ {{ $product->priceSale }}</td> 
                        <td>{{ $product->qty }}</td>              
                        <td>{{ $product->note }}</td>
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

                  @if (isset($filters))
                  {!! $products->appends($filters)->links() !!}
                  @else
                    {!! $products->links() !!}
                  @endif
                   
            </div>
        </div>
   </div>
@stop