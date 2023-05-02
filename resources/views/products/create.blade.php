@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Crear nuevo producto</div>
        </div>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="row mt-4">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Código*</label>
                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo"
                            name="codigo" value="{{ old('codigo') }}">
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
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                    </div>
                    @error('descripcion')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- categorias --}}

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Categoría*</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id">
                            <option value="">Seleccione</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                    {{ $category->codigo }}
                                </option>
                            @empty
                                <option value="">
                                    No hay categorias
                                </option>
                            @endforelse
                        </select>
                    </div>
                    @error('category_id')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- productos con varios codigos de barra --}}


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Codgigos de barra*</label>
                        <select name="barcode[]" id="barcode"
                            class="form-control
                            @error('barcode') is-invalid @enderror"
                            multiple>

                            @foreach ($barcodes as $codigoBarra)
                                <option value="{{ $codigoBarra->id }}">
                                    {{ $codigoBarra->codigo }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('barcode')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- precios --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Precios*</label>
                        <select name="precios[]" id="precios"
                            class="form-control
                            @error('precios') is-invalid @enderror"
                            multiple>

                            @foreach ($prices as $item)
                                <option value="{{ $item->id }}">
                                    $
                                    {{ number_format($item->precio, 2) }}
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


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Estado*</label>
                        <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado"
                            selected>
                            <option value="">Seleccione</option>
                            <option value="1" @if (old('estado') == '1') selected @endif>Activo</option>
                            <option value="0" @if (old('estado') == '0') selected @endif>Inactivo
                            </option>

                        </select>
                    </div>
                    @error('estado')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary mt-4">Agregar</button>
        </form>

    </div>
@endsection
