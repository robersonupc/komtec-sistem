@extends('adminlte::page')

@section('title', 'Admin | Editar ICMS')

@section('content_header')
    <h1>    
         Editar ICMS {{ $icms->description }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('icmss.index') }}">ICMS</a></li>
            <li><a href="{{ route('icmss.edit', $icms->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('icmss.update', $icms->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.icmss._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop