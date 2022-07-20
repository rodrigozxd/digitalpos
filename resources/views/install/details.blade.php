@extends('layouts.install', ['no_header' => 1])
@section('title', 'Detalles - Instalación')

@section('content')
<div class="container">
    <div class="row">
        <h3 class="text-center">MPDigital POS - Instalación <small>Paso 2 de 3</small></h3>

        <div class="col-md-8 col-md-offset-2">
          <hr/>
          @include('install.partials.nav', ['active' => 'app_details'])

          <div class="box box-primary active">
            <!-- /.box-header -->
            <div class="box-body">

              @if(session('error'))
                <div class="alert alert-danger">
                  {!! session('error') !!}
                </div>
              @endif

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                </div>
              @endif

              <form class="form" id="details_form" method="post" 
                      action="{{route('install.postDetails')}}">
                  {{ csrf_field() }}

                  <h4>Detalles de la aplicación</h4>
                  <hr/>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="app_name">Nombre de la aplicación:*</label>
                        <input type="text" class="form-control" name="APP_NAME" id="app_name" placeholder="MPDigital POS" required>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="app_title">Titulo de la aplicación:</label>
                        <input type="text" name="APP_TITLE" class="form-control" id="app_title">
                    </div>
                  </div>

                <h4> Detalles de la licencia <small class="text-danger">Asegúrese de proporcionar información correcta</small></h4>
                <hr/>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="envato_purchase_code">DNI / Código:*</label>
                        <input type="password" name="ENVATO_PURCHASE_CODE" required class="form-control" id="envato_purchase_code">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="envato_username">Primer Nombre:*</label>
                        <input type="text" name="ENVATO_USERNAME" required class="form-control" id="envato_username">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="envato_email">Correo Electrónico:</label>
                        <input type="email" name="ENVATO_EMAIL" class="form-control" id="envato_email" placeholder="opcional">
                        <p class="help-block">Para soporte</p>
                    </div>
                </div>

                  @if($activation_key)
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="envato_purchase_code">Código de licencia de activación:*</label>
                          <input type="password" name="MAC_LICENCE_CODE" required class="form-control" id="activation_licence_code">
                      </div>
                    </div>
                  @endif
                  
                  <div class="clearfix"></div>
                  
                  <h4> Detalles de la base de datos <small>Asegúrese de proporcionar la información correcta</small></h4>
                  <hr/>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="db_host">Host:*</label>
                        <input type="text" class="form-control" id="db_host" name="DB_HOST" required placeholder="localhost / 127.0.0.1">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="db_port">Puerto:*</label>
                        <input type="text" class="form-control" id="db_port" name="DB_PORT" required value="3306">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="db_database">Nombre:*</label>
                        <input type="text" class="form-control" id="db_database" name="DB_DATABASE" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="db_username">Nombre de usuario:*</label>
                        <input type="text" class="form-control" id="db_username" name="DB_USERNAME" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="db_password">Contraseña:*</label>
                        <input type="password" class="form-control" id="db_password" name="DB_PASSWORD" required>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <h4>Configuración de correo electrónico<small> Usar para enviar correos</small></h4>
                  <hr/>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="MAIL_DRIVER">Enviar correos usando:*</label>
                        <select class="form-control" name="MAIL_DRIVER" id="MAIL_DRIVER">
                          <option value="sendmail">PHP Mail</option>
                          <option value="smtp">SMTP</option>
                        </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="MAIL_FROM_ADDRESS">Dirección predeterminada:*</label>
                        <input type="email" class="form-control" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" placeholder="info@mpdigital.com" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="MAIL_FROM_NAME">Por defecto de nombre:</label>
                        <input type="text" class="form-control" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" placeholder="MPDigital POS (Opcional)">
                    </div>
                  </div>

                  <div class="col-md-4 smtp hide">
                    <div class="form-group">
                        <label for="MAIL_HOST">SMTP Host:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_HOST" name="MAIL_HOST" required disabled>
                    </div>
                  </div>

                  <div class="col-md-4  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_PORT">SMTP Mail Port:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_PORT" name="MAIL_PORT" required disabled>
                    </div>
                  </div>

                  <div class="col-md-4  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_ENCRYPTION">SMTP Mail Encryption:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" required disabled placeholder="tls or ssl">
                    </div>
                  </div>

                  <div class="col-md-6  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_USERNAME">SMTP Nombre de usuario:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_USERNAME" name="MAIL_USERNAME" required disabled>
                    </div>
                  </div>

                  <div class="col-md-6  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_PASSWORD">SMTP Contraseña:*</label>
                        <input type="password" class="form-control smtp_input" id="MAIL_PASSWORD" name="MAIL_PASSWORD" required disabled>
                    </div>
                  </div>

                  <hr/>

                  <div class="col-md-12">
                    <a href="{{route('install.index')}}" class="btn btn-default pull-left back_button" tabindex="-1">atrás</a>
                    <button type="submit" id="install_button" class="btn btn-primary pull-right">Instalar</button>
                  </div>

                  <div class="col-md-12 text-center text-danger install_msg hide">
                    <strong>Instalación en curso, no actualice, retroceda ni cierre el navegador.</strong>
                  </div>

              </form>
            </div>
          <!-- /.box-body -->
          </div>
        </div>

    </div>
</div>
@endsection

@section('javascript')
  <script type="text/javascript">
    $(document).ready(function(){
      $('select#MAIL_DRIVER').change(function(){
        var driver = $(this).val();

        if(driver == 'smtp'){
          $('div.smtp').removeClass('hide');
          $('input.smtp_input').attr('disabled', false);
        } else {
          $('div.smtp').addClass('hide');
          $('input.smtp_input').attr('disabled', true);
        }
      })

      $('form#details_form').submit(function(){
        $('button#install_button').attr('disabled', true).text('Instalando...');
        $('div.install_msg').removeClass('hide');
        $('.back_button').hide();
      });

    })
  </script>
@endsection