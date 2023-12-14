@extends('t-components::layouts.blank')

@section('layout-name','side-nav')

@section('content')

	<div class="position-fixed start-0 top-0 d-block d-md-none text-4 m-2 ">
		<a class="bg-secondary d-block rounded-circle px-3 py-2 text-bg-secondary" data-bs-toggle="offcanvas" href="#phone-menu" role="button" aria-controls="phone-menu">
			<i class="bi bi-list"></i>
		</a>
	</div>

	<div class="offcanvas offcanvas-start" tabindex="-1" id="phone-menu" aria-labelledby="phone-menu-label">
		<button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		
		<div class="d-flex flex-column align-items-start min-vh-100 offcanvas-body ">
			<div class="offcanvas-header">
				<a href="{{ route('home') }}" class="pb-3 text-decoration-none">
					{{ config('app.name')}}
				</a>
			</div>
				<div class="offcanvas-bodyflex-column mb-auto align-items-start t-sidebar">
					
							
					@include('t-components::layouts.side-nav.main-nav')

				</div>
				
				
				
				<div class="w-100 ">
					@include('t-components::layouts.common.user')
				</div>
			
		</div>
	</div>

	<div class="container-fluid h-100">
		<div class="row flex-nowrap ">
			<div class="col-auto  col-md-4 col-xl-2 px-sm-2 px-0 bg-body-tertiary position-fixed h-100 overflow-y-auto z-1 d-none d-md-block">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
					<a href="{{ route('home') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
						<span class="fs-5 d-none d-sm-inline">
							{{ config('app.name')}}
						</span>
					</a>
					<div class="flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start t-sidebar" id="menu">

						
					    @include('t-components::layouts.side-nav.main-nav')

					</div>
					
					
					
					<div class="py-3 w-100 ">
					@include('t-components::layouts.common.user')
					</div>
				</div>
			</div>
			<div class="col py-4  offset-md-4 offset-xl-2 ">
				<main role="main" id="main-container" class="container-fluid">
						@yield('body')
				</main>
			</div>
		</div>
	</div>	 

@endsection