@php
    use App\Models\Ministerio;    
@endphp

<section id="ministerios" >
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s">Ministerios</h2>
    <hr class=" mb-5">                    
    @foreach(Ministerio::getMinisterios() as $key => $ministerios)                                                 
        <div class="row mb-3 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
            @foreach($ministerios as $index => $ministerio)                                         
                <div class="col-md-2 mb-5 flex-center">
                    <img src="/img/ministerios/{{$ministerio->foto}}" class="img-fluid z-depth-1 rounded-circle">
                </div>                
                <div class="col-md-4 text-center text-md-left mb-3">
                    <h4>{{$ministerio->titulo}}</h4>
                    <h5 class="grey-text mt-4">{{$ministerio->dia}}  ({{$ministerio->desde}} - {{$ministerio->hasta}})</h5>
                    <p class="grey-text mt-4">{{$ministerio->descripcion}}</p>
                </div>                
            @endforeach
        </div>
    @endforeach
</section>