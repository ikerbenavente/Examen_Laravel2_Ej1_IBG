@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Editar Producto</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" 
                               name="nombre" 
                               value="{{ old('nombre', $product->nombre) }}" 
                               placeholder="Ingrese el nombre del producto"
                               required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('precio') is-invalid @enderror" 
                               id="precio" 
                               name="precio" 
                               value="{{ old('precio', $product->precio) }}" 
                               step="0.01" 
                               min="0.01"
                               placeholder="0.00"
                               required>
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">El precio debe ser un valor positivo.</small>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock (unidades) <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('stock') is-invalid @enderror" 
                               id="stock" 
                               name="stock" 
                               value="{{ old('stock', $product->stock) }}" 
                               min="0"
                               placeholder="0"
                               required>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">El stock debe ser un número entero.</small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
