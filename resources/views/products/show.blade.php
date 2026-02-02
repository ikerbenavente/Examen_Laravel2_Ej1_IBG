@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detalle del Producto</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>ID:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $product->id }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Nombre:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $product->nombre }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Precio:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ number_format($product->precio, 2) }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Stock:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                            {{ $product->stock }} unidades
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Fecha de Creación:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $product->created_at->format('d/m/Y H:i:s') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Última Actualización:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $product->updated_at->format('d/m/Y H:i:s') }}
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Volver
                    </a>
                    <div>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
