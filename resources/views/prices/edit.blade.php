@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Editar nueva categoría</div>
        </div>

        <form action="{{ route('prices.update', $price->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mt-4">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Precio*</label>
                        <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio"
                            name="precio" value="{{ old('precio', $price->precio) }}">
                    </div>
                    @error('precio')
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
                            <option value="1" @if ($price->estado == 1) selected @endif>Activo</option>
                            <option value="0" @if ($price->estado == 0) selected @endif>Inactivo</option>


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
