@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<h2>Crear Producto</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio *</label>
        <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" step="0.01" min="0.01" required>
        @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock *</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" min="0" required>
        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
