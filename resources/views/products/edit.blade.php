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


            <div class="form-group mt-5">
                <label for="codigos_barras">Códigos de barras:</label>
                {{-- <div class="input-group">
                    <input type="text" name="nuevo_codigo_barras" class="form-control"
                        placeholder="Nuevo código de barras">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success" id="btnAgregarCodigoBarras">Agregar</button>
                    </span>
                </div> --}}
            </div>



            @foreach ($product->barcodes as $codigo_barras)
                <div>
                    <label>Código de barras</label>
                    <input type="text" name="codigos_barras[{{ $loop->index }}][codigo]"
                        value="{{ $codigo_barras->codigo }}">

                    <label for="codigos_barras[{{ $loop->index }}][estado]">Activo</label>
                    <input type="checkbox" class="form-check-input" name="codigos_barras[{{ $loop->index }}][estado]"
                        {{ $codigo_barras->estado ? 'checked' : '' }}>
                </div>
            @endforeach

            <div class="form-group mt-5">
                <label for="codigos_barras">Precios:</label>
            </div>

            @foreach ($product->prices as $item)
                <div>
                    <label>Precio: </label>
                    <input type="text" name="precios[{{ $loop->index }}][precio]" value="{{ $item->precio }}">

                    <label for="precios[{{ $loop->index }}][estado]">Activo</label>
                    <input type="checkbox" class="form-check-input" name="precios[{{ $loop->index }}][estado]"
                        {{ $item->estado ? 'checked' : '' }}>
                </div>
            @endforeach



            <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        </form>

    </div>
@endsection
