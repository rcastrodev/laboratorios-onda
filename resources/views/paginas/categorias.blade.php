@extends('paginas.partials.app')
@section('content')
    <div class="container row mx-auto">
        <div class="col-sm-12">
            <div aria-label="breadcrumb" class="bg-transparent py-1 font-size-12">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
                        <li class="breadcrumb-item active font-size-13 fw-bold" aria-current="page">productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="categorias" class="py-5">
        <div class="container row mx-auto">
            @forelse ($categories as $c)
                <div class="col-sm-12 col-md-6 col-xl-3 mb-4">
                    @includeIf('paginas.partials.categoria', ['c' => $c])
                </div>
            @empty
                <div class="col-sm-12">
                    <h2>No hay categorías cargadas en estos momentos</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
