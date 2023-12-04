@if($main_nav??null)
    <ul class="nav nav-tabs dragscroll nochilddrag align-items-center h-100" role="menu" tabindex="-1" aria-label="Menú principal." aria-orientation="vertical" aria-owns="">
        @foreach($main_nav  as $group_name=>$group)
            <li class="nav-item h-100 " role="none">
                <a data-bs-toggle="tab" aria-controls="tabcontent-{{$group_name}}" type="button" data-bs-target="#tabcontent-{{$group_name}}" class="nav-link h-100 d-inline-flex align-items-center {{in_array(($t_page??null),array_keys($group["items"]))?'active show':'' }}" id="tab-{{$group_name}}-tab" role="menuitem">
                    <div>@if($group["icon"]??null)<i class="bi bi-{{$group["icon"]}} me-2"></i> @endif {!! $group["name"]!!}</div>
                </a>
            </li>
        @endforeach
    </ul>
@endif