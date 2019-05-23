@extends('adminlte::page')

@section('title', 'Admin | UFs')

@section('content_header')
    <h1>
    <a href="{{ route('states.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      Estados
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('states.index') }}" class="active">UFs</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('states.search') }}" class="form form-inline" method="POST">
        @csrf
      <input type="text" name="title" placeholder="Título" class="form-control" value="{{ $data['title'] ?? '' }}">
        <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
        <input type="text" name="uf" placeholder="Descrição" class="form-control" value="{{ $data['uf'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('states.index') }}">(X) Limpar Pesquisa</a>
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
                        <th scope="col">Nome</th>
                        <th scope="col">URL</th>
                        <th scope="col">UF</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                      <tr>
                        <th scope="row">{{ $state->id }}</th>
                        <td>{{ $state->title }}</td>
                        <td>{{ $state->url }}</td>
                        <td>{{ $state->uf }}</td>
                        <td>
                            <a href="{{ route('states.edit', $state->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('states.show', $state->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $states->appends($data)->links() !!}
                 @else
                    {!! $states->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop