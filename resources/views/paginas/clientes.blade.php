@extends('paginas.partials.app')
@section('content')
<div class="container row mx-auto">
    <div class="col-sm-12">
        <div aria-label="breadcrumb" class="bg-transparent py-1 font-size-12">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
                    <li class="breadcrumb-item active font-size-13 fw-bold" aria-current="page">Clientes</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@isset($section1s)
    @if ($section1s->count())
        <section class="producto row font-size-14 my-3 container mx-auto videos my-sm-3 py-md-5">
            @foreach ($section1s as $s)
                <div class="col-sm-12 col-md-6 col-xl-3 mb-3">
                    <div class="d-flex align-items-center justify-content-center card position-relative text-decoration-none py-3" style="background: #FFFFFF 0% 0% no-repeat padding-box;
                    box-shadow: 1px 3px 3px #B1B1B163;">
                        <div class="content-image">
                            <img src="{{ asset($s->image) }}" class="img-fluid" style="width: 180px; height:120px; object-fit: contain;">
                        </div>
                    </div>
                </div>
            @endforeach                
        </section> 
    @endif
@endisset
@endsection

