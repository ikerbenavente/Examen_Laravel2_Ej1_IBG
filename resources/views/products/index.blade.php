@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Productos</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo Producto</a>
</div>

@if($products->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->nombre }}</td>
                <td>{{ number_format($product->precio, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@else
    <p>No hay productos. <a href="{{ route('products.create') }}">Crear uno</a></p>
@endif
@endsection
