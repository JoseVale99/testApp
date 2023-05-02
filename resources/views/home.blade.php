@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- menu de cruds category --}}

                        <div class="d-flex flex-column">
                            <div class="p-2"><a href="{{ route('categories.index') }}" class="btn btn-dark">Crud de
                                    categorias</a></div>

                            <div class="p-2"><a href="{{ route('barcodes.index') }}" class="btn btn-primary">Crud de
                                    Códigos de barra</a></div>

                            <div class="p-2"><a href="{{ route('prices.index') }}" class="btn btn-success">Crud de
                                    precios</a></div>

                            <div class="p-2"><a href="{{ route('products.index') }}" class="btn btn-warning">Crud de
                                    productos</a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
