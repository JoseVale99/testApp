@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- table of prices --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de precios</h1>
            </div>

            {{-- boton agregar --}}
            <div class="col-md-4 mt-3">
                <a href="{{ route('prices.create') }}" class="btn btn-primary">Agregar nuevo precio</a>
            </div>

        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($prices as $price)
                    <tr>
                        <td scope="row">{{ $price->id }}</td>
                        <td>$
                            {{ number_format($price->precio, 2) }}
                        </td>
                        <td>
                            @if ($price->estado == 1)
                                <span class="text-primary"><b>Activo</b></span>
                            @else
                                <span class="text-danger">
                                    <b>Inactivo</b>
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('prices.show', $price->id) }}" class="btn btn-success">Ver</a>
                            <a href="{{ route('prices.edit', $price->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('prices.destroy', $price->id) }}" method="POST" class="d-inline">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{-- no hay productos --}}
                    <tr>
                        <td colspan="6" class="text-center">No hay precios</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- pagination --}}
        {{ $prices->links() }}




    </div>
@endsection
