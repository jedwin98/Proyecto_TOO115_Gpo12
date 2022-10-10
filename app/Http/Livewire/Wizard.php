<?php
  
namespace App\Http\Livewire;

use App\Models\Ciudad;
use App\Models\Pais;
use Livewire\Component;
  
class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $amount, $description, $status = 1, $selectedPais="AF", $selectedCiudad=null, $residencia, $calle, $numeroVivienda, $stock, $dato1, $dato2, $dato3, $dato4;
    public $successMessage = '', $ciudades = null;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $paises = Pais::orderBy('nombreMin', 'Asc')->get();
        $this->ciudades = Ciudad::where('pais_iso','=',$this->selectedPais)->orderBy('nombreCiudad', 'Asc')->get();
        return view('livewire.wizard',['paises' => $paises]);
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
    
    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'dato1' => 'required',
        ]);
  
        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {
        $validatedData = $this->validate([
            'dato2' => 'required',
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
        

        //fin codigo

        $this->successMessage = 'Registro de asociado completado correctamente.';

        dd($this->selectedPais, $this->selectedCiudad, $this->residencia, $this->numeroVivienda);
  
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
    }
}