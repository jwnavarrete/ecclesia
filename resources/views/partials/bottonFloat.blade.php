
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-lg red waves-effect waves-light">
            <i class="fa fa-bars"></i>
        </a>
    
        <ul>
                
                    @if(auth()->user()->hasRole('admin'))
                        <li><a onclick="openWindows('cursos');" class="btn-floating red waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-graduation-cap"></i></a></li>
                        <li><a onclick="openWindows('usuarios');" class="btn-floating yellow darken-1 waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-users"></i></a></li>
                        <li><a onclick="openWindows('roles');" class="btn-floating green waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-sitemap"></i></a></li>
                        <li><a onclick="openWindows('inscripciones');" class="btn-floating blue waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-book"></i></a></li>
                    @else
                        <li><a onclick="openWindows('inscripciones');" class="btn-floating blue waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-book"></i></a></li>
                    @endif                    

        </ul>
    </div>