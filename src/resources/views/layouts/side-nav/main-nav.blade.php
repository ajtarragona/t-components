@if($main_nav??null)

    <ul class="list-unstyled ps-0">
        @foreach($main_nav as $group_name=>$group)
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" wire:ignore.self data-bs-toggle="collapse" data-bs-target="#{{$group_name}}-collapse" aria-expanded="{{( ( $group["items"]??null) && in_array(($t_page??null),array_keys($group["items"])))?'true':'false' }}">
                    @if($group["icon"]??null)<i class="bi {{$group["icon"]}} me-2"></i> @endif {!! $group["name"]!!}
                </button>
                <div class="collapse {{ (( $group["items"]??null) && in_array(($t_page??null),array_keys($group["items"])))?'show':'' }}" id="{{$group_name}}-collapse"  wire:ignore.self>
                    <ul class="nav nav-pills flex-column  pb-1 small">
                        @if($group["items"] ??null)
                            @foreach($group["items"] as $section_name=>$sec)
                                <li class="nav-item">
                                    <a href="{{ ($sec["url"]??null) ? $sec["url"] : route('t-components.docs',['t_page'=>$section_name])}}" class="nav-link {{ ($t_page??null)==$section_name?'active':'' }}">
                                        @if($sec["icon"]??null)<i class="bi bi-{{$sec["icon"]}} me-2"></i> @endif {!! $sec["name"] !!}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </li>
        @endforeach


    </ul>
@endif