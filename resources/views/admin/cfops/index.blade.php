@extends('adminlte::page')

@section('title', 'Admin | CFOP')

@section('content_header')
    <h1>
    <a href="{{ route('cfops.create') }}" class="btn btn-success btn-add">
      <span class="glyphicon glyphicon-plus"></span>
    </a>
      CFOP
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('cfops.index') }}" class="active">CFOP</a></li>
    </ol>
    
@stop

@section('content')
   <div class="content row">

    <div class="box box-primary">
      <div class="box-body">
      <form action="{{ route('cfops.search') }}" class="form form-inline" method="POST">
        @csrf
        <input type="text" name="code" placeholder="Código" class="form-control" value="{{ $data['code'] ?? '' }}">        
        <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
        <input type="text" name="ent_sai" placeholder="Ent_Sai" class="form-control" value="{{ $data['ent_sai'] ?? '' }}">
        <input type="text" name="operacao" placeholder="Operação" class="form-control" value="{{ $data['operacao'] ?? '' }}">        
        <input type="text" name="numseq" placeholder="NumSeq" class="form-control" value="{{ $data['numseq'] ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
      </form>

      @if (isset($data))
        <a href="{{ route('cfops.index') }}">(X) Limpar Pesquisa</a>
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
                        <th scope="col">NumSeq</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">EntSai</th>
                        <th scope="col">Op.</th>
                        <th scope="col">Descr_Int</th>
                        <th scope="col">URL</th>                        
                        <th width="130px" scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($cfops as $cfop)
                      <tr>
                        <th scope="row">{{ $cfop->id }}</th>
                        <td>{{ $cfop->code }}</td>
                        <td>{{ $cfop->numseq }}</td>
                        <td>{{ $cfop->description }}</td>
                        <td>{{ $cfop->ent_sai }}</td>
                        <td>{{ $cfop->operacao }}</td>
                        <td>{{ $cfop->descr_int }}</td>
                        <td>{{ $cfop->url }}</td>
                        
                        <td>
                            <a href="{{ route('cfops.edit', $cfop->id) }}" class="badge bg-yellow">
                             Editar
                            </a>
                            <a href="{{ route('cfops.show', $cfop->id) }}" class="badge bg-info">
                              Detalhes
                            </a>
                        </td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>

                  @if (isset($data))
                    {!! $cfops->appends($data)->links() !!}
                  @else
                    {!! $cfops->links() !!}
                  @endif

            </div>
        </div>
   </div>
@stop