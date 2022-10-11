<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosBiometricosController extends Controller
{
    public function index(){
        return view('biometricos.index');
    }
}
