<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'ICIR - IGLESIA DE CRISTO IBEROAMERICANA EL RECREO') }}</title>

    <meta name="description" content="Laravel 5.3 bootstrap app with Multi Auth, Social and Email Authentication. Google re-Captcha, Facebook, Twitter, G+ and much more...">
    <meta name="author" content="John Navarrete">
    <link rel="shortcut icon" href="https://tuts.codingo.me/assets/img/box.png">

    <meta property="og:url" content="http://www.iglesiaicir.org">
    <meta property="og:title" content="Live Demo of Laravel 5.3 app with Multi-authentication and Social logins">
    <meta property="og:description" content="Laravel 5.3 bootstrap app with Multi Auth, Social and Email Authentication. Google re-Captcha, Facebook, Twitter, G+ and much more...">
    <meta property="og:image" content="https://tuts.codingo.me/wp-content/uploads/2016/10/social-og.png">
    <meta property="og:site_name" content="Codingo Tuts">
    <meta property="og:image:type" content="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/compiled.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend-all-demo.css') }}">    
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menuSortable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap4.min.css') }}">          
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">          
    {!! HTML::style('/assets/css/parsley.css') !!}

    @yield('head')    
    
</head>

 
<body id="body"  class="@if(Session::has('theme')) {{ Session::get('theme')}} @else hidden-sn mdb-skin @endif">
<!-- LUIS ALFREDO LLAQUE GAIBOR
    PANTALLA PRICIPAL DES SISTEMA ECCLESIA
-->
<header>
    
    <!-- LUIS ALFREDO LLAQUE GAIBOR
        * MENU DE OPCIONES HUBICADO AL LADO IZQUIERDO DE LA PANTALLA PRINCIPAL
    -->
    @include('partials.sidebar')        
    
    <!-- LUIS ALFREDO LLAQUE GAIBOR
        * SECCION PARA DESPLEGAR MENSAJES O NOTIFICACIONES POR PANTALLA
    -->
    @include('partials.above-navbar-alert')
    
    <!-- LUIS ALFREDO LLAQUE GAIBOR
        * MENU DE OPCIONES EN LA PARTE SUPERIOR
    -->
    @include('partials.navbar')
    
</header>

<div class="container">
        
    <div style="height: 60px;"></div>
    @yield('content')

</div> <!-- /container -->


<!-- LUIS ALFREDO LLAQUE GAIBOR
    * LIBRERIAS SCRIPTS USADOS EN TODO EL PROYECTO
-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/mdb.min.js"></script>
<script src="/assets/js/compiled.min.js"></script>
<script src="{{ asset('assets/js/libGeneral.js') }}"></script>
{!! HTML::script('/assets/plugins/parsley.min.js') !!}
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/js/jquery-confirm.js"></script>
<script src="/assets/js/jquery-ui.js"></script>
<script src="/assets/js/jquery.mjs.nestedSortable.js"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>

@yield('footer')

@stack('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60551246-3', 'auto');
    ga('send', 'pageview');

    // SideNav Initialization  
    $(".button-collapse").sideNav();
    new WOW().init();
    
    var themes = {
        "white": "hidden-sn white-skin",
        "black": "hidden-sn black-skin",
        "cyan": "hidden-sn cyan-skin",
        "mdb": "hidden-sn mdb-skin",
        "purple": "hidden-sn deep-purple-skin",
        "blue": "hidden-sn navy-blue-skin",
        "pink": "hidden-sn pink-skin",
        "indigo": "hidden-sn indigo-skin",
        "light-blue": "hidden-sn light-blue-skin",
        "grey": "hidden-sn grey-skin"        
    }
  
   $(document).ready(function(){
        $('.theme-link').click(function() {       
            var themeurl = themes[$(this).attr('data-theme')];
            $("#body").removeClass();
            $("#body").addClass(themeurl);
          
            $.ajax({
                type: 'POST',
                url: "set_session",
                data: { theme: themeurl }
            });          
        });
        
        $( ".theme-switcher" ).click(function() {
            if($("#theme-options").hasClass("active")){
                $("#theme-options").removeClass("active");
            }else{
                $("#theme-options").addClass("active");        
            }
        });       

        var current_path = window.location.pathname.split('/').pop();

        padre = $( "."+current_path ).attr("padre");
        if (padre){            
            $( "."+padre ).addClass("active");
            $( "."+padre ).parent().addClass("active");            
            $("."+current_path).closest('.collapsible-body').show();
        }else{
            $( "."+current_path ).addClass("active");
        }        
    });

    function eliminar(obj){
        $.confirm({
            title: 'Alerta!',
                content: obj.texto,
                autoClose: 'eliminar|10000',
                buttons: {
                    eliminar: {
                        text: 'Eliminar',
                        action: function () {                            
                            if(typeof obj.callback == 'function'){
                                obj.callback(obj.data);
                            }
                        }
                    },
                    cancel: function () {
                        $.alert('cancelado');
                    }
                
                }
            });
    }
</script>

  
@include('includes.status')
    
</body>
</html>

