<a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="card categoria d-block text-dark" style="text-decoration: none; border: 1px solid #696A6E4D; border-radius: 2px; min-height:410px;">
    <div class="position-relative bg-light d-flex align-items-center">  
        @if (Storage::disk('custom')->exists($c->image))
            <img src="{{ asset($c->image) }}" class="img-fluid" style="height: 288px; object-fit: cover;">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="height: 288px; object-fit: cover;">
        @endif
    </div>
    <div class="card-body">
        <h2 class="card-text mb-0 font-size-20 mb-3 text-center text-light" style="font-weight: 400;">{{$c->name}}</h2>
    </div>
</a>
