<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Formularioug;
use App\Http\Controllers\Api\Funidadp;
use App\Http\Controllers\Api\Userauth;

/**Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Rutas de las apis para el formulario general
Route::controller(Formularioug::class)->group(function (){
    Route::get('/formulariogs','index');
    Route::post('/formulariog','store');
    Route::get('/formulariog/{id}','show');
    Route::put('/formulariog/{id}','update');
    Route::delete('/formulariog/{id}','destroy');
});


//Rutas de las apis para el formulario de la unidad productora
Route::controller(Funidadp::class)->group(function (){
    Route::get('/unidadps','visualizar');
    Route::post('/unidadp','incriptar');
    Route::get('/unidadp/{id}','ver');
    Route::put('/unidadp/{id}','corregir');
    Route::delete('/unidadp/{id}','borrar');
});

Route::controller(Userauth::class)->group(function (){
    Route::post('/registro','guardado');
    Route::post('/login','login');
    Route::post('/recordar_contraseña','forgotpassword');
});

Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::get('perfil_usuario',[Userauth::class, 'perfil']);
    Route::post('logout',[Userauth::class, 'logout']);
});