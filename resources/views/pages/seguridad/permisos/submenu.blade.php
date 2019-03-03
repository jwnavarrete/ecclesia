
@if ($item['submenu'] == [])
<!--class="mjs-nestedSortable-branch mjs-nestedSortable-collapsed"-->
    <li id="list_{{ $item['id'] }}" >
        <div><span class="disclose"></span>
            <span>{{$item['name']}}</span>
            <div class="switch inline">
                <label>                                                    
                    <input id="{{$item['id']}}"  checked="checked" type="checkbox">
                    <span class="lever"></span>
                </label>
            </div>
        </div>  
@else
    
    <li id="list_{{ $item['id'] }}" >
        <div><span class="disclose"></span>    
        <span>{{$item['name']}}</span>
        <div class="switch inline">
            <label>                                                    
                <input id="{{$item['id']}}"  checked="checked" type="checkbox">
                <span class="lever"></span>
            </label>
        </div>
    </div>

    <ol>
           @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])                                                            
                    
                    <li id="list_{{ $submenu['id'] }}" >
                    <div><span class="disclose"></span>                                            
                        <span>{{$submenu['name']}}</span>
                        <div class="switch inline">
                            <label>                                                    
                                <input id="{{$submenu['id']}}"  checked="checked" type="checkbox">
                                <span class="lever"></span>
                            </label>
                        </div>
                    </div>

                @else
                    @include('pages.seguridad.menu.submenu',['item' => $item])
                    
                @endif
            @endforeach
    </ol>
@endif
