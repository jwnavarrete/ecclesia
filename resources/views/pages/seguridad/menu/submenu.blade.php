
@if ($item['submenu'] == [])
<!--class="mjs-nestedSortable-branch mjs-nestedSortable-collapsed"-->
    <li id="list_{{ $item['id'] }}" ><div><span class="disclose"><span></span></span>
        <a data-toggle="collapse" data-parent="#accordionMenu" href="#menu{{ $item['id'] }}">
        {{$item['name']}}</a></div>

    <div id="menu{{ $item['id'] }}" class="panel-collapse collapse">      
        <label  for="nombre">Nombre:</label>                                            
        <input type="text" class="form-control" id="nameMenu{{ $item['id'] }}" value="{{$item['name']}}">          
        <label  for="nombre">Icono:</label>          
        <input class="form-control" type="text" id="iconoMenu{{ $item['id'] }}" value="{{$item['icon']}}">
        <label  for="nombre">Url:</label>        
        <input class="form-control" type="text" id="slugMenu{{ $item['id'] }}" value="{{$item['slug']}}">
        <br>
        <button type="button" onclick="editMenu({{ $item['id'] }});" class="btn btn-success">Actualizar</button>          
        <button type="button" onclick="remove({{ $item['id'] }});" class="btn btn-danger">Eliminar</button>          
    </div>
  
@else
    
    <li id="list_{{ $item['id'] }}" ><div><span class="disclose"><span></span></span>
    <a data-toggle="collapse" data-parent="#accordionMenu" href="#menu{{ $item['id'] }}">
    {{$item['name']}}</a></div>

    <div id="menu{{ $item['id'] }}" class="panel-collapse collapse">      
            Nombre:
            <input class="form-control form-control-sm" type="text" id="nameMenu{{ $item['id'] }}" value="{{$item['name']}}">          
            Icono:
            <input class="form-control form-control-sm" type="text" id="iconoMenu{{ $item['id'] }}" value="{{$item['icon']}}">
            Url:
            <input class="form-control form-control-sm" type="text" id="slugMenu{{ $item['id'] }}" value="{{$item['slug']}}">                        
            <br>                        
            <button type="button" onclick="editMenu({{ $item['id'] }});" class="btn btn-success">Actualizar</button>      
            <button type="button" onclick="remove({{ $item['id'] }});" class="btn btn-danger">Eliminar</button>                             
    </div>

    <ol>
           @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])                                                            
                    
                    <li id="list_{{ $submenu['id'] }}" ><div><span class="disclose"><span></span></span>
                    <a data-toggle="collapse" data-parent="#accordionMenu" href="#menu{{ $submenu['id'] }}">
                    {{$submenu['name']}}</a></div>

                    <div id="menu{{ $submenu['id'] }}" class="panel-collapse collapse">                                 
                        Nombre:
                        <input class="form-control form-control-sm" type="text" id="nameMenu{{ $submenu['id'] }}" value="{{$submenu['name']}}">          
                        Icono:
                        <input class="form-control form-control-sm" type="text" id="iconoMenu{{ $submenu['id'] }}" value="{{$submenu['icon']}}">
                        Url:
                        <input class="form-control form-control-sm" type="text" id="slugMenu{{ $submenu['id'] }}" value="{{$submenu['slug']}}">                        
                        <br>                        
                        <button type="button" onclick="editMenu({{ $submenu['id'] }});" class="btn btn-success">Actualizar</button>      
                        <button type="button" onclick="remove({{ $submenu['id'] }});" class="btn btn-danger">Eliminar</button>                    
                    </div>
                @else
                    @include('pages.seguridad.menu.submenu',['item' => $item])
                    
                @endif
            @endforeach
    </ol>
@endif
