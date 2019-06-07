@extends('layout')

@section('content')
    <section class="pages container">
      <div class="page page-about">
        <h1 class="text-capitalize">Usted no tiene permiso para ejecutar la accion Solicitada</h1>
        <p>Regresar a <a href="{{ route('inicio') }}">Inicio</a></p>
      </div>
    </section>

@endsection