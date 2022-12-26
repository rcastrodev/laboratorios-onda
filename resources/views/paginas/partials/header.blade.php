<nav class="navbar navbar-expand-lg navbar-light pt-3">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-uppercase position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-center w-100">
                <li class="nav-item px-sm-2 px-md-3 @if(Request::is('quienes-somos')) position-relative @endif">
                    <a class="nav-link @if(Request::is('quienes-somos')) active @endif" href="{{ route('empresa') }}">Quienes somos</a>
                </li>
                <li class="nav-item px-sm-2 px-md-3 @if(Request::is('categorias') || Request::is('categoria/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link @if(Request::is('categorias') || Request::is('categoria/*') || Request::is('producto/*')) active @endif" href="{{ route('categorias') }}">Productos</a>
                </li>
                <li class="nav-item px-sm-2 px-md-3 @if(Request::is('industrias')) position-relative @endif">
                    <a class="nav-link @if(Request::is('industrias')) active @endif" href="{{ route('industrias') }}">Industrias</a>
                </li>
                <li class="nav-item px-sm-2 px-md-3 @if(Request::is('clientes')) position-relative @endif">
                    <a class="nav-link @if(Request::is('clientes')) active @endif" href="{{ route('clientes') }}">Clientes</a>
                </li>
                <li class="nav-item px-sm-2 px-md-3 @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
