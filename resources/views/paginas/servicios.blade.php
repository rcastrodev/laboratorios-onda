@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Servicios</li>
		</ol>
	</div>
</div>
@isset($section1s)
    @if ($section1s->count())
        <section class="producto row font-size-14 my-3 container mx-auto">
            @foreach ($section1s as $k => $s)
                @if ($k % 2)
                    <div class="col-sm-12 col-md-6 p-0 d-sm-none d-md-block">
                        @if (Storage::disk('custom')->exists($s->image))
                            <img src="{{ asset($s->image) }}" class="img-dluid w-100">
                        @endif
                    </div>   
                    <div class="col-sm-12 col-md-6 p-0">
                        <div class="py-sm-3 py-md-5 px-3">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3">
                                    <img src="{{ asset($s->content_3) }}" class="img-fluid" width="52" height="52" style="border: 1px solid #0956A3; padding: 10px; box-sizing: content-box; border-radius: 100%;
                                    display: block; margin: auto;">
                                </div>
                                <h5 class="text-primary font-size-20 mb-0">{{ $s->content_1 }}</h5>
                            </div>	
                            <div class="font-size-16">{!! $s->content_2 !!}</div>
                        </div>
                    </div>
                @else
                    <div class="col-sm-12 col-md-6 p-0">
                        <div class="py-sm-3 py-md-5 px-3">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3">
                                    <img src="{{ asset($s->content_3) }}" class="img-fluid" width="52" height="52" style="border: 1px solid #0956A3; padding: 10px; box-sizing: content-box; border-radius: 100%;
                                    display: block; margin: auto;">
                                </div>
                                <h5 class="text-primary font-size-20 mb-0">{{ $s->content_1 }}</h5>
                            </div>	
                            <div class="font-size-16">{!! $s->content_2 !!}</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 p-0 d-sm-none d-md-block">
                        @if (Storage::disk('custom')->exists($s->image))
                            <img src="{{ asset($s->image) }}" class="img-dluid">
                        @endif
                    </div> 
                @endif
            @endforeach                
        </section> 
    @endif
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
