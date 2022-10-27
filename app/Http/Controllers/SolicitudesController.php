<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudAsociado;
class SolicitudesController extends Controller
{
    public function index(){
        $solicitudes=SolicitudAsociado::where('estado_solicitud', 'Pendiente');
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function show($id){

    }
}
