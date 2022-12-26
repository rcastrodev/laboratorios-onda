@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-yellow">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none fw-bold">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('categorias') }}" class="text-decoration-none text-dark fw-bold">Productos</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category', ['id' => $product->category->id]) }}" class="text-decoration-none text-dark fw-bold">{{ $product->category->name }}</a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>  
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-4 col-lg-3 d-sm-none d-xl-block">
                @isset($categories)
                    @if (count($categories))
                        <ul class="p-0" style="list-style: none;">
                            @foreach ($categories as $sc)
                                <li class="mb-3">
                                    <a href="{{ route('categoria', ['id'=>$sc]) }}"
                                        class="@if ($sc->id == $product->category->id) fw-bold @endif text-light text-decoration-none"
                                        > {{ $sc->name }} </a>
                                </li>
                            @endforeach
                        </ul>            
                    @endif   
                @endisset
            </aside>
            <section class="producto col-sm-12 col-xl-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-lg-6">
                        <div id="carruselProducto" class="carousel slide carousel-fade border border-light border-2 mb-3" data-bs-ride="carousel" style="">
                            @if (count($product->images))
                                <div class="carousel-indicators d-sm-none d-md-block">
                                    @foreach ($product->images as $pk => $slide)
                                        <button type="button" data-bs-target="#carruselProducto" data-bs-slide-to="{{$pk}}" class="@if (!$pk) active @endif" aria-current="true" aria-label="Slide {{$pk}}"></button>			
                                    @endforeach
                                </div>     
                            @endif
                            <div class="carousel-inner">
                                @if (count($product->images))
                                    @foreach ($product->images()->orderBy('order', 'ASC')->get() as $pk => $pv)
                                        <div class="carousel-item @if(!$pk) active @endif" style="background-color: #ececec;">
                                            <img src="{{ asset($pv->image) }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                             height: 496px;">
                                        </div>    
                                    @endforeach
                                @else
                                    <div class="carousel-item active" style="background-color: #ececec;">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: cover;height: 496px;" alt="">
                                    </div>   
                                @endif
                            </div>
                        </div> 
                    </div>
                    <div class="col-sm-12 col-lg-6 d-flex flex-column justify-content-between">
                        <div class="">
                            <strong class="text-light">{{ $product->category->name }}</strong>
                            <h1 class="mb-sm-3 mb-md-4 mt-2 font-size-35">{{ $product->name }}</h1>
                            <hr class="text-light d-block mb-4">
                            @if ($product->description)
                                <div class="font-size-16 mb-md-3 mb-sm-2 mb-md-5 text-light">{!! $product->description  !!}</div>
                            @endif
                        </div>
                        <div class="d-flex flex-sm-column flex-md-row justify-content-sm-center justify-content-md-start flex-wrap">
                            <a href="{{ route('contacto') }}" class="btn btn-primary py-2 px-5 mb-sm-3 mb-md-0 me-sm-0 me-md-4" style="border-radius: 0;">Consultar</a>    
                            @if($product->extra)
                                <a href="{{ route('ficha-tecnica', ['id'=>$product->id]) }}" class="btn btn-outline-primary py-2 px-5" style="border-radius: 0;">Ficha técnica</a>       
                            @endif
                        </div>
                    </div>
                </div>           
            </section>
        </div>
    </div>
</div>
@endsection
@push('head')
    <style>
        .carousel-indicators{
            text-align: center;
        }
    </style>
@endpush

