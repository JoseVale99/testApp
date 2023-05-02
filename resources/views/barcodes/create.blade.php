@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Crear nueva categoría</div>
        </div>

        <form action="{{ route('barcodes.store') }}" method="POST">
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

                <div class="col-md-5">
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
