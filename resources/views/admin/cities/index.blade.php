@extends('adminlte::page')

@section('title', 'Admin | Cidades')

@section('content_header')
    <h1>
    <a href="{{ route('cities.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      Cidades
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('cities.index') }}" class="active">Cidades</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">
   
    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('cities.search') }}" class="form form-inline" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Cidade" class="form-control" value="{{ $data['title'] ?? '' }}">
        <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('cities.index') }}">(X) Limpar Pesquisa</a>
      @endif
      </div>
    </div>
    @include('admin.includes.alerts')
        <div class="box box-primary">
            <div class="box-body">
              
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">URL</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                      <tr>
                        <th scope="row">{{ $city->id }}</th>
                        <td>{{ $city->title }}</td>
                        <td>{{ $city->url }}</td>
                        <td>
                            <a href="{{ route('cities.edit', $city->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('cities.show', $city->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>                        
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>
                  @if (isset($data))
                    {!! $cities->appends($data)->links() !!}
                 @else
                    {!! $cities->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop