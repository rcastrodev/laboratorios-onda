@extends('paginas.partials.app')
@section('content')
    <div class="container row mx-auto">
        <div class="col-sm-12">
            <div aria-label="breadcrumb" class="bg-transparent py-1 font-size-12">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
                        <li class="breadcrumb-item active font-size-13 fw-bold" aria-current="page">Industrias</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="industrias" class="py-5">
        <div class="container row mx-auto">
            @forelse ($section1s as $s1)
                <div class="col-sm-12 col-md-6 col-xl-3 mb-3">
                    <div class="card categoria d-block text-dark " style="min-height:360px;">
                        <div class="position-relative bg-light d-flex align-items-center">  
                            @if (Storage::disk('custom')->exists($s1->image))
                                <img src="{{ asset($s1->image) }}" class="img-fluid w-100" style="height: 288px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" style="height: 288px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="card-body">
                            <h2 class="card-text mb-0 font-size-20 mb-3 text-center text-light" style="font-weight: 400;">{{$s1->content_1}}</h2>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-sm-12">No hay industrias cargadas</p>
            @endforelse
        </div>
    </div>
@endsection
