<?php

namespace App\Http\Controllers;

use App\Models\Biometrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Storage;

class DatosBiometricosController extends Controller
{
    public function index(){
        return view('biometricos.index');
    }
    public function store(Request $request)
    {
        //foto
        $img = $request->image;
        $folderPath = "fotos/";       
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        //guardando foto
        $biometrico= new Biometrica();
        $biometrico->foto_biometrica= $file;
       // $biometrico->firma_biometrica= $file_f;
        $biometrico->save();
        // firma
        $folderPath = 'firmas/';      
        $image = explode(";base64,", $request->signed);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        $file = $folderPath . uniqid() . '.'.$image_type_png;
        
        Storage::put($file, $image_base64);


        // guardando firma
        $biometrico->firma_biometrica= $file;
        $biometrico->save();
        
        dd('Image uploaded successfully: '.$fileName . 'firma: '. $file);
    }
    


}
