@extends('layouts.main')

@section('head')
    {!! HTML::style('/assets/css/reset.css') !!}
@stop

@section('content')
	
	<!--DARLING RUBEN CHAVEZ QUINDE
        * FORMULARIO PARA SOLICITAR RESTABLECER LA CONTRASEÑA
    -->
    {!! Form::open(['url' => url('/password/email'), 'class' => 'form-signin' ] ) !!}

        @include('includes.status')

        <h2 class="form-signin-heading">Resetear Contraseña</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}

        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviarme enlace de reinicio</button>

    {!! Form::close() !!}

@stop