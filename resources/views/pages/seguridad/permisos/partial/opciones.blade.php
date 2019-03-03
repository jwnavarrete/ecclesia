 <div class="table-responsive">                                            
    <div class="" id="">                                  
        <ol class="sortable" id="menu">
            @foreach ($menu as $key => $item)
                @if ($item['parent'] != 0)
                    @break
                @endif                
                @include('pages.seguridad.permisos.submenu',['item' => $item])
            @endforeach  
        </ol>                                            
    </div> 

    
          
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <br>
        <div class="col-md-3 pull-right">
            <button onclick="grabarMenuRol()" type="button" class="btn btn-primary btn-rounded">Grabar</button>                                
        </div>

    </div>
</div>                                                                          