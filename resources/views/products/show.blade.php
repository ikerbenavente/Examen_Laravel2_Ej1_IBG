@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<h2>Detalle del Producto</h2>

<p><strong>Nombre:</strong> {{ $product->nombre }}</p>
<p><strong>Precio:</strong> {{ number_format($product->precio, 2) }}</p>
<p><strong>Stock:</strong> {{ $product->stock }}</p>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
<a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
<form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar este producto?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
@endsection
