@extends('paginas.partials.app')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-5 pe-0" style="background-color: #FAFBFB;">
        <div class="p-sm-2 p-md-5">
            <div aria-label="breadcrumb" class="bg-transparent py-1 font-size-12 mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
                    <li class="breadcrumb-item active font-size-13 fw-bold" aria-current="page">Contacto</li>
                </ol>
            </div>
            <h2 class="font-size-25 text-uppercase mb-3 pb-2">Contacto</h2>
            <div class="d-flex align-items-center mb-3">
                <i class="far fa-map-marker-alt text-danger font-size-18 d-block me-3"></i>
                <span class="d-block" style="color:#8D8D8D;"> {{ $data->address }}</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fal fa-phone-alt text-danger font-size-18 d-block me-3"></i>
                @php $phone = Str::of($data->phone1)->explode('|') @endphp
                @if (count($phone) == 2)
                    <a href="tel:{{ $phone[0] }}" class="underline" style="color:#8D8D8D;">{{ $phone[1] }}</a>
                @else 
                    <a href="tel:{{ $data->phone1 }}" class="underline" style="color:#8D8D8D;">{{ $data->phone1 }}</a>
                @endif       
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fal fa-envelope text-danger font-size-18 d-block me-3"></i><span class="d-block"></span>  
                <a href="mailto:{{ $data->email }}" class="underline" style="color:#8D8D8D;">{{ $data->email }}</a>                      
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-7 ps-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.908486211444!2d-58.533071285149745!3d-34.58118206381225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb7a01abf8c37%3A0xa582bcca55bfb7c0!2sAv.%20Del%20Libertador%20Gral.%20San%20Mart%C3%ADn%201501%2C%20Villa%20Lynch%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1636653002672!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
    </div>
</div>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-8 mx-auto">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" name="apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" name="celular"  class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label for="">Mensaje</label>
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <button type="submit" class="btn bg-danger font-size-14 py-2 d-block text-white w-100" style="border-radius:0;">Enviar consulta</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
