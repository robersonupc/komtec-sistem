@extends('adminlte::page')

@section('title', 'Admin | Editar Cidade')

@section('content_header')
    <h1>    
        Editar de Cidade {{ $city->title }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('cities.index') }}">Cidades</a></li>
            <li><a href="{{ route('cities.edit', $city->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('cities.update', $city->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.cities._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop