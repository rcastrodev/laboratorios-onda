@extends('paginas.partials.app')
@section('content')
    <div class="row container mx-auto">
        <div class="col-sm-12">
            <div aria-label="breadcrumb" class="bg-transparent py-1 font-size-12">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categorias') }}" class="text-decoration-none">Productos</a></li>
                        <li class="breadcrumb-item active font-size-13 fw-bold" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="categorias" class="py-5">
        <div class="container row mx-auto">
            <div class="col-sm-12 col-md-4 col-lg-3 d-sm-none d-lg-block">
                <ul class="text-uppercase" style="list-style: none">
                    @foreach ($categories as $sc)
                        <li class="mb-3">
                            <a href="{{ route('categoria', ['id'=>$sc]) }}"
                                class="@if ($sc->id == $category->id) fw-bold @endif text-light text-decoration-none"
                                > {{ $sc->name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-12 col-lg-9 row">
                @forelse ($products as $p)
                    <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                        @includeIf('paginas.partials.producto', ['p' => $p])
                    </div>
                @empty
                    <div class="col-sm-12">
                        <p>No hay productos cargados en esta categoria</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
