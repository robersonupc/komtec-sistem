@extends('adminlte::page')

@section('title', 'Admin | Editar Endereço')

@section('content_header')
    <h1>    
      Editar Endereço {{ $address->rua }}
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

                {{ Form::model($address, ['route' => ['addresses.update', $address->id], 'class' => 'form']) }}
                    @method('PUT')
                    @include('admin.addresses._partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop