<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Auth;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole(['administrador'])){
            $usuarios = User::select('id','name','email','created_at', 'updated_at')->get();
            return view('usuarios',compact('usuarios'));
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function usuarios_data(){
        if(Auth::user()->hasRole(['administrador']))
        {
            $usuarios = User::select('id','name','email','created_at', 'updated_at')->orderBy('name')->get();
            return datatables($usuarios)->toJson();    
        }
        else {
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }

    public function create(Request $request)
    {
        if(Auth::user()->hasRole(['administrador']))
        {
            try {
                $correoVerificacion = User::select('email')->where('email','=',request('CorreoUsuario'))->get();
                if(!$correoVerificacion->isEmpty()){
                    return response()->json(['estado' => 'error', 'mensaje' => 'No se pudo crear el usuario correctamente, el correo proporcionado ya existe en nuestros registros']);
                }

                $Contra = request('ContraseñaUsuario');
                $ContraConfirm = request('ContraseñaConfirmUsuario');

                if(strcmp($Contra, $ContraConfirm) !== 0){
                    return response()->json(['estado' => 'error', 'mensaje' => 'No se pudo crear el usuario correctamente, las contraseñas ingresadas no coinciden']);
                }

                $user = User::create([
                    'name' => request('NombreUsuario'),
                    'email' => request('CorreoUsuario'),
                    'password' => Hash::make(request('ContraseñaUsuario')),
                ]);

                $IdUsuario = $user->id;
                $RolesAssign = request('RolesAssign');

                if(!empty($RolesAssign)){
                    foreach($RolesAssign as $rolAssign){
                        User::find($IdUsuario)->assignRole($rolAssign);
                    }
                }
                return response()->json(['estado' => 'creado']);
            } catch (\Exception $e) {
                //report($e); //report error
                return response()->json(['estado' => 'error', 'mensaje' => 'No se pudo crear el usuario correctamente']);
            }
        }
        else {
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(Auth::user()->hasRole(['administrador']))
        {
            try {
                $IdUsuario = request('IdUsuario');
                $NombreUsuario = request('NombreUsuario');
                $CorreoUsuario = request('CorreoUsuario');
                $RolesAssign = request('RolesAssign');
                $RolesUnassign = request('RolesUnassign');

                $Usuario = User::findOrFail($IdUsuario);
                $Usuario->name = $NombreUsuario;
                $Usuario->email = $CorreoUsuario;

                if(!empty($RolesAssign)){
                    foreach($RolesAssign as $rolAssign){
                        User::find($IdUsuario)->assignRole($rolAssign);
                    }
                }
                if(!empty($RolesUnassign)){
                    foreach($RolesUnassign as $rolUnassign){
                        User::find($IdUsuario)->removeRole($rolUnassign);
                    }
                }
                $Usuario->save();
                return response()->json(['estado' => 'actualizado']);

            } catch (\Exception $e) {
                //report($e); //report error
                return response()->json(['estado' => 'error']);
            }
        }
        else {
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        if(Auth::user()->hasRole(['administrador'])){
            try{
                User::find(request('IdUsuario'))->delete();
                return response()->json(['estado' => 'eliminado']);
            }catch(\Exception $e){
                return response()->json(['estado' => 'error']);
            }
        }
        else {
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }

    public function consultarUsuarios(Request $request){
        $IdUsuario = request('IdUsuario');
        if(Auth::user()->hasRole(['administrador'])){
            $usuario = User::select('id','name','email','created_at', 'updated_at')->where('id','=',$IdUsuario)->with('roles')->get();
            return response()->json(['Usuario' => $usuario]);
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }

    public function roles(){
        //creacion de roles
        //$role_admin = Role::create(['name' => 'administrador']);
        //$role_ejec = Role::create(['name' => 'ejecutivo']);
        //$role_junta = Role::create(['name' => 'junta_directiva']);
        //$role_asociado = Role::create(['name' => 'asociado']);

        //User::find(1)->assignRole('administrador');
        //User::find(2)->assignRole('administrador');

        return "hecho";
    }
}
