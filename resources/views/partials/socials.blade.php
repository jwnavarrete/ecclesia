<!--DARLING RUBEN CHAVEZ QUINDE
    * BOTONES PARA INGRESAR AL SISTEMA POR MEDIO DE LAS REDES SOCIALES
-->

<div class="row my-3 d-flex justify-content-center">
    
    <!--<a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" type="button" class="btn-floating my-1 btn-fb waves-effect waves-light">
        <i class="fa fa-facebook"></i>
    </a>-->

    <a href="{{ route('social.redirect', ['provider' => 'twitter']) }}" type="button" class="btn-floating my-1 btn-tw waves-effect waves-light">
        <i class="fa fa-twitter"></i>
    </a>
    
    <a href="{{ route('social.redirect', ['provider' => 'google']) }}" type="button" class="btn-floating my-1 btn-gplus waves-effect waves-light">
        <i class="fa fa-google-plus"></i>
    </a>

</div>
