<div id="bannerzone" style="background-image:url(@yield('header-image'))" class="vignette-full">

    @include('t-components::layouts.tgn-web.sticky-header')
    
    <div class="banner container">
        <div class="row">
            @hasSection('title')
                <div class="logo col-12 text-center text-sm-start pt-3 mb-5 pb-5">
                    <div class="mt-5">
                        <a href="https://www.tarragona.cat" title="Ajuntament de Tarragona">
                            <img class="tgn_ona" alt="Logo AjuntamentTGN" src="https://www.tarragona.cat/bootstrap/images/tgn_amb_ona.svg">
                        </a>
                    </div>
                    <h1 class="mt-3 col-12 col-lg-6 p-0" aria-hidden="true">
                        <a href="{{ route('home') }}" tabindex="-1">@yield('title')</a>
                    </h1>

                    @hasSection('claim')
                        <div class="card col-12 col-lg-6 mt-3 mb-4 p-0" role="region"  >
                            
                            <div class="card-body my-1">
                                <p class="card-title">@yield('claim-title')</p>
                                <p class="small mb-2">@yield('claim')</p>
                            </div>
                            
                        </div>
                                        
                    @endif

                </div>
            @else
                <div class="logo col-12 text-center text-sm-start pt-5">
                    <div class="mt-5" aria-label="Inici">
                        <a href="https://www.tarragona.cat" title="Ajuntament de Tarragona" >
                            <img class="tgn_ona default" alt="Logo AjuntamentTGN" src="https://www.tarragona.cat/bootstrap/images/tgn_amb_ona.svg">
                        </a>
                    </div>
                </div>
            @endif

           
        </div>
    </div>


    <div aria-label="mainmenu" class="mytabs w-100">
        <div class="row">
            <div class="col-sm-auto mx-auto px-0">
                <div class="nav-tabs-wrapper ">
                    @include('t-components::layouts.tgn-web.main-nav')
                   
                </div>
                <div class="sparkly d-inline d-md-none"></div>
            </div>
        </div>
    </div>
</div>


@if($main_nav??null)


<div id="tab-panes" tabindex="-1" class="tab-content pb-3 px-4 pb-md-0" role="navigation" aria-hidden="true">
    @foreach($main_nav as $group_name=>$group)     
        <div class="tab-pane fade {{in_array(($t_page??null),array_keys($group["items"]))?'active show':'' }}" role="tabpanel" aria-hidden="false" id="tabcontent-{{$group_name}}" >
            <div class="list-group list-group-horizontal-md justify-content-center">
                @foreach($group["items"] as $section_name=>$sec)
                    <a class="list-group-item {{ ($t_page??null)==$section_name?'active':'' }}" tabindex="{{$loop->index}}" href="{{ ($sec["url"]??null) ? $sec["url"] : route('t-components.docs',['t_page'=>$section_name])}}" title="{!! $sec["name"] !!}">
                        @if($sec["icon"]??null)<i class="bi bi-{{$sec["icon"]}} me-2"></i> @endif {!! $sec["name"] !!}
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach

</div>

@endif