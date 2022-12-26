@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="font-size-53 text-white mb-3">{{ $v->content_1 }}</h2>
							<p class="text-white font-size-22 mb-4" style="font-weight: 200;">{{ $v->content_2 }}</p>
							<a href="{{ route('empresa') }}" class="py-2 px-4 text-white b-0 bg-danger text-decoration-none">Más información</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@isset($categories)
	@if (count($categories))
		<section class="categorias py-sm-2 py-md-5">
			<div class="container mx-auto py-sm-2 py-md-4 row">
				<div class="col-sm-12">
					<h2 class="font-size-30 position-relative mb-5">Productos</h2>
				</div>
				@foreach ($categories as $c)
					<div class="col-sm-12 col-md-6 col-xl-3 mb-4">
						@includeIf('paginas.partials.categoria', ['c' => $c])
					</div>
				@endforeach
			</div>
		</section>
	@endif
@endisset
@isset($section2)
	<section id="section2" class="py-5" style="background-color: #FAFBFB;">
		<div class="container mx-auto row">
			<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0 text-center font-size-35">{{ $section2->content_1 }}</div>
			@if (Storage::disk('custom')->url($section2->image))
				<div class="col-sm-12 col-md-6">
					<img src="{{ asset($section2->image) }}" class="img-fluid d-block mx-auto">
				</div>
			@endif
		</div>
	</section>
@endisset
@isset($section3)
	<section id="section3" class="py-5">
		<div class="row">
			<div class="col-sm-12 col-md-6 order-md-1 order-sm-2 mb-sm-3 mb-md-0">
				@if (Storage::disk('custom')->exists($section3->image))
					<img src="{{asset($section3->image)}}" class="img-fluid w-100">
				@endif
			</div>
			<div class="col-sm-12 col-md-6 m-0 p-4 order-md-2 order-sm-1 d-flex align-items-center">
				<div class="py-sm-2 py-md-5">
					<h2 class="font-size-35 mb-5">{{ $section3->content_1 }}</h2>
					<div class="font-size-17 text-light mb-5" style="font-weight: 400">{!! $section3->content_2 !!}</div>
					<a href="{{ route('empresa') }}" class="py-2 px-4 text-white b-0 text-decoration-none" style="background-color: #1C3F96">Más información</a>
				</div>
			</div>
		</div>
	</section>
@endisset
@isset($clients)
	@if (count($clients))
		<section id="clients" class="py-5" style="background-color: #FAFBFB;">
			<div class="container mx-auto">
				<h2 class="font-size-30 mb-5">Clientes</h2>
				<div class="slider">
					@foreach ($clients as $client)
						<div>
							<div class="d-flex align-items-center justify-content-cer bg-white" style="height: 288px; border: 1px solid #2d2f364d; margin: 0 5px;">
								<img src="{{ asset($client->image) }}" class="d-block mx-auto">
							</div>
						</div>
					@endforeach
				  </div>
			</div>
			
		</section>	
	@endif

@endisset
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
@endpush
@push('scripts')
	<script src="vendor/slick/slick.js"></script>
	<script>
		$(document).ready(function(){
			$('.slider').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				dots:true,
				responsive: [{
					breakpoint: 1024,
						settings: {
						slidesToShow: 2,
						infinite: true
						}
					}, {
					breakpoint: 600,
						settings: {
						slidesToShow: 1,
						dots: true
						}

					}, {
					breakpoint: 300,
					settings:{
						slidesToShow: 1,
						dots: true
						}
					}]
			});
		});
	</script>
@endpush



