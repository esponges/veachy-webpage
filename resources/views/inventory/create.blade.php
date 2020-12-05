@extends('style')

<style>
    body {
        background-color: rgb(230, 189, 224) !important;
    }

</style>

@section('content')
    <div class="container" style="margin-top:150px;">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" id="form-upload">
            @csrf
            <div class="form-group">
                <label for="">Producto</label>
                <input type="text" name="name" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Descripción (sólo para productos principales)</label>
                <input type="text" name="description" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Precio</label>
                <input type="number" name="price" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <input type="hidden" name="disponibilidad" value="1">
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" name="type">
                    <option value="1">Carrusel</option>
                    <option value="4">Producto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tipo-detalle</label>
                <select class="form-control" name="type_detail">
                    <option value="1">Bikini</option>
                    <option value="2">Cover Up</option>
                    <option value="3">Entero</option>
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="">Fotos</label>
                <input type="number" name="total_fotos" class="form-control" placeholder="">
            </div> --}}
            <div class="form-group">
                <label for="">Parent product</label>
                <select class="form-control" name="parent_id">
                    <option value="">Ninguno</option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tamaño</label>
                <select class="form-control" name="size" id="product-type">
                    <option value="1">Chico</option>
                    <option value="2">Mediano</option>
                    <option value="3">Grande</option>
                    <option value="4">Extra-chico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Color</label>
                <input type="text" name="color" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Fotos</label><br>
                <label for="">Recuerda que los subproductos pueden no llevar imagen</label>
                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="files[]"
                    value="{{ old('file') }}" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Subir producto</button>
        </form>
    </div>
@endsection
