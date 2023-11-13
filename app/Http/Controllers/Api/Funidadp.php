<?php

namespace App\Http\Controllers\Api;
use App\Models\UnidadP;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Funidadp extends Controller
{
      /** PARA EL FORMULARIO DE UNIDAD PRODUCTORA
     * visualizar para mostrar los datos de los formularios
     * incriptar para poder guardar los datos
     * corregir para actualizar datos
     * borrar para eliminar datos
     * ver para mostrar los datos en otra pagina para actualizar
     */

     public function incriptar(Request $request){
        /**REGISTRO DE FORMULARIO
         * validaciones para los ingresos de datos al formulario 
         * validacion required para que sea necesario llenar el  campo para guardar
         * validacion date_format:format  para  que sea un dato en formato  fecha
         * validacion numeriic para que  sean solo datos  numericos
         * validacion string para  que sean solo datos de letras
         */
         $request->validate([
            'seccion'=>'required|string',
            'subseccion'=>'required|string',
            'serie'=>'required',
            'subserie'=>'required',
            'descripcion_serie'=>'required',
            'codigo'=>'required|string',
            'soporte_origen_documentacion'=>'required|string',
            'condicion_acceso'=>'required|string',
            'plazo_conservacion_documental'=>'required',
            'base_legal'=>'required',
            'disposicion_final'=>'required',
            'tecnica_seleccion'=>'required',
            'observacion'=>'required',
        ]);
        /**Parte designada para la creacion de objetos y designacion de valores correspondientes */
        $folio=new UnidadP;
        $folio->seccion= $request->seccion;
        $folio->subseccion= $request->subseccion;
        $folio->serie= $request->serie;
        $folio->subserie= $request->subserie;
        $folio->descripcion_serie= $request->descripcion_serie;
        $folio->codigo= $request->codigo;
        $folio->soporte_origen_documentacion= $request->soporte_origen_documentacion;
        $folio->condicion_acceso= $request->condicion_acceso;
        $folio->plazo_conservacion_documental= $request->plazo_conservacion_documental;
        $folio->base_legal= $request->base_legal;
        $folio->disposicion_final= $request->disposicion_final;
        $folio->tecnica_seleccion= $request->tecnica_seleccion;
        $folio->observacion= $request->observacion;
        $folio->save();
        return $folio;

        
    }

      /**el return view se debe poner la ruta de la vista de la  carpeta plantillamenubar */
    
    public function visualizar(){
        $folios= UnidadP::all();
        return $folios;

      
   }

   public function ver($id){
      $folio= UnidadP::find($id);
     return $folio;
   
   }
   
   public function corregir (Request $request,$id){


      $folio= UnidadP::find($id);
      $folio->seccion= $request->seccion;
      $folio->subseccion= $request->subseccion;
      $folio->serie= $request->serie;
      $folio->subserie= $request->subserie;
      $folio->descripcion_serie= $request->descripcion_serie;
      $folio->codigo= $request->codigo;
      $folio->soporte_origen_documentacion= $request->soporte_origen_documentacion;
      $folio->condicion_acceso= $request->condicion_acceso;
      $folio->plazo_conservacion_documental= $request->plazo_conservacion_documental;
      $folio->base_legal= $request->base_legal;
      $folio->disposicion_final= $request->disposicion_final;
      $folio->tecnica_seleccion= $request->tecnica_seleccion;
      $folio->observacion= $request->observacion;
      $folio->save();
      return $folio;

   }

   public function borrar($id){
      $folio= UnidadP::find($id);
      $folio->delete();
      return $folio;

     
   }
}
