<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormularioG;

class Formularioug extends Controller
{
    
    /** PARA EL FORMULARIO GENERAL
     * index para mostrar los datos de los formularios
     * store para poder guardar los datos
     * update para actualizar datos
     * destroy para eliminar datos
     * show para mostrar los datos en otra pagina para actualizar  datosq
     */ 

    /**
     * muestra todos  los datos que han sido  guardados.
     */
    public function index()
    {
        $formularios= FormularioG::all();
        return $formularios;  
    }

    /**
     * guarda todos los datos  ingresados por teclado.
     */
    public function store(Request $request)
    {
          /**REGISTRO DE FORMULARIO
             * validaciones para los ingresos de datos al formulario 
            * validacion required para que sea necesario llenar el  campo para guardar
            * validacion date_format:format  para  que sea un dato en formato  fecha
            * validacion numeriic para que  sean solo datos  numericos
            * validacion string para  que sean solo datos de letras
           */
            $request->validate([
                'fecha_ingreso'=>'required|date_format:format', 
                'fecha_documento'=>'required|date_format:format',
                'seccion'=>'required|string',
                'subseccion'=>'required|string',
                'oficios'=>'required',
                'serie_descripcion'=>'required',
                'numero_documento_actas'=>'required|numeric',
                'numero_folios'=>'required|numeric',
                'soporte'=>'required|string',
                'tipo_informacion'=>'required|string',
                'estado_conservacion'=>'required|string',
                'anexo'=>'required',
                'unidad_almacenamiento'=>'required',
                'numero'=>'required|numeric',
                'expediente'=>'required|numeric',
                'observacion'=>'required',
                'vinculacion_documento_digitales'=>'required'
            ]); 
        $formulario= new FormularioG();
        $formulario->fecha_ingreso= $request->fecha_ingreso;
        $formulario->fecha_documento= $request->fecha_documento;
        $formulario->seccion= $request->seccion;
        $formulario->subseccion= $request->subseccion;
        $formulario->oficios= $request->oficios;
        $formulario->serie_descripcion= $request->serie_descripcion;
        $formulario->numero_documento_actas= $request->numero_documento_actas;
        $formulario->numero_folios= $request->numero_folios;
        $formulario->soporte= $request->soporte;
        $formulario->tipo_informacion= $request->tipo_informacion;
        $formulario->estado_conservacion= $request->estado_conservacion;
        $formulario->anexo= $request->anexo;
        $formulario->unidad_almacenamiento= $request->unidad_almacenamiento;
        $formulario->numero= $request->numero;
        $formulario->expediente= $request->expediente;
        $formulario->observacion= $request->observacion;
        $formulario->vinculacion_documento_digitales= $request->vinculacion_documento_digitales;
        $formulario->save();
         
        return $formulario;
    }

    /**
     * muestra  un componente especifico guardado .
     */
    public function show($id)
    {
        $formulario= FormularioG::find($id);
        return $formulario;
    }

    /**
     * actualiza todas los datos ingresados .
     */
    public function update(Request $request, $id)
    {
        $formulario = FormularioG::find($id);
        $formulario->fecha_ingreso= $request->fecha_ingreso;
        $formulario->fecha_documento= $request->fecha_documento;
        $formulario->seccion= $request->seccion;
        $formulario->subseccion= $request->subseccion;
        $formulario->oficios= $request->oficios;
        $formulario->serie_descripcion= $request->serie_descripcion;
        $formulario->numero_documento_actas= $request->numero_documento_actas;
        $formulario->numero_folios= $request->numero_folios;
        $formulario->soporte= $request->soporte;
        $formulario->tipo_informacion= $request->tipo_informacion;
        $formulario->estado_conservacion= $request->estado_conservacion;
        $formulario->anexo= $request->anexo;
        $formulario->unidad_almacenamiento= $request->unidad_almacenamiento;
        $formulario->numero= $request->numero;
        $formulario->expediente= $request->expediente;
        $formulario->observacion= $request->observacion;
        $formulario->vinculacion_documento_digitales= $request->vinculacion_documento_digitales;
        $formulario->save();

        return $formulario;

    }

    /**
     * elimina los datos de la tabla.
     */
    public function destroy($id)
    {
        $formulario= FormularioG::destroy($id);
        return $formulario;
    }
}
