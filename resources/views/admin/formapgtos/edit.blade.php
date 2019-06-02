@extends('adminlte::page')

@section('title', 'Admin | Editar Forma de Pagamento')

@section('content_header')
    <h1>    
         Editar de Forma de Pagamento {{ $formapgto->description }}
    </h1>  
    
    <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('formapgtos.index') }}">Forma de Pagamentos</a></li>
            <li><a href="{{ route('formapgtos.edit', $formapgto->id) }}" class="active">Editar</a></li>
    </ol>
    
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('formapgtos.update', $formapgto->id) }}" class="form" method="POST">
                   
                    {{ Form::model($formapgto, ['route' => ['formapgtos.update', $formapgto->id], 'class' => 'form']) }}
                        @method('PUT')
                        @include('admin.formapgtos._partials.form')
                    {{ Form::close() }}
                </form>
            </div>
        </div>
    </div>
@stop