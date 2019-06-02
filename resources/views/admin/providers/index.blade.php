@extends('adminlte::page')

@section('title', 'Admin | Fornecedores')

@section('content_header')
    <h1>
    <a href="{{ route('providers.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>    
    </a>
      Fornecedores
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('providers.index') }}" class="active">Fornecedores</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('providers.search') }}" class="form form-inline" method="POST">
        @csrf
        <input type="text" name="street" placeholder="Rua" class="form-control" value="{{ $data['street'] ?? '' }}">
        <input type="text" name="complement" placeholder="Complemento" class="form-control" value="{{ $data['complement'] ?? '' }}">
        <input type="text" name="zipeCode" placeholder="CEP" class="form-control" value="{{ $data['zipeCode'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('providers.index') }}">(X) Limpar Pesquisa</a>
      @endif

      </div>
    </div>
        <div class="box box-primary">
            <div class="box-body">

              @include('admin.includes.alerts')

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Número</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Complemento</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
                        <th scope="col">URL</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $provider)
                      <tr>
                        <th scope="row">{{ $provider->id }}</th>
                        <td>{{ $provider->street }}</td>
                        <td>{{ $provider->number }}</td>
                        <td>{{ $provider->neighborhood }}</td>                        
                        <td>{{ $provider->zipeCode }}</td>
                        <td>{{ $provider->complement }}</td>
                        <td>{{ $provider->city->title }}</td>
                        <td>{{ $provider->state->uf }}</td>
                        <td>{{ $provider->url }}</td>
                        <td>
                            <a href="{{ route('providers.edit', $provider->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('providers.show', $provider->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $providers->appends($data)->links() !!}
                 @else
                    {!! $providers->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop