<?php
  
namespace App\Http\Livewire;

use App\Models\Beneficiario;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\Direccion;
use App\Models\Referencia;
use App\Models\Ubicacion;
use FilippoToso\PositionStack\Facade\PositionStack;
use Livewire\Component;
  
class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $amount, $description, $status = 1, $selectedPais="AF", $selectedCiudad=132722, $residencia, $calle, $numeroVivienda, $stock, $dato1, $dato2, $dato3, $dato4,$nom1,$nom2,$nom3,$nom4, $tel1, $tel2, $tel3, $tel4, $email1, $email2, $email3, $email4, $nomb1, $nomb2, $ed1, $ed2, $paren1, $paren2, $porcen1, $porcen2;
    public $successMessage = '', $ciudades = null, $latitudeMap = 31.94509 , $longitudeMap = 65.5556, $paises = null;
    
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
            'name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
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
            'dato3' => 'required',
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
        

        //form felix

        //form referencias personales y laborales
        $ref1= new Referencia();
        $ref1->nombre_referencia= $this->nom1;
        $ref1->telefono_referencia= $this->tel1;
        $ref1->correo_referencia= $this->email1;
        $ref1->tipo_referencia= "Personal";
       // $ref1->asociado_id= asociado de felix;
       $ref2= new Referencia();
       $ref2->nombre_referencia= $this->nom2;
       $ref2->telefono_referencia= $this->tel2;
       $ref2->correo_referencia= $this->email2;
       $ref2->tipo_referencia= "Personal";
      // $ref1->asociado_id= asociado de felix;
      $ref3= new Referencia();
        $ref3->nombre_referencia= $this->nom3;
        $ref3->telefono_referencia= $this->tel3;
        $ref3->correo_referencia= $this->email3;
        $ref3->tipo_referencia= "Laboral";
       // $ref1->asociado_id= asociado de felix;
       $ref4= new Referencia();
        $ref4->nombre_referencia= $this->nom4;
        $ref4->telefono_referencia= $this->tel4;
        $ref4->correo_referencia= $this->email4;
        $ref4->tipo_referencia= "Laboral";
       // $ref1->asociado_id= asociado de felix;

       //formulario de beneficiarios
       $bene1=new Beneficiario();
       $bene1->nombre_beneficiario=$this->nomb1;
       $bene1->edad_beneficiario=$this->ed1;
       $bene1->parentezco=$this->paren1;
       $bene1->porcentaje_beneficiario=$this->porcen1;
       //$bene1->asociado_id= asociado de felix;

       $bene2=new Beneficiario();
       $bene2->nombre_beneficiario=$this->nomb2;
       $bene2->edad_beneficiario=$this->ed2;
       $bene2->parentezco=$this->paren2;
       $bene2->porcentaje_beneficiario=$this->porcen2;
       //$bene2->asociado_id= asociado de felix;
       
       
       
       //fin codigo

        $this->successMessage = 'Registro de asociado completado correctamente.';

        //dd($this->selectedPais, $this->selectedCiudad, $this->residencia, $this->numeroVivienda, $ciudad_name, $data);
  
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
            $dataMap = PositionStack::forward($pais_name,['country'=>$this->selectedPais, 'limit'=>1]);
            $this->latitudeMap = $dataMap["data"][0]["latitude"];
            $this->longitudeMap = $dataMap["data"][0]["longitude"];
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