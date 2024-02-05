
 

<header class="border-bottom">
    <div class="container d-none d-md-block">
        <div class="row align-items-center ">
            <div class="col-sm-6 py-3">
                <h1 class="site-title mb-0 ">@yield('title')</h1>
            </div>
            <div class="col-sm-6 text-end py-2">
                <div class="tarragona-logo" data-turbo-permanent>
                   @svg('vendor/ajtarragona/images/tarragona-logo.svg' )
                </div>
                    
                {{-- <img alt="logo" src="{{ asset('vendor/ajtarragona/images/tarragona-logo.svg')}}" class="tarragona-logo"> --}}
            </div>
        </div>

    </div>
</header>
<div class="sticky-header sticky-top">
   
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9 col-6 py-3 " >
                <div class="d-block d-md-none">
                    <a href="{{ url()->previous() }}" class="d-inline-block px-2 fs-2 text-reset"><x-t-icon name="arrow-left"/></a>
                    @hasSection('phone-menu')
                        <a data-bs-toggle="offcanvas" href="#offcanvasBreadcrumb" role="button" aria-controls="offcanvasBreadcrumb"  class="d-inline-block px-2 fs-2 text-reset">
                            <x-t-icon name="list"/>
                        </a>
                    @endif
                </div>
                <div class="d-none d-md-block">
                    @yield('nav-start')
                </div>
            </div>
            <div class="col-md-3 col-6  py-3 d-flex justify-content-end">
                @yield('nav-end')
            </div>

        </div>
    </div>
</div>


@hasSection('phone-menu')
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasBreadcrumb" >
        
        <div class="offcanvas-body">
            @yield('phone-menu')
        </div>
    </div>
@endif