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
    
    <div class="setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div>
            <div>
                <h3> Paso 1: Datos Personales</h3>
  
                <div class="row">
                    <div class="col">
                        
                                                        
                            <div class="form-group">
                                    <label for="description">Nombre 1:</label><br/>
                                    <input type="text" class="form-control" wire:model="nombre1">
                                    @error('nombre1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Nombre 2:</label><br/>
                                <input type="text" class="form-control" wire:model="nombre2">
                                @error('nombre2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Nombre 3:</label><br/>
                                <input type="text" class="form-control" wire:model="nombre3">
                                @error('nombre3') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">apellido 1:</label><br/>
                                <input type="text" class="form-control" wire:model="apellido1">
                                @error('apellido1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">apellido 2:</label><br/>
                                <input type="text" class="form-control" wire:model="apellido2">
                                @error('apellido2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                            <label for="description">Genero:</label><br/>
                        
                    <select class="form-control" id="genero" aria-label="Default select example" wire:model="selectedGenero" style="width:100%;">
                        @foreach($generos as $genero)
                            <option value="{{$genero->id}}">{{__($genero->nombre_genero)}}</option>
                        @endforeach
                    </select>
                    @error('generos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Fecha de Nacimiento:</label><br/>
                        <input type="date" class="form-control" wire:model="fecha_nac">
                        @error('fecha_nac') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>




                    </div>
                    <div class="col">
                        
                        <div class="form-group">
                            <label for="description">Tipo de documento de identidad:</label><br/>
                            <select class="form-control" id="documento" aria-label="Default select example" wire:model="selectedDoc" style="width:100%;">
                                @foreach($documentos as $documento)
                                    <option value="{{$documento->id}}">{{__($documento->nombre_documento)}}</option>
                                @endforeach
                            </select>
                            @error('documentos') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Numero de documento:</label><br/>
                            <input type="text" class="form-control" wire:model="num_doc">
                            @error('num_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        @if ($selectedDoc=="1")
                            <div class="form-group">
                            <label for="description">Numero de NIT:</label><br/>
                            <input type="text" class="form-control" wire:model="nit">
                            @error('nit') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Numero de NUP:</label><br/>
                            <input type="text" class="form-control" wire:model="nup">
                            @error('nup') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Numero de ISSS:</label><br/>
                            <input type="text" class="form-control" wire:model="isss">
                            @error('isss') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        @endif
                            <div class="form-group">
                            <label for="description">Estado Civil:</label><br/>
                        
                                <select class="form-control" id="genero" aria-label="Default select example" wire:model="selectedEstado" style="width:100%;">
                       
                                    <option value="Soltero (a)"> Soltero (a)</option>
                                    <option value="Casado (a)"> Casado (a)</option>
                        
                                </select>   
                        @error('generos') <span class="error text-danger">{{ $message }}</span> @enderror   
                    </div>
                    @if ($selectedEstado=="Casado (a)")
                    <div class="form-group">
                        <label for="description">Nombre del Conyuge:</label><br/>
                        <input type="text" class="form-control" wire:model="conyu">
                        @error('conyu') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    @endif
                    
                            
             
                            
                            
                    </div>
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
        <div>
            <div class="row">
                <div class="col">
                    <h3> Datos financieros</h3>

                    <div class="form-group">
                        <label for="description">Profesión:</label>
                        <input type="text" wire:model="profesion" class="form-control" id="profesion"/>
                        @error('stock') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Lugar de trabajo:</label>
                        <input type="text" wire:model="lugar_trabajo" class="form-control" id="lugar_trabajo"/>
                        @error('stock') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Salario:</label>
                        <input type="number" wire:model="salario" class="form-control" id="salario"/>
                        @error('stock') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-secondary" onclick="togglePress()">Ingresar datos de empresa</button>
                    <div class="form-group">
                        <label for="empresarial" class="empresarial" style="display:none;">Rubro de la empresa:</label>
                        <input type="text" wire:model="rubroE" class="form-control empresarial" id="rubroE" style="display:none;"></input>
                    </div>
                    <div class="form-group">
                        <label for="empresarial" class="empresarial" style="display:none;">Capacidad de pago:</label>
                        <input type="number" wire:model="capacidad_pagoE" class="form-control empresarial" id="capacidad_pagoE" style="display:none;"></input>
                    </div>
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

        function togglePress(){
            let toggles = Array.from(document.getElementsByClassName("empresarial"));
            labels = document.getElementsByTagName("label");
            for (var i = 0; i < labels.length; i++){
                if (labels[i].htmlFor == "empresarial"){
                    if (labels[i].style.display == "initial"){
                        labels[i].style.display = "none";
                    } else {
                        labels[i].style.display = "initial";
                    }
                }
            }
            toggles.forEach(toggle);
        }

        function toggle(item, index){
            console.log(item.type)
            if (!(item.style.display == "none")){
                if (item.type == "text"){
                    item.value = "";
                    item.style.display = "none";
                }
                if (item.type == "number"){
                    item.value = '0';
                    item.style.display = "none";
                }
            } else {
                item.style.display = "initial";
            }
        }
    </script>
</div>

