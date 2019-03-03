@php
    use App\Models\Convenio; 
    $convenio = Convenio::first();   
    $arrImagenes = json_decode($convenio->imagenes);
@endphp


<style>
    .imgStyle{height:200px !important  ; width: 400px!important;}
</style>
<section class="section" id="convenio">
    <br>    
    <h2 class="teal-text font-up font-bold mt-5 mb-2 wow fadeIn" data-wow-delay=".2s">{{$convenio->titulo}}</h2>
    <p>{{$convenio->descripcion}}</p>    
    <hr class=" mb-5">

    <div class="row text-center mb-4">

        @foreach($arrImagenes as $key => $imagen)   
            <div class="col-lg-4 col-md-12 mb-5 wow fadeIn" data-wow-delay=".4s">        
                <div class="view overlay hm-white-slight z-depth-1 hm-zoom">
                    <img src="{{$convenio->ruta}}{{$imagen}}" class="img-fluid imgStyle">
                </div>

                @if($key == 1)
                    <div class="card-block">
                        <a class="btn btn-teal btn-rounded" target="_blank"  href="{{$convenio->ruta}}{{$convenio->contrato}}"><i class="fa fa-clone left"></i>Descargar Contrato</a>
                    </div>
                @endif
            </div>
        @endforeach        
    </div>

</section>
