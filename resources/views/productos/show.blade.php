@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h3 class="card-header " align="center">Detalle del producto</h3>

                <div class="card-body">

                    <div class="list-group">
                        <li class="list-group-item"></li>
                        <li class="list-group-item list-group-item-info"><b>SKU: </b>{{$producto->nombre}}</li>
                        <li class="list-group-item"><b>Precio pesos: </b>{{$producto->precioPesos}}</li>
                        <li class="list-group-item"><b>Precio dolares: </b>{{$producto->precioDolares}}</li>
                        <li class="list-group-item"><b>Puntos: </b>{{$producto->puntos}}</li>
                        <li class="list-group-item"><label><b>Activo:</b> {{$producto->activo == 1 ? 'Si': 'No'}}</label></li>
                        <li class="list-group-item"><label><b>Eliminado:</b> {{$producto->eliminado == 1 ? 'Si': 'No'}}</label></li>
                    </div>

                    <div class="table-container">
                        <br>
                                                    
                                
                                <div class="row">

                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <a href="{{ route('productos.index') }}" class="btn btn-primary btn-block" >Atrás</a>
                                    </div>

                                </div>
                            </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection