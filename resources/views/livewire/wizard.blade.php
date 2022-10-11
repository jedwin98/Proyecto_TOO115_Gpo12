<div>

@if(!empty($successMessage))
<div class="alert alert-success">
   {{ $successMessage }}
</div>
@endif

<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
            <p>Paso 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
            <p>Paso 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
            <p>Paso 3</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}">4</a>
            <p>Paso 4</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}">5</a>
            <p>Paso 5</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-6" type="button" class="btn btn-circle {{ $currentStep != 6 ? 'btn-default' : 'btn-primary' }}">6</a>
            <p>Paso 6</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-7" type="button" class="btn btn-circle {{ $currentStep != 7 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">7</a>
            <p>Paso 7</p>
        </div>
    </div>
</div>
    
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 1</h3>
  
                <div class="form-group">
                    <label for="title">Product Name:</label>
                    <input type="text" wire:model="name" class="form-control" id="taskTitle">
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Product Amount:</label>
                    <input type="text" wire:model="amount" class="form-control" id="productAmount"/>
                    @error('amount') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
  
                <div class="form-group">
                    <label for="description">Product Description:</label>
                    <textarea type="text" wire:model="description" class="form-control" id="taskDescription">{{{ $description ?? '' }}}</textarea>
                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Siguiente</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Datos de residencia</h3>
  
                <div class="form-group">
                    <label for="description">Pais</label><br/>
                    <select class="form-control" aria-label="Default select example" wire:model="selectedPais">
                        @foreach($paises as $pais)
                            <option value="{{$pais->iso}}" required>{{$pais->nombreMin}}</option>
                        @endforeach
                    </select>
                    @error('paises') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                @if(!is_null($ciudades)) 
                <div class="form-group">
                    <label for="description">Ciudad</label><br/>
                    <select class="form-control" aria-label="Default select example" wire:model="selectedCiudad">
                        @foreach($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}" required>{{$ciudad->nombreCiudad}}</option>
                        @endforeach
                    </select>
                    @error('ciudades') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                @endif
                <div class="form-group">
                    <label for="description">Residencia</label><br/>
                    <input type="text" class="form-control" wire:model="residencia">
                    @error('residencia') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Calle</label><br/>
                    <input type="text" class="form-control" wire:model="calle">
                    @error('calle') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Numero de vivienda</label><br/>
                    <input type="text" class="form-control" wire:model="numeroVivienda">
                    @error('numeroVivienda') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Anterior</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 3</h3>
  
                <div class="form-group">
                    <label for="description">Dato 1</label>
                    <input type="text" wire:model="dato1" class="form-control" id="dato1"/>
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Anterior</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 4</h3>
  
                <div class="form-group">
                    <label for="description">Dato 2</label>
                    <input type="text" wire:model="dato2" class="form-control" id="dato2"/>
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="fourthStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Anterior</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 5</h3>
  
                <div class="form-group">
                    <label for="description">Dato 3</label>
                    <input type="text" wire:model="dato3" class="form-control" id="dato3"/>
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="fifthStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(4)">Anterior</button>
            </div>
        </div>
    </div>
    
        
   
    <div class="row setup-content {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-7">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 7</h3>
  
                <table class="table">
                    <tr>
                        <td>Product Name:</td>
                        <td><strong>{{$name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Amount:</td>
                        <td><strong>{{$amount}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product status:</td>
                        <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Description:</td>
                        <td><strong>{{$description}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Stock:</td>
                        <td><strong>{{$stock}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dato 1:</td>
                        <td><strong>{{$dato1}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dato 2:</td>
                        <td><strong>{{$dato2}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dato 3:</td>
                        <td><strong>{{$dato3}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dato 4:</td>
                        <td><strong>{{$dato4}}</strong></td>
                    </tr>
                </table>
  
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Terminar</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(6)">Anterior</button>
            </div>
        </div>
    </div>
</div>



