
 

<header class="border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6 py-3">
                <h1 class="site-title mb-0 ">@yield('title')</h1>
            </div>
            <div class="col-sm-6 text-end py-2">
                <div class="tarragona-logo">
                   @svg('vendor/ajtarragona/images/tarragona-logo.svg' )
                </div>
                    
                {{-- <img alt="logo" src="{{ asset('vendor/ajtarragona/images/tarragona-logo.svg')}}" class="tarragona-logo"> --}}
            </div>
        </div>
        
    </div>
</header>
<div class="sticky-header sticky-top ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col py-4">
                @yield('breadcrumb')
                
            </div>
        </div>
    </div>
</div>