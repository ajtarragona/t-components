
@section('header-image',"https://unsplash.it/1920/1080?random")
{{-- @section('header-image',"https://www.tarragona.cat/comerc/som-comerc/image")") --}}
@section('title',"T-components")
@section('claim-title',"Documentació")

@section('claim')
Id ut dolor quis ea qui magna non ea aliqua enim nulla et. 
@endsection


@section('js')
<script src="{{ asset('vendor/ajtarragona/js/t-docs.js') }}"></script>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
@endsection

@section('nav-start')
    @includeIf('t-components::layouts.'.$page_layout.'.main-nav')
@endsection

@section('nav-end')
    @include('t-components::layouts.common.user')
@endsection


@section('phone-menu')
    @if($page_layout=='tgn-form')
        @includeIf('t-components::layouts.side-nav.main-nav')

    @endif
@endsection

<div class=" my-3 container-fluid">
    
    <div class="row">
        
        <div class="col">
            
           
            @includeIf("t-components::docs.sections.". str_replace("_",".",$t_page))

        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-2 z-3 card m-2">
        <div class="input-group">
            @include("t-components::layouts.common.nightmode")

            <div class="btn-group dropup ms-2">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi  bi-columns-gap"></i> Layout: <strong>{{ $page_layout }}</strong>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ $page_layout=='top-nav' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','top-nav')}}" >Top Nav</a></li>
                    <li><a class="dropdown-item {{ $page_layout=='top-nav-fw' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','top-nav-fw')}}" >Top Nav Fullwidth</a></li>
                    <li><a class="dropdown-item {{ $page_layout=='side-nav' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','side-nav')}}" >Side Nav</a></li>
                    <li><a class="dropdown-item {{ $page_layout=='tgn-web' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','tgn-web')}}" >TGN Web</a></li>
                    <li><a class="dropdown-item {{ $page_layout=='tgn-site' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','tgn-site')}}" >TGN Site</a></li>
                    <li><a class="dropdown-item {{ $page_layout=='tgn-form' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','tgn-form')}}" >TGN Form</a></li>
                    <li><a class="dropdown-item {{ $page_layout=='blank' ? 'active':''}}" data-turbolinks="false" href="{{ route('t-components.setLayout','blank')}}" >Blank</a></li>

                </ul>
            </div>
        </div>
                
        
    </div>
   

    @include('t-components::docs._src_viewer')
    
</div>

