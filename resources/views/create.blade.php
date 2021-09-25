@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <h2 class="text-success">Crear Hoja de vida</h2>
                @include('flash::message')
            </div>
            <form class="col-sm-12 needs-validation" novalidate method="POST" action="{{route('store')}}" onsubmit="return onsubmited()">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-success">Datos básicos</h4>
                        <hr>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cedula">Cédula</label>
                        <input type="number" class="form-control" onkeyup="VerifyCedule(this.value)" id="cedula" name="cedula" required placeholder="Cédula" minlength="5" maxlenght="12">
                        <div class="invalid-feedback">
                            La cédula no puede ser vacía,  debe tener mínimo 5 dígitos y maximo 12.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nombre1">Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre1" required placeholder="Nombre" minlength="3">
                        <div class="invalid-feedback">
                            La nombre no puede ser vacío y debe tener mínimo 3 caráteres.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nombre2">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido" required minlength="3">
                        <div class="invalid-feedback">
                            La apellido no puede ser vacío y debe tener mínimo 3 caráteres.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required minlength="7" minlength="10">
                        <div class="invalid-feedback">
                            El teléfono no puede ser vacío y debe tener mínimo 7 dígitos.
                          </div>
                    </div>
                      <div class="form-group col-sm-4">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required minlength="3">
                        <div class="invalid-feedback">
                            La dirección no puede ser vacía y debe tener mínimo 5 carácteres.
                          </div>  
                    </div>
                      <div class="form-group col-sm-4">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
                        <div class="invalid-feedback">
                            El correo no puede ser vacío y debe tener mínimo 5 carácteres.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="genero_mujer">Genero</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="genero" id="genero_mujer" value="mujer" required>
                            <label class="form-check-label" for="genero_mujer">
                              Mujer
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="genero" id="genero_hombre" value="hombre">
                            <label class="form-check-label" for="genero_hombre">
                              Hombre
                            </label>
                            <div class="invalid-feedback" >
                                    El género no puede ser vacío, seleccione.
                            </div>
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nacionalidad_co">Nacionalidad</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="nacionalidad" id="nacionalidad_co" value="colombiano" required>
                            <label class="form-check-label" for="nacionalidad_co">
                              Colombiano
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="nacionalidad" id="nacionalidad_ex" value="extranjero">
                            <label class="form-check-label" for="nacionalidad_ex">
                              Extranjero
                            </label>
                            <div class="invalid-feedback" >
                                    La nacionalidad no puede ser vacía, seleccione.
                            </div>
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="estado_civil">Estado Civil</label>
                        <select class="custom-select" id="estado_civil" name="estado_civil" required>
                            <option value="" disabled selected hidden>Seleccione</option>>
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="separado">Separado</option>
                            <option value="viudo">Viudo</option>
                          </select>
                          <div class="invalid-feedback">
                            Esta no puede ser vacía, seleccione su estado civil.
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" onchange="changeFechaNacimiento(this)" max="{{$date_max}}" name="fecha_nacimiento" required>
                        <div class="invalid-feedback">
                            La fecha de nacimiento no puede ser vacía, seleccione.
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="rh">RH</label>
                        <select class="custom-select" id="rh" name="rh" required >
                        <option value="" disabled selected hidden>Seleccione</option>>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                          </select>
                        <div class="invalid-feedback">
                            Esta no puede ser vacía, seleccione su tipo de sangre.
                        </div>
                      </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12">
                        <h4 class="text-success">Estudios <button type="button" onclick="addStudys()" class="btn btn-sm btn-info ml-4 text-white"><i class="fas fa-plus"></i></button></h4>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo[]" required placeholder="Título">
                                <div class="invalid-feedback">
                                    El Título no puede ser vacío y debe tener mínimo 5 carácteres.
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="entidad_educativa">Entidad educativa</label>
                                <input type="text" class="form-control" id="entidad_educativa" name="entidad_educativa[]" required placeholder="Entidad" >
                                <div class="invalid-feedback">
                            La entidad educativa no puede ser vacía y debe tener mínimo 5 carácteres.
                          </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="fecha_terminacion">Fecha terminacion</label>
                                <input type="date" class="form-control fecha_termination_study" max="{{$date}}" id="fecha_terminacion" name="fecha_terminacion[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" id="studys_totals">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12">
                        <h4 class="text-success">Trabajos <button type="button" onclick="addJobs()" class="btn btn-sm btn-info ml-4 text-white"><i class="fas fa-plus"></i></button></h4>
                        <hr>
                    </div>
                    <div class="col-sm-12" id="totals_jobs">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="empresa">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa[]" minlength="3" required placeholder="Empresa">
                                <div class="invalid-feedback">
                                    La empresa no puede ser vacía y debe tener mínimo 3 carácteres.
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control" id="cargo" name="cargo[]" minlength="3" required placeholder="Cargo" >
                                <div class="invalid-feedback">
                                    El cargo no puede ser vacío y debe tener mínimo 3 carácteres.
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input type="date" class="form-control fecha_inicio" max="{{$date}}" id="fecha_inicio" name="fecha_inicio[]" required onchange="changeFechaInicio(this, 'fecha_terminacion_jobs')">
                                <div class="invalid-feedback">
                                    Desbes seleccionar una fecha de inicio.
                                 </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="fecha_terminacion_jobs">Fecha terminacion</label>
                                <input type="date" class="form-control fecha_terminacion_jobs" max="{{$date}}" id="fecha_terminacion_jobs" name="fecha_terminacion_jobs[]">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-sm btn-success mx-2">Añadir HDV</button>
                        <a href="{{route('index')}}"><button type="button" class="btn btn-sm btn-secondary mx-2">Cancelar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();

        var studys = 1;
        function addStudys(){
            var fecha = document.getElementById("fecha_nacimiento").value;
            var contenido = `
                        <div class="row" id="studynumero${studys}">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="titulo${studys}">Título</label>
                                        <input type="text" class="form-control" id="titulo${studys}" name="titulo[]" required placeholder="Titulo">
                                        <div class="invalid-feedback">
                                            El Título no puede ser vacío y debe tener mínimo 5 carácteres.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="entidad_educativa${studys}">Entidad educativa</label>
                                        <input type="text" class="form-control" id="entidad_educativa${studys}" name="entidad_educativa[]" required placeholder="Entidad" >
                                        <div class="invalid-feedback">
                                            La entidad educativa no puede ser vacía y debe tener mínimo 5 carácteres.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_terminacion${studys}">Fecha terminacion</label>
                                        <input type="date" class="form-control fecha_termination_study" min="${fecha}" id="fecha_terminacion${studys}" name="fecha_terminacion[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label for="" class="invisible">Titulo</label>
                                <button type="button" class="btn btn-sm btn-danger" onclick="eliminateStudy(${studys})"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
            `;

            var content = document.getElementById('studys_totals').innerHTML;
            document.getElementById('studys_totals').insertAdjacentHTML('beforeend', contenido);
            studys++;
        }

        function eliminateStudy(id){
            document.getElementById('studys_totals').removeChild(document.getElementById('studynumero'+id));
        }

        var jobs = 1;

        function addJobs(){
            var fecha = document.getElementById("fecha_nacimiento").value;
            var contenido = `
            <div class="row" id="jobscounter${jobs}">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="empresa${jobs}">Empresa</label>
                                        <input type="text" class="form-control" id="empresa${jobs}" minlength="3" name="empresa[]" required placeholder="Empresa">
                                        <div class="invalid-feedback">
                                            La empresa no puede ser vacía y debe tener mínimo 3 carácteres.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="cargo${jobs}">Cargo</label>
                                        <input type="text" class="form-control" id="cargo${jobs}" minlength="3" name="cargo[]" required placeholder="Cargo" >
                                        <div class="invalid-feedback">
                                            El cargo no puede ser vacío y debe tener mínimo 3 carácteres.
                                         </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="fecha_inicio${jobs}">Fecha Inicio</label>
                                        <input type="date" class="form-control fecha_inicio" onchange="changeFechaInicio(this, 'fecha_terminacion_jobs${jobs}')" max="{{$date}}" id="fecha_inicio${jobs}" name="fecha_inicio[]" required>
                                        <div class="invalid-feedback">
                                            Desbes seleccionar una fecha de inicio.
                                         </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="fecha_terminacion_jobs${jobs}">Fecha terminacion</label>
                                        <input type="date" class="form-control fecha_terminacion_jobs" max="{{$date}}" id="fecha_terminacion_jobs${jobs}" name="fecha_terminacion_jobs[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label for="" class="invisible">Titulo</label>
                                <button type="button" class="btn btn-sm btn-danger" onclick="eliminateJobs(${jobs})"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
            `;

            document.getElementById("totals_jobs").innerHTML = insertAdjacentHTML('beforeend', contenido);
            jobs++;
        }

        function eliminateJobs(id){
            document.getElementById("totals_jobs").removeChild(document.getElementById("jobscounter"+id));
        }

        function changeFechaNacimiento(campo){
            var dates = document.getElementsByClassName("fecha_termination_study");
            for (let index = 0; index < dates.length; index++) {
                dates[index].value = "";
                dates[index].setAttribute("min", campo.value);
            }
            var dates = document.getElementsByClassName("fecha_terminacion_jobs");
            for (let index = 0; index < dates.length; index++) {
                dates[index].value = "";
                dates[index].setAttribute("min", campo.value);
            }
            var dates = document.getElementsByClassName("fecha_inicio");
            var ano = new Date(campo.value)
            ano.setFullYear(ano.getFullYear() + 18);
            ano = ano.toISOString().slice(0,10).replace(/-/g,"-");
            for (let index = 0; index < dates.length; index++) {
                dates[index].value = "";
                dates[index].setAttribute("min", ano);
            }
        }

        function changeFechaInicio(campo, id){
            document.getElementById(id).value = "";
            document.getElementById(id).setAttribute("min", campo.value);
        }

        var form_validate_ced = false;
        function onsubmited(e){
            if(form_validate_ced == false){
                Swal.fire({
                    icon: 'error',
                    title: 'La cedula ya existe',
                    text: 'La cedula digitada ya esta asignada en una hoja de vida!'
                });
            }
            return form_validate_ced;
        }

        function VerifyCedule(valor){
            axios.post('{{route("verifyCedula")}}', {
                cedula: valor,
            })
            .then(function (response) {
                form_validate_ced = response.data.res;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection