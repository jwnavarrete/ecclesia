@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="/assets/css/signin.css">
    <link rel="stylesheet" href="/assets/css/parsley.css">
@stop

@section('content')

    <section class="mt-lg-5">
        
        {!! Form::open(['url' => url('login'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}            
            
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>           
                <label for="inputEmail" class="sr-only">Email address</label>
                {!! Form::email('email', null, [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Correo electronico',
                    'required',
                    'id'                            => 'inputEmail',
                    'data-parsley-required-message' => '        El correo es obligatorio',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-type'             => 'email'
                ]) !!}
            </div>
            
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>              
                <label for="inputPassword" class="sr-only">Clave</label>
                {!! Form::password('password', [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Clave',
                    'required',
                    'id'                            => 'inputPassword',
                    'data-parsley-required-message' => '        La clave es obligatoria',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-minlength'        => '6',
                    'data-parsley-maxlength'        => '20'
                ]) !!}
                <p class="font-small grey-text d-flex justify-content-end">Olvidaste tu <a href="{{ url('password/reset') }}" class="dark-grey-text ml-1 font-bold" >contraseña?</a> </p>        
            </div>
            
            <div class="form-group">
                <fieldset class="form-group">
                    {!! Form::checkbox('remember', 1, null, ['id' => 'remember-me']) !!}
                    <label for="remember-me">Recuerdame</label>
                </fieldset>
            </div>
            

            <div class="row d-flex align-items-center mb-4">            
                <div class="col-md-3 col-md-6 text-center center-block">
                    <button type="submit" class="btn btn-pink btn-block btn-rounded z-depth-1 waves-effect waves-light center-block"/>Ingresar</button>
                </div>    
                <br>        
                <div class="col-md-6">
                    <p class="font-small grey-text d-flex justify-content-end">No tienes cuenta? 
                        <a href="{{ url('register') }}" class="blue-text ml-1"> Registrarse</a>
                    </p>
                </div>            
            </div>

        {!! Form::close() !!}
        
    </section>                
@stop

@section('footer')

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>    
@stop