@extends('admin.layout')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
   
        <link href="{{asset('css/plantilla.css')}}" rel="stylesheet"> <!--Añadimos el css generado con webpack-->
        <link rel="stylesheet" href='{{url("css/star-rating.css")}}'>
        <link rel="stylesheet" href='{{ url("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}'>
    @section('content')
            <div id="app" ><!--La equita id debe ser app, como hemos visto en app.js-->
                <rating-component></rating-component><!--Añadimos nuestro componente vuejs-->
            </div>
        <script src="{{asset('js/app.js')}}"></script> <!--Añadimos el js generado con webpack, donde se encuentra nuestro componente vuejs-->
    @endsection
</html>