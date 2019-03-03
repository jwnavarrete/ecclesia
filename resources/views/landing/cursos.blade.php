<?php
    use App\Models\Cursos;
    $cursoModel = new Cursos
?>

<section id="cursos" class="section extra-margins">
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s">Cursos Recientes</h2>
    <hr class=" mb-5">                
    
    <div class="col-md-12">

        <div id="multi-item-predica" class="carousel testimonial-carousel slide carousel-multi-item wow fadeIn" data-ride="carousel" style="visibility: visible; animation-name: fadeIn;">

            <div class="controls-top">
                <a class="btn-floating teal darken-4 waves-effect waves-light" href="#multi-item-predica" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating teal darken-4 waves-effect waves-light" href="#multi-item-predica" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>

            <ol class="carousel-indicators">
                @foreach($arrCursos as $key => $cursos)                                                 
                    <li data-target="#multi-item-predica" data-slide-to="{{$key}}" class="teal darken-4 {{$key==0? 'active' :''}}"></li>                    
                @endforeach
            </ol>
            
            <div class="carousel-inner text-center" role="listbox">                    
                    
                @foreach($arrCursos as $key => $cursos)                                                 
                    <div class="carousel-item {{$key==0 ? 'active': '' }}" >                                
                        @foreach($cursos as $index => $curso)                            
                            <div class="col-md-4">
                                <div class="" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                                    
                                    <div class="card card-image mb-6" style="background-image: url('img/cursos/{{ $curso->foto }}');">
                                        
                                        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                            <div class="col-md-12 mb-4">
                                                
                                                <h5 class="card-title pt-2">
                                                    <strong>{{ $curso->titulo }}</strong>
                                                </h5>
                                                <p>
                                                    <i class="fa fa-calendar"></i> Inicia:
                                                    {{ Carbon\Carbon::parse($curso->fec_inicio)->format('d-m-Y') }}
                                                </p>
                                                
                                                <p>
                                                    Hora: {{ Carbon\Carbon::parse($curso->fec_inicio)->format('h') }}
                                                        : {{ Carbon\Carbon::parse($curso->fec_inicio)->format('i') }}
                                                </p>
                                                
                                                <p>
                                                    <i class="fa fa-calendar"></i> Termina:
                                                    {{ Carbon\Carbon::parse($curso->fec_fin)->format('d-m-Y') }}
                                                </p>
                                                
                                                <p>
                                                    Hora: {{ Carbon\Carbon::parse($curso->fec_fin)->format('h') }}
                                                        : {{ Carbon\Carbon::parse($curso->fec_fin)->format('i') }}
                                                </p>                                            

                                                <p>Capacidad: {{$curso->capacidad}}</p>

                                                @php                                            
                                                    $inscritos =  $cursoModel->getLimiteCurso($curso->id);                                                  
                                                @endphp  

                                                <p>Inscritos: {{$inscritos}}</p>

                                                
                                                @if($inscritos < $curso->capacidad)                                            
                                                    <a href="{{ route('inscripcion', ['id'=>$curso->id]) }}" class="btn btn-teal waves-effect waves-light">Inscribirse</a>                                        
                                                @else
                                                    <a onclick="alert('Curso llego a su capacidad maxima', 'Error');" class="btn btn-teal waves-effect waves-light">Inscribirse</a>                                        
                                                @endif
                                            
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>             
                        @endforeach
                    </div>
                @endforeach
                    
            </div>            
        </div>
        
    </div>    
</section>
