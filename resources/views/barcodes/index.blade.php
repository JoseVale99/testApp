@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- table of barcodes --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de codigos de barras</h1>
            </div>

            {{-- boton agregar --}}
            @can('barcodes.create')
                <div class="col-md-4 mt-3">
                    <a href="{{ route('barcodes.create') }}" class="btn btn-primary">Agregar codigo de barras</a>
                </div>
            @endcan

        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($barcodes as $barcode)
                    <tr>
                        <td scope="row">{{ $barcode->id }}</td>
                        <td>{{ $barcode->codigo }}</td>
                        <td>
                            @if ($barcode->estado == 1)
                                <span class="text-primary"><b>Activo</b></span>
                            @else
                                <span class="text-danger">
                                    <b>Inactivo</b>
                                </span>
                            @endif
                        </td>
                        <td>
                            @can('barcodes.show', $barcode)
                                <a href="{{ route('barcodes.show', $barcode->id) }}" class="btn btn-success">Ver</a>
                            @endcan
                            @can('barcodes.edit', $barcode)
                                <a href="{{ route('barcodes.edit', $barcode->id) }}" class="btn btn-primary">Editar</a>
                            @endcan
                            @can('barcodes.destroy', $barcode)
                                <form action="{{ route('barcodes.destroy', $barcode->id) }}" method="POST" class="d-inline">

                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    {{-- no hay productos --}}
                    <tr>
                        <td colspan="6" class="text-center">No hay códigos de barras</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- pagination --}}
        {{ $barcodes->links() }}




    </div>
@endsection
