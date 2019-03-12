<section class="section-preview">
    <div class="row">
        @foreach ($lista->getCatalogoByData($data) as $key => $value)
            <div class="col-md-{{ $column }}">                
                <div class="form-check">
                    <input type="checkbox" value="{{$value->id}}" name="{{$name}}" class="chkCompassion" id="{{$name}}-{{$value->id}}">
                    <label class="form-check-label" for="{{$name}}-{{$value->id}}">{{$value->nombre}}</label>
                </div>
                <div class="my-2"></div>                
            </div>
        @endforeach
    </div>
</section>