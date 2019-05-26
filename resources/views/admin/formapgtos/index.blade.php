@extends('adminlte::page')

@section('title', 'Admin | FormaPgtos')

@section('content_header')
    <h1>
    <a href="{{ route('formapgtos.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      Forma de Pagamentos
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('formapgtos.index') }}" class="active">Forma de Pagamentos</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('formapgtos.search') }}" class="form form-inline" method="POST">
        @csrf
      <input type="text" name="description" placeholder="Título" class="form-control" value="{{ $data['description'] ?? '' }}">
        <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
        <input type="text" name="parcela" placeholder="Parcelas" class="form-control" value="{{ $data['parcela'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('formapgtos.index') }}">(X) Limpar Pesquisa</a>
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
                        <th scope="col">Descrição</th>
                        <th scope="col">Parcelas</th>
                        <th scope="col">Prazo Inicial</th>
                        <th scope="col">Dias Entre Parcelas</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($formapgtos as $formapgto)
                      <tr>
                        <th scope="row">{{ $formapgto->id }}</th>
                        <td>{{ $formapgto->description }}</td>
                        <td>{{ $formapgto->parcela }}</td>
                        <td>{{ $formapgto->prazoinicial }}</td>
                        <td>{{ $formapgto->diasentreparcelas }}</td>
                        <td>
                            <a href="{{ route('formapgtos.edit', $formapgto->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('formapgtos.show', $formapgto->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $formapgtos->appends($data)->links() !!}
                 @else
                    {!! $formapgtos->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop