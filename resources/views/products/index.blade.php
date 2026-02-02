@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Nuevo Producto
    </a>
</div>

@if($products->count() > 0)
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Fecha Creación</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><strong>{{ $product->nombre }}</strong></td>
                            <td>€{{ number_format($product->precio, 2) }}</td>
                            <td>
                                <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                    {{ $product->stock }} unidades
                                </span>
                            </td>
                            <td>{{ $product->created_at->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('products.show', $product) }}" 
                                       class="btn btn-info text-white">
                                        Ver
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" 
                                       class="btn btn-warning">
                                        Editar
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@else
    <div class="alert alert-info">
        No hay productos registrados. 
        <a href="{{ route('products.create') }}" class="alert-link">Crear el primero</a>
    </div>
@endif
@endsection
