<?php
  
namespace App\Http\Livewire;

use App\Models\Asociado;
use App\Models\Beneficiario;
use App\Models\Ciudad;
use App\Models\DatosPersonale;
use App\Models\Pais;
use App\Models\Direccion;
use App\Models\Genero;
use App\Models\Referencia;
use App\Models\SolicitudAsociado;
use App\Models\TipoDocumento;
use App\Models\Ubicacion;
use FilippoToso\PositionStack\Facade\PositionStack;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
  
class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $amount, $description, $status = 1, $selectedPais="AF", $selectedCiudad=132722, $residencia, $calle, $numeroVivienda, $stock, $dato1, $dato2, $dato3, $dato4,$nom1,$nom2,$nom3,$nom4, $tel1, $tel2, $tel3, $tel4, $email1, $email2, $email3, $email4, $nomb1, $nomb2, $ed1, $ed2, $paren1, $paren2, $porcen1, $porcen2;
    public $successMessage = '', $ciudades = null, $latitudeMap = 31.94509 , $longitudeMap = 65.5556, $paises = null;
    public $profesion, $lugar_trabajo, $salario, $rubroE, $capacidad_pagoE;
    public $nombre1, $nombre2, $nombre3, $apellido1, $apellido2, $generos, $selectedGenero="1", $fecha_nac, $documentos,$selectedDoc="1", $num_doc, $nit=null, $nup=null, $isss=null, $estados, $selectedEstado="Soltero (a)", $conyu=null;

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount(){
        $ciudadesQueryy = Ciudad::where("id","=",$this->selectedCiudad)->get();
        $ciudad_name_ini = null;
        foreach ($ciudadesQueryy as $ciudadQueryy) {
            $ciudad_name_ini = $ciudadQueryy->nombreCiudad;
        }
        $dataMap = PositionStack::forward($ciudad_name_ini,['country'=>$this->selectedPais, 'limit'=>1]);
        $this->latitudeMap = $dataMap["data"][0]["latitude"];
        $this->longitudeMap = $dataMap["data"][0]["longitude"];
        $this->paises = Pais::orderBy('nombreMin', 'Asc')->get();
        $this->generos=Genero::all();
        $this->documentos=TipoDocumento::all();
    }

    public function render()
    {
        return view('livewire.wizard');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'nombre1' => 'required',
            'nombre2' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'selectedGenero' => 'required',
            'selectedDoc' => 'required',
            'selectedEstado' => 'required',
            'fecha_nac' => 'required',
            'num_doc' => 'required',
            
            
        ]);
 
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedPais' => 'required',
            'selectedCiudad' => 'required',
            'residencia' => 'required',
            'calle' => 'required',
            'numeroVivienda' => 'required',
        ]);

        $this->currentStep = 3;
    }
    //formulario de referencias personales
    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'nom1' => 'required',
            'tel1' => 'required',
            'email1' => 'required',
            'nom2' => 'required',
            'tel2' => 'required',
            'email2' => 'required',
            'nom3' => 'required',
            'tel3' => 'required',
            'email3' => 'required',
            'nom4' => 'required',
            'tel4' => 'required',
            'email4' => 'required',
        ]);
  
        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {
        $validatedData = $this->validate([
            'nomb1' => 'required',
            'ed1' => 'required',
            'paren1' => 'required',
            'porcen1' => 'required',
            'nomb2' => 'required',
            'ed2' => 'required',
            'paren2' => 'required',
            'porcen2' => 'required',
        ]);
  
        $this->currentStep = 5;
    }

    public function fifthStepSubmit()
    {
        $validatedData = $this->validate([
            'profesion' => 'required',
            'lugar_trabajo' => 'required',
            'salario' => 'required|numeric',
            'capacidad_pagoE' => 'numeric',
        ]);
  
        $this->currentStep = 6;
    }

    public function sixthStepSubmit()
    {
        $validatedData = $this->validate([
            'dato4' => 'required',
        ]);
  
        $this->currentStep = 7;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        //Codigo para crear objeto, insertar en bd
        //Parte de form ingreso datos de residencia
        $ciudadesQuery = Ciudad::where("id","=",$this->selectedCiudad)->get();
        $ciudad_name = null;
        foreach ($ciudadesQuery as $ciudadQuery) {
            $ciudad_name = $ciudadQuery->nombreCiudad;
        }

        $data = PositionStack::forward($ciudad_name,['country'=>$this->selectedPais, 'limit'=>1]);

        $asociado = new Asociado();
        $asociado->profesion = $this->profesion;
        $asociado->lugar_trabajo = $this->lugar_trabajo;
        $asociado->salario = $this->salario;
        $asociado->save();

       /* $output = new Symfony\Component\Console\Output\ConsoleOutput();
        if (!(empty($this->rubroE) || $this->capacidad_pagoE == 0) ){
            
            $output->writeln("Escribiste algo we :v");
        } else {
            $output->writeln("Ignorado como siempre :'v");
        }*/

        $ubicacion = new Ubicacion();
        $ubicacion->latitud = $data["data"][0]["latitude"];
        $ubicacion->longitud = $data["data"][0]["longitude"];
        $ubicacion->pais_iso = $this->selectedPais;
        $ubicacion->ciudad_id = $this->selectedCiudad;
        $ubicacion->save();

        $direccion = new Direccion();
        $direccion->residencia = $this->residencia;
        $direccion->calle = $this->calle;
        $direccion->num_vivienda = $this->numeroVivienda;
        $direccion->save();
        

        //form referencias personales y laborales
        $ref1= new Referencia();
        $ref1->nombre_referencia= $this->nom1;
        $ref1->telefono_referencia= $this->tel1;
        $ref1->correo_referencia= $this->email1;
        $ref1->tipo_referencia= "Personal";
       $ref1->asociado_id= $asociado->id;
       $ref1->save();

       $ref2= new Referencia();
       $ref2->nombre_referencia= $this->nom2;
       $ref2->telefono_referencia= $this->tel2;
       $ref2->correo_referencia= $this->email2;
       $ref2->tipo_referencia= "Personal";
       $ref2->asociado_id= $asociado->id;
       $ref2->save();
      
       $ref3= new Referencia();
        $ref3->nombre_referencia= $this->nom3;
        $ref3->telefono_referencia= $this->tel3;
        $ref3->correo_referencia= $this->email3;
        $ref3->tipo_referencia= "Laboral";
        $ref3->asociado_id= $asociado->id;
        $ref3->save();

       $ref4= new Referencia();
        $ref4->nombre_referencia= $this->nom4;
        $ref4->telefono_referencia= $this->tel4;
        $ref4->correo_referencia= $this->email4;
        $ref4->tipo_referencia= "Laboral";
       $ref4->asociado_id= $asociado->id;
       $ref4->save();

       //formulario de beneficiarios
       $bene1=new Beneficiario();
       $bene1->nombre_beneficiario=$this->nomb1;
       $bene1->edad_beneficiario=$this->ed1;
       $bene1->perentezco=$this->paren1;
       $bene1->porcentaje_beneficiario=$this->porcen1;
       $bene1->asociado_id= $asociado->id;;
       $bene1->save();

       $bene2=new Beneficiario();
       $bene2->nombre_beneficiario=$this->nomb2;
       $bene2->edad_beneficiario=$this->ed2;
       $bene2->perentezco=$this->paren2;
       $bene2->porcentaje_beneficiario=$this->porcen2;
       $bene2->asociado_id=$asociado->id;
       $bene2->save();
       //datos personales
       $datos=new DatosPersonale();
       $datos->nombre1=$this->nombre1;
       $datos->nombre2=$this->nombre2;
       $datos->nombre3=$this->nombre3;
       $datos->apellido1=$this->apellido1;
       $datos->apellido2=$this->apellido2;
       $datos->fecha_nacimiento=$this->fecha_nac;
       $datos->numero_documento=$this->num_doc;
       $datos->estado_civil=$this->selectedEstado;
       $datos->conyugue=$this->conyu;
       $datos->tipo_documento_id=$this->selectedDoc;
       $datos->genero_id=$this->selectedGenero;
       $datos->pdf_nit=$this->nit; 
       $datos->pdf_isss=$this->isss;
       $datos->pdf_nup=$this->nup;
       $datos->pais_iso=$this->selectedPais;
       $datos->direccion_id=$direccion->id;
       $datos->ubicacions_id=$ubicacion->id;
       $datos->save();
       //creando la solicitud
       $solicitud= new SolicitudAsociado();
       $solicitud->estado_solicitud="Pendiente";
       $solicitud->ubicacion_id=$ubicacion->id;
       $solicitud->datos_personales_id=$datos->id;
       $solicitud->espacio_reservado_id=1;
       $solicitud->user_id=Auth::id();
       $solicitud->save();
       
       //fin codigo

        $this->successMessage = 'Registro de asociado completado correctamente.';
  
        $this->clearForm();
  
        $this->currentStep = 1;

    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->name = '';
        $this->amount = '';
        $this->description = '';
        $this->stock = '';
        $this->status = 1;
    }

    public function updatedselectedPais($iso){
        $this->ciudades = Ciudad::where('pais_iso','=',$iso)->orderBy('nombreCiudad', 'Asc')->get();
        $this->selectedCiudad = $this->ciudades->first()->id; //poner en la variable el valor de la primera ciudad, ya que la variable no se actualiza si se deja la primera ciudad seleccionada
        //dd($this->selectedCiudad);
        // $paiseQuery = Pais::where('iso','=',$iso)->get();
        // $pais_name = null;
        // foreach ($paiseQuery as $paisQuery) {
        //     $pais_name = $paisQuery->nombreMin;
        // }

        try {//cuando encuentra ciudad en el pais
            $ciudadesQueryPais = Ciudad::where('pais_iso','=',$iso)->orderBy('nombreCiudad', 'Asc')->first();
            $ciudad_first_name = null;
            $dataMap = PositionStack::forward($ciudadesQueryPais->nombreCiudad,['country'=>$this->selectedPais, 'limit'=>1]);
            $this->latitudeMap = $dataMap["data"][0]["latitude"];
            $this->longitudeMap = $dataMap["data"][0]["longitude"];
            $this->dispatchBrowserEvent('mapa', ['latitudeMap'=>$this->latitudeMap, 'longitudeMap'=>$this->longitudeMap]);
        } catch (\Throwable $th) {//buscar solo por el nombre del pais ya que no encontro ciudad
            $paiseQuery = Pais::where('iso','=',$iso)->get();
            $pais_name = null;
            foreach ($paiseQuery as $paisQuery) {
                $pais_name = $paisQuery->nombreMin;
            }
            try {//pais encontrado
                $dataMap = PositionStack::forward($pais_name,['country'=>$this->selectedPais, 'limit'=>1]);
                $this->latitudeMap = $dataMap["data"][0]["latitude"];
                $this->longitudeMap = $dataMap["data"][0]["longitude"];
            } catch (\Throwable $th) {//el resultado de la api no tiene el iso del pais, buscar sin el parametro opcional de pais
                $dataMap = PositionStack::forward($pais_name,['limit'=>1]);
                $this->latitudeMap = $dataMap["data"][0]["latitude"];
                $this->longitudeMap = $dataMap["data"][0]["longitude"];
            }
            // $dataMap = PositionStack::forward($pais_name,['country'=>$this->selectedPais, 'limit'=>1]);
            // $this->latitudeMap = $dataMap["data"][0]["latitude"];
            // $this->longitudeMap = $dataMap["data"][0]["longitude"];
            //dd($pais_name,$this->latitudeMap,$this->longitudeMap);
            $this->dispatchBrowserEvent('mapa', ['latitudeMap'=>$this->latitudeMap, 'longitudeMap'=>$this->longitudeMap]);
        }
    }

    public function updatedselectedCiudad(){
        $ciudadesQueryy = Ciudad::where("id","=",$this->selectedCiudad)->get();
        $ciudad_name_ini = null;
        foreach ($ciudadesQueryy as $ciudadQueryy) {
            $ciudad_name_ini = $ciudadQueryy->nombreCiudad;
        }
        //dd($this->selectedPais,$ciudad_name_ini);
        $dataMap = PositionStack::forward($ciudad_name_ini,['country'=>$this->selectedPais, 'limit'=>1]);
        $this->latitudeMap = $dataMap["data"][0]["latitude"];
        $this->longitudeMap = $dataMap["data"][0]["longitude"];
        $this->dispatchBrowserEvent('mapa', ['latitudeMap'=>$this->latitudeMap, 'longitudeMap'=>$this->longitudeMap]);
    }
    
}