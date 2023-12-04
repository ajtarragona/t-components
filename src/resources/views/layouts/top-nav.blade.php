@extends('t-components::layouts.blank')
@section('layout-name','top-nav')

@section('content')
	<div>
		<nav class="navbar  navbar-expand-lg bg-body-tertiary sticky-top" >
			<div class="container">
			<a class="navbar-brand "  href="{{ route('home') }}">{{ config('app.name')}}</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarSupportedContent">
			 	<div class="d-lg-flex w-100 justify-content-between">
					<div>
						@include('t-components::layouts.top-nav.main-nav')
					</div>

					@include('t-components::layouts.common.user')
				</div>
			</div>
			</div>
		</nav>


		<main role="main" id="main-container" class="container pt-3">
			@yield('body')
		</main>
	</div>
@endsection