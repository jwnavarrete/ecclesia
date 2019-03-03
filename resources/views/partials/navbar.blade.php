<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <!-- LUIS ALFREDO LLAQUE GAIBOR
        * DESPLIEGA BOTON PARA ABRIR EL MENU LATERAL
    -->
    <div class="float-left">
        @if(Auth::check())
            <a data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>        
        @endif    
    </div>

    <div class="breadcrumb-dn mr-auto">            
        <ol class="breadcrumb d-inline-flex pl-0 pt-0">
            <!-- LUIS ALFREDO LLAQUE GAIBOR
                * DESPLIEGA EL NOMBRE DE LA VISTA QUE SE ESTA MOSTRANDO
            -->
            @if(Auth::check())
                <li class="breadcrumb-item"><i class="fa fa-home"></i> <a class="white-text" href="{{route('home')}}"> Inicio</a></li>
                @yield('breadcrumb')
            @endif
        </ol>
    </div>
    
    <div id="js-scrollspy">
        <!-- LUIS ALFREDO LLAQUE GAIBOR
            * DESPLIEGA MENU SUPERIOR AL LADO DERECHO (VOLVER A LA WEB, CERRAR SESSION)
        -->
        <ul  class="nav navbar-nav nav-flex-icons ml-auto">                        
            <li class="nav-item">                        
                <a class="nav-link waves-effect waves-light" onclick="openWindows('/')"><i class="fa fa-globe"></i> <span class="clearfix d-none d-sm-inline-block">Volver a la Web</span></a>
            </li>
            @if(Auth::check())                    
                <li class="nav-item">                        
                    <a class="nav-link waves-effect waves-light" href="{{ url('logout') }}">
                        <img src="{{URL::asset(Auth::user()->foto)}}" class="img-circle" height="25" width="25" alt="User Image"/> Salir
                    </a>
                </li>                            
            @endif
        </ul>      
    </div>                  
</nav>





