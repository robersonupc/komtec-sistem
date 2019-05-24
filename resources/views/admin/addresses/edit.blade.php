@extends('adminlte::page')

@section('title', 'Admin | Editar Endereço')

@section('content_header')
    <h1>    
         Editar de Endereço {{ $address->street }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('addresses.index') }}">Endereços</a></li>
            <li><a href="{{ route('addresses.edit', $address->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('addresses.update', $address->id) }}" class="form" method="POST">
                   
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.addresses._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop