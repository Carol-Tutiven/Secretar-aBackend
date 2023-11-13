<?php

namespace App\Http\Controllers\Api;


use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cookie as FacadesCookie;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class Userauth extends Controller
{

    //Api para el metodo de Registro de usuario
    public function guardado(Request $request){
 
        /**REGISTRO DE USUARIO
               * validaciones para los ingresos de datos al formulario 
              * validacion required para que sea necesario llenar el  campo para guardar
              * validacion string para  que sean solo datos de letras
              */
     $request->validate([
        'name'=>'required|string',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8|confirmed'
     ]);
     $usuario= new User;
     $usuario->name=$request->name;
     $usuario->email=$request->email;
     $usuario->password=Hash::make($request->password);
     //$usuario->contrasena=Hash::make($request->contrasena);
     $usuario->save();

     return response($usuario, Response::HTTP_CREATED);
     return response()->json([
        "message"=>"Metodo Registro OK"
     ]);
    }
    

    //Api para el metodo de login de usuario
    public function login(Request $request){

        $credentials= $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        $remember= request()->filled('remember');

        if (Auth::attempt($credentials,$remember)){
            $usuario= Auth::user();
            $token= $usuario->createToken('token')->plainTextToken;
            $cookie= cookie('cookie_token',$token, 60*24);
            return response(["token"=>$token], Response::HTTP_OK)->withoutCookie($cookie);

        }else{
            return response(["message"=>"Credenciales invalidas"], Response::HTTP_UNAUTHORIZED);
        }

    }


    //Api para el metodo de mostrar el perfil del  usuario
    public function perfil(){

        return response()->json([
            "message"=> "perfil de usuario",
            "perfil"=> auth()->user()
        ],Response::HTTP_OK);
    }


    
    //Api para el metodo de cerrar sesion
    public function logout(){
        $cookie= FacadesCookie::forget('cookie_token');
        return response(["message"=>"Cierre de sesion exitosa"],Response::HTTP_OK)->withoutCookie($cookie);
    }
  



    //Api para el metodo de olvidado contraseña
   public function forgotpassword(Request $request){

        try{
            $user= User::where('email', $request->email)->get();

            if(count($user) > 0){
                
                $token= Str::random(40);
                $domain= URL::to('/');
                $url= $domain.'/reset-password?token=' .$token;


                $data['url']= $url;
                $data['email']= $request->email;
                $data['title']="Password Reset";
                $data['body']="Por favor  hacer click en el link para resetear tu contraseña.";


                Mail::send('forgetpasswordmail',['data'=>$data],function($message) use($data){

                    $message->to($data['email'])->subject($data['title']);

                });

                $datatime=Carbon::now()->format('Y-m-d  H:i:s');
                PasswordResetToken::UpdateOrCreate(
                    ['email'=>$request->email],
                    [

                        'email'=>$request->email,
                        'token'=>$token,
                        'created_at'=>$datatime

                    ]
                );
                return response()->json(['success'=>true, 'msg'=>'Por favor chekea tu correo para resetear tu contraseña.']);

            }else{
                return response()->json(['success'=>false, 'msg'=>'Usuario no enonctrado!']);
            }

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
        
    }
}
