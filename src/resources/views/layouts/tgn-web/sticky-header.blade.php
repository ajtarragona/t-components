<div id="sticky-header">
		
    <div class=" py-2 d-flex justify-content-between align-items-center">
        <div class="ps-3">
            <a href="https://www.tarragona.cat" class="tgn-ona-header">
                <img src="https://www.tarragona.cat/bootstrap/images/tgn_amb_ona.svg" height="30" alt="Ajuntament de Tarragona">
            </a>
        </div>
        <div class=" d-flex justify-content-end align-items-center pe-3">
            {{-- <a id="search-opener" type="button"><i class="fas fa-search fa-flip-horizontal"></i></a> --}}
            {{-- <form class="cercador cercador-sticky" action="{{ route('home', $node_type ) }}" method="get">
                <div class="input-group ">
                    <label class="search-icon mb-0" for="sticky-search-input">
                        <i class="fas fa-search"></i>
                    </label>
                    <input class="form-control" type="text" name="s" id="sticky-search-input" placeholder="Cerca al catàleg" value="{{$term??''}}" />
                    
                </div>
            </form> --}}
            
            @include('t-components::layouts.common.social')

            <div id="menu-opener">
                <span id="nav-icon2"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> </span>
            </div>
           
        </div>
    </div>	
    
        
    
</div>