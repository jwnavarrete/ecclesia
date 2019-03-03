<!-- LUIS ALFREDO LLAQUE GAIBOR
    * RECORRE MENU Y FORMA EN BASE AL ORDEN ESTABLECIDO EN LA PARAMETRIZACION
-->
@if ($item['submenu'] == [])        
    <li class="collapsible-header waves-effect arrow-r ">
        <a href="{{ url($item['slug']) }}" class="collapsible-header waves-effect arrow-r {{$item['slug']}}"><i class="{{ $item['icon'] }}"></i>{{ $item['name'] }} 
        </a>
    </li>
@else    
    <li>
    <a class="collapsible-header waves-effect arrow-r {{$item['slug']}}"><i class="{{ $item['icon'] }}"></i> {{ $item['name'] }}<i class="fa fa-angle-down rotate-icon"></i></a>
        <div class="collapsible-body">
            <ul>
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li><a href="{{ url($submenu['slug']) }}" class="{{$submenu['slug']}}" padre="{{ $item['slug'] }}"><i class="{{ $submenu['icon'] }}"></i> {{ $submenu['name'] }} </a></li>
                @else
                    @include('partials.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach                
            </ul>
        </div>
    </li>    
@endif
