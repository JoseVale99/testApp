@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Editar nueva categoría</div>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mt-4">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Código*</label>
                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo"
                            name="codigo" value="{{ old('codigo', $product->codigo) }}">
                    </div>
                    @error('codigo')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="name">Descripción*</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ old('descripcion', $product->descripcion) }}</textarea>
                    </div>
                    @error('descripcion')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- categories --}}

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Categorías*</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id">
                            <option value="">Seleccione</option>


                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                    {{ $category->codigo }}</option>
                            @endforeach


                        </select>
                    </div>
                    @error('estado')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Codigos de barra*</label>
                        <select class="form-control @error('barcode') is-invalid @enderror" id="barcodes" name="barcode[]"
                            multiple>
                            {{-- <option value="">Seleccione</option> --}}


                            @foreach ($barcodes as $item)
                                <option value="{{ $item->id }}" @if (in_array($item->id, $product->barcode)) selected @endif>
                                    {{ $item->codigo }}</option>
                            @endforeach


                        </select>
                    </div>
                    @error('barcode')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Precios*</label>
                        <select class="form-control @error('precios') is-invalid @enderror" id="precios" name="precios[]"
                            multiple>

                            @foreach ($prices as $item)
                                <option value="{{ $item->id }}" @if (in_array($item->id, $product->precios)) selected @endif>
                                    ${{ number_format($item->precio, 2) }}
                                </option>
                            @endforeach


                        </select>
                    </div>
                    @error('precios')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Estado*</label>
                        <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                            <option value="">Seleccione</option>
                            <option value="1" @if ($product->estado == 1) selected @endif>Activo</option>
                            <option value="0" @if ($product->estado == 0) selected @endif>Inactivo</option>


                        </select>
                    </div>
                    @error('estado')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        </form>

    </div>
@endsection
