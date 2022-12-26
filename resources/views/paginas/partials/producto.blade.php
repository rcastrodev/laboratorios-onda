<a href="{{ route('producto', ['id'=> $p->id ]) }}" class="card categoria d-block text-dark" style="text-decoration: none; border: 1px solid #696A6E4D; border-radius: 2px; min-height:437px;">
    <div class="position-relative bg-light d-flex align-items-center">  
        @if (count($p->images))
            @if (Storage::disk('custom')->exists($p->images()->orderby('order', 'ASC')->first()->image))
                <img src="{{ asset($p->images()->orderby('order', 'ASC')->first()->image) }}" class="img-fluid w-100" style="height: 288px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" style="height: 288px; object-fit: cover;">
            @endif
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" style="height: 288px; object-fit: cover;">
        @endif
    </div>
    <div class="card-body">
        <h2 class="card-text mb-0 font-size-20 mb-3 text-center text-light py-3" style="font-weight: 400;">{{$p->name}}</h2>
        <span class="d-block text-primary py-2 text-center" style="border: 1px solid #1C3F96">Más información</span>
    </div>
</a>
