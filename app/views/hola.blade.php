@extends('layouts.master')

@section('titulo')
Bienvenido a mi pagina
@stop

@section('cabecera')
	@parent
	<link rel="stylesheet" type="text/css" href="estilo2.css">
@stop

@section('contenido')
Esto es el contenido
@stop

@section('pie')
Esto es el pie de la página


{{ $nombre }}
<?php echo $nombre; ?>

{{-- comentario --}}

@foreach($a as $b)

@endforeach

@if($a == 1)

@else

@endif


@stop
