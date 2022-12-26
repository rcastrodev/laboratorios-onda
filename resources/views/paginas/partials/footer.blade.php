<footer class="py-sm-3 py-md-5 font-size-15 text-sm-center text-md-start position-relative" style="overflow: hidden;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <a href="{{ route('index') }}" class="d-block">
                    <img src="{{ asset($data->logo_footer) }}" alt="" class="img-fluid logo-header">
                </a>
            </div>
            <div class="col-sm-12 col-md-2 d-sm-none d-md-block" style="z-index: 100">
                <h6 class=" fw-bold mb-3 text-primary font-size-18 mb-4">Secciones</h6>
                <div class="">
                    <a href="{{ route('empresa') }}" class="d-block text-decoration-none  mb-2 underline">Quienes somos</a>
                    <a href="{{ route('categorias') }}" class="d-block text-decoration-none  mb-2 underline">Productos</a>
                    <a href="{{ route('industrias') }}" class="d-block text-decoration-none  mb-2 underline">Indutrias</a> 
                    <a href="{{ route('clientes') }}" class="d-block text-decoration-none  mb-2 underline">Clientes</a>
                    <a href="{{ route('contacto') }}" class="d-block text-decoration-none  mb-2 underline">Contacto</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 d-sm-none d-xl-block" style="z-index: 100">
                <h6 class=" fw-bold mb-3 text-primary font-size-18 mb-4">Suscribite al Newsletter</h6>
                <div class="">
                    <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                        @csrf                   
                        <div class="">
                            <div class="input-group font-size-12">
                                <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="background-color: #FAFAF9; border-radius:0px; border-right:0;">
                                <button type="submit" id="" class="input-group-text text-white" style="background-color: #FAFAF9; border-left: none; border-radius:0px; border:1px solid #ced4da;"><i class="fal fa-arrow-right text-danger"></i></button>
                            </div>
                            <div id="mensaje-newsletter" class="text-white"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 font-size-13 mb-sm-4 mb-md-0">
                <h6 class=" fw-bold mb-3 text-primary font-size-18 mb-4">Contacto</h6>
                <div class="text-start mb-3">
                    <i class="far fa-map-marker-alt me-3 mb-1 text-danger font-size-20"></i>
                    <span class=""> {{ $data->address }}</span>
                </div>
                <div class="text-start d-flex mb-3">
                    <i class="fal fa-phone-alt text-danger me-3 mb-1 font-size-20 "></i>
                    <div class="d-flex flex-sm-row flex-md-column">
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0]}}" class=" underline mb-1">{{ $phone[1] }}</a>  
                        @else 
                            <a href="tel:{{ $data->phone1}}" class=" underline mb-1">{{ $data->phone1 }}</a>  
                        @endif
                    </div>
                </div>
                <div class="text-start">
                    <i class="fal fa-envelope me-3 mb-1 text-danger font-size-20"></i>
                    <a href="mailto:{{ $data->email }}" class=" underline">{{ $data->email }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end py-2">
        <div class="container">
            <a href="https://osole.com.ar/" class="text-decoration-none  underline">BY OSOLE</a>
        </div>
    </div>
</footer>
@isset($data->phone3)
    @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
    @if (count($phone3) == 2)
        <a href="https://wa.me/{{$phone3[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>      
    @else 
        <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>     
    @endif   
@endisset