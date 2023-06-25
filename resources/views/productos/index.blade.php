@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="panel panel-primary">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header" align="center">LISTA DE PRODUCTOS</h3>
                <div class="card-body">
                    <a href="{{route('productos.create')}}" class="btn btn-primary">Agregar producto</a>
                    <br><br>
                    <table id="tablaProductos" class="table table-bordered table-striped table-hover text-center">
                            <thead class="table-dark">
                                <th>Sku</th>
                                <th>Precio en dólares</th>
                                <th>Precio en pesos</th>
                                <th>Puntos</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                            @if($productos->count())
                                @foreach($productos as $producto)
                                    <tr>
                                        <td>{{$producto->sku}}</td>
                                        <td>{{$producto->precioDolares}}</td>
                                        <td>{{$producto->precioPesos}}</td>
                                        <td>{{$producto->puntos}}</td>
                                        <td>{{$producto->activo == 1 ? 'Si' : 'No'}}</td>
                                        
                                        <td>
                                            <a href="{{route('inactivarActivar',$producto->id) }}" style="width: 85px;" @class(['btn', 'btn-warning' => $producto->activo == 1, 'btn-success' => $producto->activo == 0])> 
                                                {{$producto->activo == 1 ? 'Inactivar': 'Activar'}} 
                                            </a>
                                            <a href= "{{route('producto.detalle',$producto->id)}}" class="btn btn-secondary">Detalle</a>
                                            <a href= "{{route('producto.edit',$producto->id)}}" class="btn btn-primary">Editar</a>
                                            <a href= "{{route('producto.destroy',$producto->id)}}"  onclick="return confirm('¿Estás seguro de eliminar el producto?')" class="btn btn-danger">Eliminar</a>
                                        </td>                                
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No hay registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

