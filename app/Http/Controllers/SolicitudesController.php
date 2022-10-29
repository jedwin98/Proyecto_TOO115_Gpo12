<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudAsociado;
class SolicitudesController extends Controller
{
    public function index(){
        $solicitudes=SolicitudAsociado::where("estado_solicitud","=","Pendiente")->get();
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function show(SolicitudAsociado $solicitud){
        
        return view('solicitudes.show', compact('solicitud'));
    }
}
