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
                        <label class="form-check-label" for="{{$name}}-{{$value->id}}">{{$value->nombre}}</label>
                        <div class="switch">                            
                            <label>
                                No
                                <input id="{{$name}}-{{$value->id}}" name="{{$name}}" class="chkCompassion" value="{{$value->id}}" type="checkbox">
                                <span class="lever"></span>
                                Si
                            </label>
                        </div>                                                
                    </td>                                                                                
                </tr>
            @endforeach            
        </tbody>                                                                                    
    </table>                    
</div>