<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\ProductoTraducciones;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos= Productos::select('id','sku','precioDolares','precioPesos','puntos','activo')->where('eliminado','0')->paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

       


        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
             'sku'=>'required|unique:productos',
             'nombre'=>'required|regex:/^[a-zA-Z\s]+$/u',
             'precioDolares'=>'required|numeric|min:1', 
             'precioPesos'=>'required|numeric|min:1', 
             'puntos'=>'required|numeric',
             'descripcion_corta'=>'required|max:120'
        ]);

            $producto = Productos::create([
                'sku' => $request->get('sku'),
                'precioDolares' => $request->get('precioDolares'),
                'precioPesos' => $request->get('precioPesos'),
                'puntos' => $request->get('puntos'),
                'activo' => 0,
                'eliminado' => 0
            ]);

            

            $productoTradu = ProductoTraducciones::create([
                'producto_id' => $producto->id,
                'nombre' => $request->get('nombre'),
                'descripcion_corta' => $request->get('descripcion_corta'),
                'descripcion_larga' => $request->get('descripcion_larga'),
                'url' => $request->get('nombre'),
                'idioma' => 'Español'
            ]);

            return redirect()->route('productos.index')->with('success','Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $producto = Productos::find($id);
        return  view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $producto= Productos::find($id);
        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

       /*  $this->validate($request,[
            'sku'=>'required|unique:productos',
            'nombre'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'precioDolares'=>'required|numeric|min:1', 
            'precioPesos'=>'required|numeric|min:1', 
            'puntos'=>'required|numeric',
        ]);

        dd($request->all());
        
        //return redirect()->route('empleados.index')->with('success','Registro actualizado satisfactoriamente'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $estatus = Productos::where('id',$id)->value('eliminado');

        if($estatus == 0){
             Productos::find($id)->update(['eliminado'=> 1]);
        }else{
             Productos::find($id)->update(['eliminado'=> 0]);
        }        

        
        return redirect()->route('productos.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function inactivarActivarProducto($id)
    {
    
        $estatus = Productos::where('id',$id)->value('activo');

        if($estatus == 0){
             Productos::find($id)->update(['activo'=> 1]);
        }else{
             Productos::find($id)->update(['activo'=> 0]);
        }

        return redirect()->route('productos.index')->with('success','Se cambio el estatus correctamente');
       
    }

    public function validarSku($sku){
        dd($sku);
        $sku = Productos::where('sku',$sku)->first();

       

        if($sku === null){
            return response()->json(['data'=>'Sku disponible','validar'=>true]);
        }else{
            return response()->json(['data'=> 'EL sku ya existe, intente con otro','validar'=>false]);
        }
    }
}
