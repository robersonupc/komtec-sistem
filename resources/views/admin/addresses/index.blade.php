@extends('adminlte::page')

@section('title', 'Admin | Endereços')

@section('content_header')
    <h1>
    <a href="{{ route('addresses.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>    
    </a>
      Endereços
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('addresses.index') }}" class="active">Endereços</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('addresses.search') }}" class="form form-inline" method="POST">
        @csrf
      <input type="text" name="street" placeholder="Rua" class="form-control" value="{{ $data['street'] ?? '' }}">
        <input type="text" name="neighborhood" placeholder="Bairro" class="form-control" value="{{ $data['neighborhood'] ?? '' }}">
        <input type="text" name="zipeCode" placeholder="CEP" class="form-control" value="{{ $data['zipeCode'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('addresses.index') }}">(X) Limpar Pesquisa</a>
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
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($addresses as $address)
                      <tr>
                        <th scope="row">{{ $address->id }}</th>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->number }}</td>
                        <td>{{ $address->neighborhood }}</td>                        
                        <td>{{ $address->zipeCode }}</td>
                        <td>{{ $address->complement }}</td>
                        <td>{{ $address->city->title }}</td>
                        <td>{{ $address->state->uf }}</td>
                        <td>
                            <a href="{{ route('addresses.edit', $address->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('addresses.show', $address->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $addresses->appends($data)->links() !!}
                 @else
                    {!! $addresses->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop