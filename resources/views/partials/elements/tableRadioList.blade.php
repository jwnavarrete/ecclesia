<div class="col-lg-{{$column}}">                                  
    <table class="table table-bordered table-sm">                                         
        <thead>
            <tr>
                <th>{{$titulo}}</th>                                                    
            </tr>
        </thead>
        <tbody>
            @foreach ($lista->getCatalogoByData($data) as $key => $value)
                <tr>
                    <td>
                        <input class="form-check-input rdbCompassion" name="{{$name}}" id="{{$name}}-{{$value->id}}" type="radio" value="{{$value->id}}">
                        <label class="form-check-label" for="{{$name}}-{{$value->id}}">{{$value->nombre}}</label>   
                    </td>                                                                                
                </tr>
            @endforeach            
        </tbody>                                                                                    
    </table>                    
</div>