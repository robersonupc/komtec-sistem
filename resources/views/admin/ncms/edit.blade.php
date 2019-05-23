@extends('adminlte::page')

@section('title', 'Admin | Editar NCM')

@section('content_header')
    <h1>    
         Editar de NCM {{ $ncm->code }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('ncms.index') }}">NCM</a></li>
            <li><a href="{{ route('ncms.edit', $ncm->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('ncms.update', $ncm->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.ncms._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop