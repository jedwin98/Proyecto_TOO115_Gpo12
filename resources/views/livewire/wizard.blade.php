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
        <br>
            <div class="col">
                <h3> Datos de residencia</h3>
                <div class="form-group" wire:ignore>
                    <label for="description">Pais</label><br/>
                    <select class="form-control" id="pais" aria-label="Default select example" wire:model="selectedPais" style="width:100%;">
                        @foreach($paises as $pais)
                            <option value="{{$pais->iso}}">{{__($pais->nombreMin)}}</option>
                        @endforeach
                    </select>
                    @error('paises') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                @if(!is_null($ciudades)) 
                <div class="form-group">
                    <label for="description">Ciudad</label><br/>
                    <select class="form-control" id="ciudad" aria-label="Default select example" wire:model="selectedCiudad">
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
            <br>
            <div class="col-md-5">
            <br>
                <div class="card">
                    <div class="card-body">
                        <div id='map' style='width: 100%; height: 300px;' wire:ignore></div>
                    </div>
                </div>
                <!-- <div id='map' style='width: 400px; height: 300px;' wire:ignore></div> -->
            </div>
    </div>
    <div class="setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div>
            <div>
                <h3> Paso 3: Referencias</h3>
  
                <div class="row">
                    <div class="col">
                        <div class="card-header">
                        <h5>Referencias personales</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                <h5>Referencia personal 1</h5>
                                </div>
                                <div class="card-body">
                            
                            <div class="form-group">
                                    <label for="description">Nombre:</label><br/>
                                    <input type="text" class="form-control" wire:model="nom1">
                                    @error('nom1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Teléfono</label><br/>
                                <input type="text" class="form-control" wire:model="tel1" placeholder="22222222" maxlength="8">
                                @error('tel1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Email:</label><br/>
                                <input type="text" class="form-control" wire:model="email1" placeholder="ejemplo@email.com">
                                @error('email1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            </div>
                            <div class="card-header">
                                <h5>Referencia personal 2</h5>
                            </div>
                                <div class="card-body">

                            <div class="form-group">
                                <label for="description">Nombre:</label><br/>
                                <input type="text" class="form-control" wire:model="nom2">
                                @error('nom2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                            <label for="description">Teléfono</label><br/>
                            <input type="text" class="form-control" wire:model="tel2" placeholder="22222222" maxlength="8">
                            @error('tel2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                            <label for="description">Email:</label><br/>
                            <input type="text" class="form-control" wire:model="email2" placeholder="ejemplo@email.com">
                            @error('email2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            </div>
                        

                            
                            <br/> 
                        </div>
                     
                    </div>
                    <div class="col">
                        <div class="card-header">
                            <h5>Referencias laborales</h5>
                            </div>
                            <div class="card-body">
                        
                                <div class="card-header">
                                    <h5>Referencia laboral 1</h5>
                                    </div>
                                    <div class="card-body">
                                
                                <div class="form-group">
                                        <label for="description">Nombre:</label><br/>
                                        <input type="text" class="form-control" wire:model="nom3">
                                        @error('nom3') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Teléfono</label><br/>
                                    <input type="text" class="form-control" wire:model="tel3" placeholder="22222222" maxlength="8">
                                    @error('tel3') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Email:</label><br/>
                                    <input type="text" class="form-control" wire:model="email3" placeholder="ejemplo@email.com">
                                    @error('email3') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                </div>

                                
                                <div class="card-header">
                                    <h5>Referencia laboral 2</h5>
                                    </div>
                                    <div class="card-body">
                                <div class="form-group">
                                    <label for="description">Nombre:</label><br/>
                                    <input type="text" class="form-control" wire:model="nom4">
                                    @error('nom4') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="description">Teléfono</label><br/>
                                <input type="text" class="form-control" wire:model="tel4" placeholder="22222222" maxlength="8">
                                @error('tel4') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="description">Email:</label><br/>
                                <input type="text" class="form-control" wire:model="email4" placeholder="ejemplo@email.com">
                                @error('email4') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                </div>
    
                                
                                <br/> 
                            </div>
                            
                    </div>
                </div>

                    
            
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Anterior</button>
            </div>
        </div>
    </div>
    <div class="setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div>
            <div>
                <h3> Paso 4: Beneficiarios</h3>
  
                <div class="row">
                    <div class="col">
                        <div class="card-header">
                        <h5>Beneficiario 1</h5>
                        </div>
                        <div class="card-body">
                                                        
                            <div class="form-group">
                                    <label for="description">Nombre:</label><br/>
                                    <input type="text" class="form-control" wire:model="nomb1">
                                    @error('nomb1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Edad:</label><br/>
                                <input type="text" class="form-control" wire:model="ed1">
                                @error('ed1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Parentezco:</label><br/>
                                <input type="text" class="form-control" wire:model="paren1" placeholder="Ejemplo: Padre, Madre, etc">
                                @error('paren1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Porcentaje de paretezco:</label><br/>
                                <input type="number" class="form-control" wire:model="porcen1" step="0.1" min="0.0" max="100">
                                @error('porcen1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                    
                        </div>
                     
                    </div>
                    <div class="col">
                        <div class="card-header">
                            <h5>Beneficiario 2</h5>
                            </div>
                            <div class="card-body">
                        
                    
                            <div class="form-group">
                                    <label for="description">Nombre:</label><br/>
                                    <input type="text" class="form-control" wire:model="nomb2">
                                    @error('nomb2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Edad:</label><br/>
                                <input type="text" class="form-control" wire:model="ed2">
                                @error('ed2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Parentezco:</label><br/>
                                <input type="text" class="form-control" wire:model="paren2" placeholder="Ejemplo: Padre, Madre, etc">
                                @error('paren2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Porcentaje de paretezco:</label><br/>
                                <input type="number" class="form-control" wire:model="porcen2" step="0.1" min="0.0" max="100">
                                @error('porcen2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
             
                            </div>
                            
                    </div>
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
    
        
   
    <div class="row setup-content {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-6">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 6</h3>
  
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
    <script>
        document.addEventListener('livewire:load',function () {
            $('#pais').select2();
            $('#pais').select2().on('change', function () {
                @this.set('selectedPais',this.value);
            });
        });

        mapboxgl.accessToken = "{{env('MAPBOX_ACCESS_TOKEN')}}";
            const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [{{$longitudeMap}}, {{$latitudeMap}}], // starting position [lng, lat]
            zoom: 9, // starting zoom
            projection: 'globe' // display the map as a 3D globe
            });
            map.on('style.load', () => {
            map.setFog({}); // Set the default atmosphere style
            const marker1 = new mapboxgl.Marker()
            .setLngLat([{{$longitudeMap}}, {{$latitudeMap}}])
            .addTo(map);
        $(window).on('mapa', (e) => {
            marker1.setLngLat([e.detail.longitudeMap, e.detail.latitudeMap])
            .addTo(map);
            map.setCenter([e.detail.longitudeMap ,e.detail.latitudeMap]);
            map.zoomTo(9);
            //console.log(e.detail.latitudeMap);
            //console.log(e.detail.longitudeMap);
            });
        });
    </script>
</div>

