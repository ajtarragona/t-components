<header id="main-header" class="">

    @include('t-components::layouts.tgn-site.sticky-header')
    
    <div class="banner container">
        <div class="row">
            @hasSection('title')
                <div class="logo col-12 text-center text-sm-start pt-3 mb-3 pb-3">
                    <div class="mt-5">
                        <a href="https://www.tarragona.cat" title="Ajuntament de Tarragona">
                            <img class="tgn_ona" alt="Logo AjuntamentTGN" src="https://www.tarragona.cat/bootstrap/images/tgn_amb_ona.svg">
                        </a>
                    </div>
                    <h1 class="mt-1 col-12 col-lg-6 p-0" aria-hidden="true">
                        <a href="{{ route('home') }}" tabindex="-1">@yield('title')</a>
                    </h1>

                   

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

        <div class="row">
            <div class="col-sm-auto mx-auto px-0">
                <nav class="navbar  navbar-expand-lg " >
                    @yield('nav-start')
                        {{-- @include('t-components::layouts.tgn-site.main-nav') --}}
                </nav>
                
    
            </div>
            
                    
        </div>
    </div>


    
   
    <div class="position-absolute bottom-0 end-0 " >
        @yield('nav-end')
    </div>
</header>

