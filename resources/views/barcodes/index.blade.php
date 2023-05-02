@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- table of barcodes --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de codigos de barras</h1>
            </div>

            {{-- boton agregar --}}
            <div class="col-md-4 mt-3">
                <a href="{{ route('barcodes.create') }}" class="btn btn-primary">Agregar codigo de barras</a>
            </div>

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
                @forelse ($barcodes as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>{{ $category->codigo }}</td>
                        <td>
                            @if ($category->estado == 1)
                                <span class="text-primary"><b>Activo</b></span>
                            @else
                                <span class="text-danger">
                                    <b>Inactivo</b>
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('barcodes.show', $category->id) }}" class="btn btn-success">Ver</a>
                            <a href="{{ route('barcodes.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('barcodes.destroy', $category->id) }}" method="POST" class="d-inline">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
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
