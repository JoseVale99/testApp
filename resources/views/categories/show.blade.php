@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Ver Categoria</div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $category->codigo }}"
                        disabled>
                </div>

            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="name">Descripción</label>
                    <textarea class="form-control" id="descripcion" disabled name="descripcion">{{ $category->descripcion }}</textarea>
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Estado</label>
                    <input type="text" class="form-control"
                        value="@if ($category->estado == 1) Activo
                @else
                Inactivo @endif "
                        disabled>
                </div>

            </div>


        </div>

        <div class="col-md-4 mt-3">
            <a href="{{ route('categories.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    @endsection
