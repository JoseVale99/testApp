@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- table of categories --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Productos</h1>
            </div>

            {{-- boton agregar --}}
            <div class="col-md-4 mt-3">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar producto</a>
            </div>

        </div>

        {{-- buscador  --}}
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        {{-- buton --}}
                        <button class="btn btn-outline-secondary" type="button">
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Categoría</th>
                    {{-- <th scope="col">Codigos de barra</th> --}}
                    {{-- <th scope="col">Precios</th> --}}
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td scope="row">{{ $product->id }}</td>
                        <td>{{ $product->codigo }}</td>
                        <td>{{ $product->descripcion }}</td>

                        <td>{{ $product->category->codigo }}</td>

                        {{-- array de codigos --}}




                        <td>
                            @if ($product->estado == 1)
                                <span class="text-primary"><b>Activo</b></span>
                            @else
                                <span class="text-danger">
                                    <b>Inactivo</b>
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-success">Ver</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay productos</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- pagination --}}
        {{ $products->links() }}




    </div>
@endsection
