@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- table of categories --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Categorias</h1>
            </div>

            {{-- boton agregar --}}
            <div class="col-md-4 mt-3">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Agregar Categoria</a>
            </div>

        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>{{ $category->codigo }}</td>
                        <td>{{ $category->descripcion }}</td>
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
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-success">Ver</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    {{-- no hay productos --}}
                    <tr>
                        <td colspan="6" class="text-center">No hay productos</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- pagination --}}
        {{ $categories->links() }}




    </div>
@endsection
