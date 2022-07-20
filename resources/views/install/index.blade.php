@extends('layouts.install', ['no_header' => 1])
@section('title', 'Bienvenido - Instalación')

@section('content')
<div class="container">
    
    <div class="row">
      <h3 class="text-center">MPDigital POS - Instalación <small>Paso 1 de 3</small></h3>

        <div class="col-md-8 col-md-offset-2">
          <hr/>
          @include('install.partials.nav', ['active' => 'install'])

          <div class="box box-primary active">
            <!-- /.box-header -->
            <div class="box-body">
              <h3 class="text-success">
                ¡Bienvenido a la instalación del Sistema POS!
              </h3>
              <p><strong class="text-danger">[IMPORTANTE]</strong> Antes de comenzar con la instalación, asegúrese de tener la siguiente información preparada:</p>

              <ol>
                <li>
                  <b>Nombre de la aplicación</b> - Algo breve y significativo.
                </li>
                <li>
                  <b>Información de la base de datos:</b>
                  <ul>
                    <li>Nombre de usuario</li>
                    <li>Contraseña</li>
                    <li>Nombre de la base de datos</li>
                    <li>Host de base de datos</li>
                  </ul>
                </li>
                <li>
                  <b>Configuración de correo</b> - Detalles de SMTP (opcional)
                </li>
                <li>
                  <b>Detalles de MPDigital:</b>
                  <ul>
                    <li><b>Código de compra.</b></li>
                    <li><b>Nombre de usuario.</b></li>
                  </ul>
                </li>
              </ol>

              @include('install.partials.e_license')
              
              <a href="{{route('install.details')}}" class="btn btn-primary pull-right">Acepto, continuar...</a>
            </div>
          <!-- /.box-body -->
          </div>

        </div>

    </div>
</div>
@endsection
