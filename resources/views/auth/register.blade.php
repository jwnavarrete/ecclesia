@extends('layouts.main')

@section('head')
    {!! HTML::style('/assets/css/register.css') !!}
    {!! HTML::style('/assets/css/parsley.css') !!}
@stop

@section('content')

    {!! Form::open(['url' => url('register'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

        @include('includes.errors')
        <!--DARLING RUBEN CHAVEZ QUINDE
            * FORMULARIO PARA REGISTRO DE UN NUEVO USUARIO WEB
        -->
        <h2 class="form">Formulario de registro</h2>
        <div class="col-md-12">
            
            <div class="row">

                <div class="col-md-12">            
                    <label for="inputEmail" class="sr-only">Correo</label>
                    {!! Form::email('email', null, [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Correo',
                        'required',
                        'id'                            => 'inputEmail',
                        'data-parsley-required-message' => 'El correo es obligatorio',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-type'             => 'email'
                    ]) !!}
                </div>
                <div class="col-md-12">
                    <label for="inputFirstName" class="sr-only">Nombre</label>
                    {!! Form::text('first_name', null, [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Nombre',
                        'required',
                        'id'                            => 'inputFirstName',
                        'data-parsley-required-message' => 'El nombre es obligatorio',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                        'data-parsley-minlength'        => '2',
                        'data-parsley-maxlength'        => '32'
                    ]) !!}
                </div>
                <div class="col-md-12">            
                    <label for="inputLastName" class="sr-only">Apellido</label>
                    {!! Form::text('last_name', null, [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Apellido',
                        'required',
                        'id'                            => 'inputLastName',
                        'data-parsley-required-message' => 'El apellido es obligatorio',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                        'data-parsley-minlength'        => '2',
                        'data-parsley-maxlength'        => '32'
                    ]) !!}
                </div>

                <div class="col-md-12">            
                    <label for="inputPassword" class="sr-only">Clave</label>
                    {!! Form::password('password', [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Clave',
                        'required',
                        'id'                            => 'inputPassword',
                        'data-parsley-required-message' => 'La contraseña es obligatoria',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-minlength'        => '6',
                        'data-parsley-maxlength'        => '20'
                    ]) !!}
                </div>

                <div class="col-md-12">            
                    <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
                    {!! Form::password('password_confirmation', [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Confirmacion de clave',
                        'required',
                        'id'                            => 'inputPasswordConfirm',
                        'data-parsley-required-message' => 'La confirmacion de la clave es obligatoria',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-equalto'          => '#inputPassword',
                        'data-parsley-equalto-message'  => 'Las claves no son las mismas',
                    ]) !!}
                </div>            
                
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary pull-right register-btn" type="submit">Registrar</button>
                </div>
                
            </div>
        </div>

    {!! Form::close() !!}

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

    {!! HTML::script('/assets/plugins/parsley.min.js') !!}

    
    
@stop