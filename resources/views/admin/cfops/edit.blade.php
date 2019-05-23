@extends('adminlte::page')

@section('title', 'Admin | Editar CFOP')

@section('content_header')
    <h1>    
         Editar de CFOP {{ $cfop->description }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('cfops.index') }}">CFOP</a></li>
            <li><a href="{{ route('cfops.edit', $cfop->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('cfops.update', $cfop->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.cfops._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop