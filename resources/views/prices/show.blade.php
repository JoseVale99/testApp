@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header h5">Ver precio</div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Código</label>
                    <input type="text" class="form-control" id="codigo" name="precio"
                        value=" {{ number_format($price->precio, 2) }}" disabled>
                </div>

            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="name">Estado</label>
                    <input type="text" class="form-control"
                        value="@if ($price->estado == 1) Activo
                @else
                Inactivo @endif "
                        disabled>
                </div>

            </div>


        </div>

        <div class="col-md-4 mt-3">
            <a href="{{ route('prices.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    @endsection
