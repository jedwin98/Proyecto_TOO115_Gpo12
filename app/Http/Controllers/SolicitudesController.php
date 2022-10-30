<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use Illuminate\Http\Request;
use App\Models\SolicitudAsociado;
use Illuminate\Support\Facades\Auth;

class SolicitudesController extends Controller
{
    public function index(){
        $solicitudes=SolicitudAsociado::where("estado_solicitud","=","Pendiente")->get();
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function show(SolicitudAsociado $solicitud){
        $user_log=Auth::id();
        return view('solicitudes.show', compact('solicitud','user_log'));
    }
    public function edit(SolicitudAsociado $solicitud){

        return view('solicitudes.edit', compact('solicitud'));
    }
    public function update(SolicitudAsociado $solicitud, Request $request){
        $acta=new Acta();
        $folderPath = 'img/';      
        $image = explode(";base64,", $request->signed);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        $file = $folderPath . uniqid() . '.'.$image_type_png;
        
        file_put_contents($file, $image_base64);


        // guardando firma
        $acta->firma_presidente= $file;


        $folderPath = 'img/';      
        $image = explode(";base64,", $request->signed2);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        $file = $folderPath . uniqid() . '.'.$image_type_png;
        
        file_put_contents($file, $image_base64);


        // guardando firma
        $acta->firma_secretario= $file;
        $acta->numero_acta=$solicitud->id;// se me olvidó ponerle su fk xdd 
        $acta->save();

        $solicitud->estado_solicitud="Aprobada";
        $solicitud->save();
        $solicitudes=SolicitudAsociado::where("estado_solicitud","=","Pendiente")->get();
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function denegar(SolicitudAsociado $solicitud){
        $solicitud->estado_solicitud="Rechazada";
        $solicitud->save();
        return view('solicitudes.index');
    }


}
