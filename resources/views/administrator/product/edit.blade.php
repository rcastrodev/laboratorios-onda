@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary" data-asyn="no">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        <div class="form-group col-sm-12 col-md-5">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-5">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control">
                <option selected disabled>Seleccionar categoría</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @if ($c->id == $product->category_id) selected @endif>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="AA">
        </div>
        @if (Storage::disk('custom')->exists($product->extra))
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}">
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div>    
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{$product->description}}</textarea>
        </div>     
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
<div class="row mt-5">
    <div class="d-flex col-sm-12 mb-4">
        <h3 class="mr-2">Imágenes</h3>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
    </div>
    
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Ordén</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.product.modals.create')
@includeIf('administrator.product.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('product.image')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/product/product.js') }}"></script>
    <script>
        async function findImage(id)
        {   
            // get content 
            let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
            if(url){
                if(id){
                    try {
                        let result = await axios.get(`${url}/${id}`)
                        let content = result.data.content 
                        dataContent(content)
                    } catch (error) {
                        console.log(new Error(error));
                    }
                }
            }
        }
        // borrar ficha técnica 
        let bf = document.getElementById('borrarFicha')
        if (bf) {
            bf.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(this.dataset.url)
                .then(r => {
                    this.closest('div').remove()
                })
                .catch(e => console.error( new Error(e) ))      
            })  
        }
    </script>
    <script>
        
        let table = $('#page_table_slider').DataTable({
            serverSide: true,
            ajax: `${root}/images/{{$product->id}}`,
            bSort: true,
            order: [],
            destroy: true,
            columns: [
                { data: "order" },
                { data: "images"},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            }, 
        });

        function dataContent(content)
        {
            let form = document.getElementById('form-update-slider')
            form.querySelector('input[name="id"]').value = content.id
            form.querySelector('input[name="order"]').value = content.order
        }


        function modalImageDestroy(id)
        {
            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    imageDestroy(id)
                }
            })
        }

        function imageDestroy(id)
        {
            axios.delete(`${root}/image/${id}`).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )

                if(typeof table !== 'undefined')
                    table.ajax.reload()
                
                if(typeof tableCaracteristicas !== 'undefined')
                    tableCaracteristicas.ajax.reload()

                
            }).catch(error => console.error(error))

        }
    </script>
@stop

