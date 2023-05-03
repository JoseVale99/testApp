@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Ver producto</div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $product->codigo }}"
                        disabled>
                </div>

            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="name">Descripción</label>
                    <textarea class="form-control" id="descripcion" disabled name="descripcion">{{ $product->descripcion }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Categorías</label>
                    <select class="form-control" id="categoria" name="categoria_id" disabled>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                {{ $category->codigo }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Codigos de barra</label>
                    <select class="form-control" id="barcodes" name="barcode[]" multiple disabled>
                        @foreach ($barcodes as $item)
                            <option value="{{ $item->id }}" @if (in_array($item->id, $product->barcode)) selected @endif>
                                {{ $item->codigo }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Precios</label>
                    <select class="form-control" id="barcodes" name="barcode[]" multiple disabled>
                        @foreach ($prices as $item)
                            <option value="{{ $item->id }}" @if (in_array($item->id, $product->precios)) selected @endif>
                                $ {{ number_format($item->precio, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>








            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Estado</label>
                    <input type="text" class="form-control"
                        value="@if ($product->estado == 1) Activo
                @else
                Inactivo @endif "
                        disabled>
                </div>

            </div>


        </div>

        <div class="col-md-4 mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    @endsection
    s
