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
                <h3 class="card-header" align="center">Agregar Producto</h3>
                <div class="card-body">

                @if(count($errors) >0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('producto.store')}}">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="sku" id="sku" class="form-control input-sm" placeholder="SKU" value="{{ old('sku') }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="precioPesos" id="precioPesos" class="form-control input-sm" placeholder="Precio en pesos" value="{{ old('precioPesos') }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="precioDolares" id="precioDolares" class="form-control input-sm" placeholder="Precio en dolares" value="{{ old('precioDolares') }}" >
                                    </div>
                                </div>
                                
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="descripcion_corta" id="descripcionCorta" class="form-control input-sm" placeholder="Descripción corta" value="{{ old('descripcion_corta') }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="descripcion_larga" id="descripcionLarga" class="form-control input-sm" placeholder="Descripción larga" value="{{ old('descripcion_larga') }}">
                                    </div>
                                </div>
                                
                            </div>

                             <br>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="puntos" id="puntos" class="form-control input-sm" placeholder="Puntos" value="{{ old('puntos') }}">
                                    </div>
                                </div>

    
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="{{ route('productos.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

