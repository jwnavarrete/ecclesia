<?php
use App\Models\About;
$arrAbout = About::all();
?>

<section id="about" class="section"> 
    <br>    
    <h2 class="teal-text font-up font-bold mt-5 mb-2 wow fadeIn" data-wow-delay=".2s">{{$parametro->titulo_about}}</h2>
    <p>{{$parametro->descripcion_about}}</p>    
          
    <div class="row wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
        
        <div class="row">						
            <div class="mb-2">						
                <!--MIGUEL ANGEL CHAVEZ DELGADO
                   * RECORREMOS ARREGLO CON LOS REGISTROS PARA CREAR EL TAB                   
                -->
                <ul class="nav md-pills  nav-justified   d-flex justify-content-center" role="tablist">
                    @foreach($arrAbout as $key => $value)                    
                        <li class="nav-item">                            
                            <a class="nav-link {{$value->orden ==1 ? 'active': '' }}" data-toggle="tab" href="{{$value->enlace}}" role="tab" aria-expanded="true"> {{$value->name}}</a>
                        </li>
                    @endforeach
                    
                </ul>						
            </div>

            <div class="tab-content">
                <!--MIGUEL ANGEL CHAVEZ DELGADO
                   * RECORREMOS ARREGLO CON LOS REGISTROS (ACERCA DE NOSOTROS) Y MOSTRAMOS POR PANTALLA
                   * FOTO
                   * TITULO 
                   * DESCRIPCION
                -->
                @foreach($arrAbout as $key => $value)                    
                    <div class="tab-pane fade in {{$value->orden ==1 ? 'active': '' }} show" id="{{$value->panel}}" role="tabpanel" aria-expanded="true">
                        <br>
                        <div class="row">							                            
                            <div class="col-lg-5 col-md-12">
                                <div class="view overlay hm-white-slight z-depth-1 z-depth-2 mb-2">
                                    <img src="img/about/{{$value->foto}}">
                                </div>
                            </div>
                            <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">                                                            
                                <h4 class="mb-5">{{$value->titulo}}</h4>                                    
                                <p class="text-muted">{{$value->descripcion}}</p>

                                @php echo $value->extra @endphp
                                
                            </div>
                        </div>
                     
                    </div>
                @endforeach

            </div>            
        </div>        
    </div>
</section>