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
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $barcode->codigo }}"
                        disabled>
                </div>

            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Estado</label>
                    <input type="text" class="form-control"
                        value="@if ($barcode->estado == 1) Activo
                @else
                Inactivo @endif "
                        disabled>
                </div>

            </div>


        </div>

        <div class="col-md-4 mt-3">
            <a href="{{ route('barcodes.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    @endsection
