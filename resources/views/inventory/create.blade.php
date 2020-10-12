@extends('style')

<style>
    body {
        background-color:rgb(230, 189, 224) !important;
    }
    </style>

@section('content')
<div class="container" style="margin-top:150px;">
    {!! Form::open(['action' => 'ProductController@create','method' => 'POST']) !!}
    <div class="form group">
        {{ Form::label('name', 'Nombre')}} <br>
        {{ Form::text('name', '',['class'=>'form-control', 'placeholder' => 'Inserta nombre'])}}
    </div>
    <div class="form group">
        {{ Form::label('description', 'Descripción')}} <br>
        {{ Form::textarea('description', '',['class'=>'form-control', 'placeholder' => 'Color - talla'])}}
    </div>
    <div class="form group">
        {{ Form::label('price', 'Precio')}} <br>
        {{ Form::text('price', '',['class'=>'form-control', 'placeholder' => 'precio'])}}
    </div>
    <div class="form group">
        {{ Form::label('disponibilidad', 'Disponibilidad')}} <br>
        {{ Form::text('disponibilidad', '',['class'=>'form-control', 'placeholder' => '0 = agotado, 1 = disponible'])}}
    </div>
    <div class="form group">
        {{ Form::label('type', 'Tipo')}} <br>
        {{ Form::text('type', '',['class'=>'form-control', 'placeholder' => '1 = bikinis, 2 = salidas, 3 = enteros, 4 = subtipo'])}}
    </div>
    <div class="form group">
        {{ Form::label('total_fotos', 'Total fotos')}} <br>
        {{ Form::text('total_fotos', '',['class'=>'form-control', 'placeholder' => 'total fotos en número'])}}
    </div>
    {{-- <div class="form group">
        {{ Form::label('mlink', 'MercadoLibre hl')}} <br>
        {{ Form::text('mlink', '',['class'=>'form-control', 'placeholder' => 'your title here'])}}
    </div> --}}
    <div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {{-- Will create a request to store method --}}
    </div>
    {!! Form::close() !!}
</div>

@endsection
