@if($main_nav??null)
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 " >

        @foreach($main_nav as $group_name=>$group)
            <li class="nav-item {{($group["items"]??null)?'dropdown':''}}">
                <a class="nav-link {{($group["items"]??null)?'dropdown-toggle':''}} {{ (( $group["items"]??null) && in_array(($t_page??null),array_keys($group["items"])))?'active':'' }}" 
                    @if($group["url"]??null)
                        href="{{$group["url"]}}"
                    @else
                        wire:ignore.self type="button" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    @endif
                >

                    @if($group["icon"]??null)<i class="bi {{$group["icon"]}} me-2"></i> @endif {!! $group["name"]!!}
                </a>
                @if($group["items"]??null)
                    <ul class="dropdown-menu" wire:ignore.self>
                        @foreach($group["items"] as $section_name=>$sec)
                            <li> 
                                <a class="dropdown-item {{ ($t_page??null)==$section_name?'active':'' }}"   href="{{ ($sec["url"]??null) ? $sec["url"] : route('t-components.docs',['t_page'=>$section_name])}}" class="nav-link {{ ($t_page??null)==$section_name?'active':'' }}">
                                    @if($sec["icon"]??null)<i class="bi bi-{{$sec["icon"]}} me-2"></i> @endif {!! $sec["name"] !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>
@endif