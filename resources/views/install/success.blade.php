@extends('layouts.install', ['no_header' => 1])
@section('title', 'Instalación completada')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="page-header text-center">{{ config('app.name', 'POS') }}</h1>

        <div class="col-md-8 col-md-offset-2">
          <h3 class="text-success">Genial! <br/>Su aplicación se instaló correctamente.</h3>
		  <hr>
          <p>Empiece por registrar su negocio <a href="{{route('business.getRegister')}}">aquí</a>.</p>
        </div>
    </div>
</div>
@endsection
