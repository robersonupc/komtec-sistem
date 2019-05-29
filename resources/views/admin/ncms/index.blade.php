@extends('adminlte::page')

@section('title', 'Admin | NCM')

@section('content_header')
    <h1>
    <a href="{{ route('ncms.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      NCM
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('ncms.index') }}" class="active">NCM</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('ncms.search') }}" class="form form-inline" method="POST">
        @csrf
        <input type="text" name="code" placeholder="Código" class="form-control" value="{{ $data['code'] ?? '' }}">
        <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
        <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">        
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('ncms.index') }}">(X) Limpar Pesquisa</a>
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
                        <th scope="col">Código</th>                        
                        <th scope="col">Descrição</th>
                        <th scope="col">URL</th>
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ncms as $ncm)
                    <tr>
                      <th scope="row">{{ $ncm->id }}</th>
                      <td>{{ $ncm->code }}</td>
                      <td>{{ $ncm->url }}</td>
                      <td>{{ $ncm->description }}</td>
                      <td>
                        <a href="{{ route('ncms.edit', $ncm->id) }}" class="badge bg-yellow">
                          Editar
                        </a>
                        <a href="{{ route('ncms.show', $ncm->id) }}" class="badge bg-info">
                          Detalhes
                        </a>
                      </td>
                    </tr> 
                    @endforeach                     
                  </tbody>
                  </table>

                  @if (isset($data))
                    {!! $ncms->appends($data)->links() !!}
                 @else
                    {!! $ncms->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop