<!-- LUIS ALFREDO LLAQUE GAIBOR
    * RECORRE TODOS LOS ACCESOS DIRECTOS ASIGNADOS AL USUARIO Y LOS MUESTRA EN LA PANTALLA PRINCIPAL
-->
<div class="row">    
    
    @foreach($lista->getCard() as $key => $card)                    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card">
                <div class="row mt-3">
                    <div class="col-md-5 col-5 text-left pl-4">
                        <a type="button" href="{{ url($card->url) }}" class="btn-floating btn-lg {{$card->color}} ml-4 waves-effect waves-light"><i class="{{$card->icono}}" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-7 col-7 text-right pr-5">
                        <h5 class="ml-4 mt-4 mb-2 font-weight-bold">{{ $lista->countByTabla($card->tabla)}} </h5>
                        <p class="font-small grey-text">{{$card->titulo}}</p>
                    </div>
                </div>                
                <div class="row my-3">
                    <div class="col-md-7 col-7 text-left pl-4">
                        <p class="font-small dark-grey-text font-up ml-4 font-weight-bold">{{$card->detalle}}</p>
                    </div>
                    <div class="col-md-5 col-5 text-right pr-5">
                        <p class="font-small grey-text"></p>
                    </div>
                </div>
            </div>
        </div>            
    @endforeach

</div>


@push('scripts')
    <script>                
                
    </script>
@endpush