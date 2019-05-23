@extends('adminlte::page')

@section('title', 'Admin | ICMS')

@section('content_header')
    <h1>
    <a href="{{ route('icmss.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      ICMS
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('icmss.index') }}" class="active">ICMS</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('icmss.search') }}" class="form form-inline" method="POST">
        @csrf
        <input type="text" name="uf" placeholder="UF" class="form-control" value="{{ $data['uf'] ?? '' }}">
        <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
        <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('icmss.index') }}">(X) Limpar Pesquisa</a>
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
                        <th scope="col">UF</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Aliquotoa</th>
                        <th scope="col">URL</th>                        
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($icmss as $icms)
                      <tr>
                        <th scope="row">{{ $icms->id }}</th>
                        <td>{{ $icms->uf }}</td>
                        <td>{{ $icms->description }}</td>
                        <td>{{ $icms->aliqicms }} %</td>
                        <td>{{ $icms->url }}</td>                        
                        <td>
                            <a href="{{ route('icmss.edit', $icms->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('icmss.show', $icms->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $icmss->appends($data)->links() !!}
                 @else
                    {!! $icmss->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop