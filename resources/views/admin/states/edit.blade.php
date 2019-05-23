@extends('adminlte::page')

@section('title', 'Admin | Editar UF')

@section('content_header')
    <h1>    
         Editar de UF {{ $state->title }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('states.index') }}">UFs</a></li>
            <li><a href="{{ route('states.edit', $state->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('states.update', $state->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.states._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop