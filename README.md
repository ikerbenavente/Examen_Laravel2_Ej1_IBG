# Aplicación Laravel - Gestión de Productos

## Descripción
Aplicación web completa para gestionar productos con operaciones CRUD, validaciones robustas y protección contra ataques comunes.

## Características Implementadas

### Modelo de Datos
- **Producto** con los siguientes campos:
  - `nombre` (string): Nombre del producto
  - `precio` (decimal): Precio del producto
  - `stock` (integer): Cantidad disponible en stock
  - Timestamps automáticos (`created_at`, `updated_at`)

### Operaciones CRUD Completas
1. **CREATE** - Crear nuevos productos
2. **READ** - Listar y ver detalles de productos
3. **UPDATE** - Actualizar productos existentes
4. **DELETE** - Eliminar productos

### Validaciones
- **Nombre**: Obligatorio, máximo 255 caracteres
- **Precio**: Obligatorio, numérico, mínimo 0.01 (positivo)
- **Stock**: Obligatorio, número entero, mínimo 0

### Mensajes Flash
- Mensajes de éxito para operaciones completadas
- Mensajes de error para validaciones fallidas
- Alertas con estilos Bootstrap (verde para éxito, rojo para errores)

### Seguridad
1. **Protección CSRF**: Todos los formularios incluyen `@csrf` token
2. **Prevención SQL Injection**: Uso de Eloquent ORM y Query Builder
3. **Validación de entrada**: Validación en el servidor
4. **Mass Assignment Protection**: `$fillable` en el modelo

## Estructura del Proyecto

```
ExamenLaravel_IBG/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php    # Controlador con CRUD completo
│   └── Models/
│       └── Product.php               # Modelo Product
├── database/
│   ├── migrations/
│   │   └── 2026_02_02_*_create_products_table.php
│   └── database.sqlite               # Base de datos SQLite
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php         # Layout principal con flash messages
│       └── products/
│           ├── index.blade.php       # Listado de productos
│           ├── create.blade.php      # Formulario de creación
│           ├── edit.blade.php        # Formulario de edición
│           └── show.blade.php        # Detalles del producto
└── routes/
    └── web.php                       # Rutas resource
```

## Instalación y Uso

### Requisitos Previos
- PHP >= 8.0
- Composer

### Pasos para Ejecutar

1. **Instalar dependencias** (ya completado)
   ```bash
   composer install
   ```

2. **Configurar base de datos** (SQLite ya configurado)
   - La aplicación usa SQLite por defecto
   - Archivo: `database/database.sqlite`

3. **Ejecutar migraciones** (ya completado)
   ```bash
   php artisan migrate
   ```

4. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

5. **Acceder a la aplicación**
   - Abrir navegador en: `http://localhost:8000`
   - La página principal redirige automáticamente al listado de productos

## Rutas Disponibles

| Método | URI | Acción | Descripción |
|--------|-----|--------|-------------|
| GET | `/products` | index | Listar todos los productos |
| GET | `/products/create` | create | Mostrar formulario de creación |
| POST | `/products` | store | Guardar nuevo producto |
| GET | `/products/{id}` | show | Ver detalles de un producto |
| GET | `/products/{id}/edit` | edit | Mostrar formulario de edición |
| PUT/PATCH | `/products/{id}` | update | Actualizar producto |
| DELETE | `/products/{id}` | destroy | Eliminar producto |

## Funcionalidades de Seguridad

### 1. Protección CSRF
Todos los formularios incluyen el token CSRF de Laravel:
```blade
@csrf
@method('PUT')  // Para métodos PUT/DELETE
```

### 2. Prevención de SQL Injection
- Uso exclusivo de Eloquent ORM
- Query Builder de Laravel
- Prepared statements automáticos

### 3. Validación de Datos
```php
$request->validate([
    'nombre' => 'required|string|max:255',
    'precio' => 'required|numeric|min:0.01',
    'stock' => 'required|integer|min:0'
]);
```

### 4. Mass Assignment Protection
```php
protected $fillable = ['nombre', 'precio', 'stock'];
```

## Interfaz de Usuario

- **Framework CSS**: Bootstrap 5.3
- **Características**:
  - Diseño responsive
  - Badges de colores para stock (verde > 10, amarillo > 0, rojo = 0)
  - Confirmación antes de eliminar
  - Alertas dismissibles
  - Paginación automática

## Mensajes de Validación Personalizados

Todos los mensajes están en español:
- "El nombre es obligatorio."
- "El precio debe ser positivo."
- "El stock debe ser un número entero."

## Autor
Desarrollado como examen de Laravel

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
