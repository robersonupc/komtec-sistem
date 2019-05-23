@extends('adminlte::page')

@section('title', 'Admin | Marcas')

@section('content_header')
    <h1>
    <a href="{{ route('brands.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      Marcas
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('brands.index') }}" class="active">Marcas</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('brands.search') }}" class="form form-inline" method="POST">
        @csrf
      <input type="text" name="title" placeholder="Título" class="form-control" value="{{ $data['title'] ?? '' }}">
        <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
        <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('brands.index') }}">(X) Limpar Pesquisa</a>
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
                        <th scope="col">Título</th>
                        <th scope="col">URL</th>
                        <th scope="col">Descrição</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                      <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>{{ $brand->title }}</td>
                        <td>{{ $brand->url }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            <a href="{{ route('brands.edit', $brand->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('brands.show', $brand->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $brands->appends($data)->links() !!}
                 @else
                    {!! $brands->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop