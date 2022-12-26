@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-transparent py-1 font-size-12">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active font-size-13 fw-bold" aria-current="page">Empresa</li>
		</ol>
	</div>
</div>
@isset($section1)
	<section id="section1" class="py-5">
		<div class="row">
			<div class="col-sm-12 col-xl-6 order-md-1 order-sm-2 mb-sm-3 mb-md-0">
				@if (Storage::disk('custom')->exists($section1->image))
					<img src="{{asset($section1->image)}}" class="img-fluid w-100">
				@endif
			</div>
			<div class="col-sm-12 col-xl-6 m-0 p-4 order-md-2 order-sm-1 d-flex align-items-center">
				<div class="py-sm-2 py-md-5">
					<h2 class="font-size-35 mb-5">{{ $section1->content_1 }}</h2>
					<div class="font-size-17 text-light mb-5" style="font-weight: 400">{!! $section1->content_2 !!}</div>
				</div>
			</div>
		</div>
	</section>
@endisset
@isset($section3s)
	@if (count($section3s))
		<section id="section_2" class="py-sm-3 py-md-5 mb-4" style="background-color: #FAFBFB;">
			<div class="container mb-5 font-size-30">¿Por qué elegirnos?</div>
			<div class="container py-sm-0 py-md-3 d-flex flex-wrap justify-content-between">
				@foreach ($section3s as $s3)
					<div class="contenedor-caracteristicas bg-white px-4">
						@if (Storage::disk('custom')->exists($s3->image))
							<img src="{{ asset($s3->image) }}" class="img-fluid d-block mx-auto mb-3" width="52" height="52">
						@else
							<div class="" style="height: 52px;"></div>
						@endif
						<h5 class="text-center text-secundary font-size-24 mb-3">{{ $s3->content_1 }}</h5>
						<div class="text-center text-secundary font-size-15">{!! $s3->content_2 !!}</div>
					</div>
				@endforeach
			</div>
		</section>
	@endif
@endisset
@endsection
