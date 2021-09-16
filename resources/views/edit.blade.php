@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <h2 class="text-success">Crear Hoja de vida</h2>
                @include('flash::message')
            </div>
            <form class="col-sm-12 needs-validation" novalidate method="POST" action="{{route('update', $hdv->id)}}" onsubmit="onsubmited()">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-success">Datos básicos</h4>
                        <hr>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cedula">Cédula</label>
                        <input type="number" class="form-control" id="cedula" value="{{$hdv->cedula}}" name="cedula" required placeholder="Cédula" minlength="5" readonly>
                        <div class="invalid-feedback">
                            La cédula no puede ser vacía y debe tener mínimo 5 dígitos.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nombre1">Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre1" value="{{$hdv->nombre1}}" name="nombre1" required placeholder="Nombre" minlength="3">
                        <div class="invalid-feedback">
                            La nombre no puede ser vacío y debe tener mínimo 3 caráteres.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nombre2">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" value="{{$hdv->nombre2}}" name="nombre2" placeholder="Nombre">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" value="{{$hdv->apellido1}}" placeholder="Apellido" required minlength="3">
                        <div class="invalid-feedback">
                            La apellido no puede ser vacío y debe tener mínimo 3 caráteres.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" value="{{$hdv->apellido2}}" placeholder="Apellido">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" value="{{$hdv->telefono}}" placeholder="Teléfono" required minlength="7" minlength="10">
                        <div class="invalid-feedback">
                            El teléfono no puede ser vacío y debe tener mínimo 7 dígitos.
                          </div>
                    </div>
                      <div class="form-group col-sm-4">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$hdv->direccion}}" placeholder="Dirección" required minlength="3">
                        <div class="invalid-feedback">
                            La dirección no puede ser vacía y debe tener mínimo 5 carácteres.
                          </div>  
                    </div>
                      <div class="form-group col-sm-4">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{$hdv->correo}}" placeholder="Correo" required>
                        <div class="invalid-feedback">
                            El correo no puede ser vacío y debe tener mínimo 5 carácteres.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="genero_mujer">Genero</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="genero" {{$hdv->genero == "mujer" ? 'checked' : ''}} id="genero_mujer" value="mujer" required>
                            <label class="form-check-label" for="genero_mujer">
                              Mujer
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="genero" {{$hdv->genero == "hombre" ? 'checked' : ''}} id="genero_hombre" value="hombre">
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
                            <input class="form-check-input" type="radio" name="nacionalidad" {{$hdv->nacionalidad == "colombiano" ? 'checked' : ''}} id="nacionalidad_co" value="colombiano" required>
                            <label class="form-check-label" for="nacionalidad_co">
                              Colombiano
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="nacionalidad" {{$hdv->nacionalidad == "extranjero" ? 'checked' : ''}} id="nacionalidad_ex" value="extranjero">
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
                            <option value="soltero" {{$hdv->estado_civil == 'soltero' ? 'selected' : ''}}>Soltero</option>
                            <option value="casado" {{$hdv->estado_civil == 'casado' ? 'selected' : ''}}>Casado</option>
                            <option value="separado" {{$hdv->estado_civil == 'separado' ? 'selected' : ''}}>Separado</option>
                            <option value="viudo" {{$hdv->estado_civil == 'viudo' ? 'selected' : ''}}>Viudo</option>
                          </select>
                          <div class="invalid-feedback">
                            Esta no puede ser vacía, seleccione su estado civil.
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" value="{{$hdv->fecha_nacimiento}}" onchange="changeFechaNacimiento(this)" max="{{$date_max}}" name="fecha_nacimiento" required>
                        <div class="invalid-feedback">
                            La fecha de nacimiento no puede ser vacía, seleccione.
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="rh">RH</label>
                        <select class="custom-select" id="rh" name="rh" required >
                        <option value="" disabled selected hidden>Seleccione</option>>
                            <option value="A+" {{$hdv->rh == 'A+' ? 'selected' : ''}}>A+</option>
                            <option value="A-" {{$hdv->rh == 'A-' ? 'selected' : ''}}>A-</option>
                            <option value="B+" {{$hdv->rh == 'B+' ? 'selected' : ''}}>B+</option>
                            <option value="B-" {{$hdv->rh == 'B-' ? 'selected' : ''}}>B-</option>
                            <option value="O+" {{$hdv->rh == 'O+' ? 'selected' : ''}}>O+</option>
                            <option value="O-" {{$hdv->rh == 'O-' ? 'selected' : ''}}>O-</option>
                            <option value="AB+" {{$hdv->rh == 'AB+' ? 'selected' : ''}}>AB+</option>
                            <option value="AB-" {{$hdv->rh == 'AB-' ? 'selected' : ''}}>AB-</option>
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
                    <div class="col-sm-12" id="studys_totals">
                        @foreach ($hdv->study as $key => $stu)
                            @if ($key == 0)
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="titulo">Título</label>
                                        <input type="text" class="form-control" id="titulo" value="{{$stu->titulo}}" name="titulo[]" required placeholder="Título">
                                        <div class="invalid-feedback">
                                            El Título no puede ser vacío y debe tener mínimo 5 carácteres.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="entidad_educativa">Entidad educativa</label>
                                        <input type="text" class="form-control" id="entidad_educativa" value="{{$stu->entidad_educativa}}" name="entidad_educativa[]" required placeholder="Entidad" >
                                        <div class="invalid-feedback">
                                        La entidad educativa no puede ser vacía y debe tener mínimo 5 carácteres.
                                    </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_terminacion">Fecha terminacion</label>
                                        <input type="date" class="form-control fecha_termination_study" value="{{$stu->fecha_terminacion}}" min="{{$hdv->fecha_nacimiento}}" max="{{$date}}" id="fecha_terminacion" name="fecha_terminacion[]">
                                    </div>
                                </div>
                            @else
                                <div class="row" id="studynumero{{$hdv->telefono}}{{$stu->id}}">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="titulo{{$hdv->telefono}}{{$stu->id}}">Título</label>
                                                <input type="text" class="form-control" id="titulo{{$hdv->telefono}}{{$stu->id}}" name="titulo[]" required placeholder="Titulo" value="{{$stu->titulo}}">
                                                <div class="invalid-feedback">
                                                    El Título no puede ser vacío y debe tener mínimo 5 carácteres.
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="entidad_educativa{{$hdv->telefono}}{{$stu->id}}">Entidad educativa</label>
                                                <input type="text" class="form-control" id="entidad_educativa{{$hdv->telefono}}{{$stu->id}}" name="entidad_educativa[]" required placeholder="Entidad" value="{{$stu->entidad_educativa}}">
                                                <div class="invalid-feedback">
                                                    La entidad educativa no puede ser vacía y debe tener mínimo 5 carácteres.
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="fecha_terminacion{{$hdv->telefono}}{{$stu->id}}">Fecha terminacion</label>
                                                <input type="date" class="form-control fecha_termination_study" min="{{$hdv->fecha_nacimiento}}" id="fecha_terminacion{{$hdv->telefono}}{{$stu->id}}" name="fecha_terminacion[]" value="{{$stu->fecha_terminacion}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="" class="invisible">Titulo</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="eliminateStudyLarvel({{$hdv->telefono}}{{$stu->id}})"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12">
                        <h4 class="text-success">Trabajos <button type="button" onclick="addJobs()" class="btn btn-sm btn-info ml-4 text-white"><i class="fas fa-plus"></i></button></h4>
                        <hr>
                    </div>
                    <div class="col-sm-12" id="totals_jobs">
                        @foreach ($hdv->jobs as $key => $job)
                            @if ($key == 0)
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="empresa">Empresa</label>
                                        <input type="text" class="form-control" id="empresa" value="{{$job->empresa}}" name="empresa[]" minlength="3" required placeholder="Empresa">
                                        <div class="invalid-feedback">
                                            La empresa no puede ser vacía y debe tener mínimo 3 carácteres.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="cargo">Cargo</label>
                                        <input type="text" class="form-control" id="cargo" name="cargo[]" value="{{$job->cargo}}" minlength="3" required placeholder="Cargo" >
                                        <div class="invalid-feedback">
                                            El cargo no puede ser vacío y debe tener mínimo 3 carácteres.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="fecha_inicio">Fecha Inicio</label>
                                        <input type="date" class="form-control fecha_inicio" max="{{$date}}" value="{{$job->fecha_inicio}}" id="fecha_inicio" name="fecha_inicio[]" min="{{$date_min}}" required onchange="changeFechaInicio(this, 'fecha_terminacion_jobs')">
                                        <div class="invalid-feedback">
                                            Desbes seleccionar una fecha de inicio.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="fecha_terminacion_jobs">Fecha terminacion</label>
                                        <input type="date" class="form-control fecha_terminacion_jobs" value="{{$job->fecha_terminacion}}" min="{{$job->fecha_inicio}}" max="{{$date}}" id="fecha_terminacion_jobs" name="fecha_terminacion_jobs[]">
                                    </div>
                                </div>
                            @else
                                <div class="row" id="jobscounter{{$hdv->telefono}}{{$job->id}}">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <label for="empresa{{$hdv->telefono}}{{$job->id}}">Empresa</label>
                                                <input type="text" class="form-control" id="empresa{{$hdv->telefono}}{{$job->id}}" minlength="3" name="empresa[]" required placeholder="Empresa" value="{{$job->empresa}}">
                                                <div class="invalid-feedback">
                                                    La empresa no puede ser vacía y debe tener mínimo 3 carácteres.
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="cargo{{$hdv->telefono}}{{$job->id}}">Cargo</label>
                                                <input type="text" class="form-control" id="cargo{{$hdv->telefono}}{{$job->id}}" minlength="3" name="cargo[]" required placeholder="Cargo" value="{{$job->cargo}}">
                                                <div class="invalid-feedback">
                                                    El cargo no puede ser vacío y debe tener mínimo 3 carácteres.
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="fecha_inicio{{$hdv->telefono}}{{$job->id}}">Fecha Inicio</label>
                                                <input type="date" class="form-control fecha_inicio" onchange="changeFechaInicio(this, 'fecha_terminacion_jobs{{$hdv->telefono}}{{$job->id}}')" max="{{$date}}" id="fecha_inicio{{$hdv->telefono}}{{$job->id}}" name="fecha_inicio[]" required value="{{$job->fecha_inicio}}" min="{{$date_min}}">
                                                <div class="invalid-feedback">
                                                    Desbes seleccionar una fecha de inicio.
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="fecha_terminacion_jobs{{$hdv->telefono}}{{$job->id}}">Fecha terminacion</label>
                                                <input type="date" class="form-control fecha_terminacion_jobs" max="{{$date}}" id="fecha_terminacion_jobs{{$hdv->telefono}}{{$job->id}}" name="fecha_terminacion_jobs[]" min="{{$job->fecha_inicio}}" value="{{$job->fecha_terminacion}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="" class="invisible">Titulo</label>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="eliminateJobsLarvel({{$hdv->telefono}}{{$job->id}})"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-sm btn-success mx-2">Actualizar HDV</button>
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
            document.getElementById('studys_totals').innerHTML = content + contenido;
            studys++;
        }

        function eliminateStudy(id){
            document.getElementById('studys_totals').removeChild(document.getElementById('studynumero'+id));
        }
        function eliminateStudyLarvel(id){
            if(confirm("¿Seguro quieres eliminar este Estudio?")){
                document.getElementById('studys_totals').removeChild(document.getElementById('studynumero'+id));
            }
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

            document.getElementById("totals_jobs").innerHTML = document.getElementById("totals_jobs").innerHTML + contenido;
            jobs++;
        }

        function eliminateJobs(id){
            document.getElementById("totals_jobs").removeChild(document.getElementById("jobscounter"+id));
        }

        function eliminateJobsLarvel(id){
            if(confirm("¿Seguro quieres eliminar este Trabajo?")){
                document.getElementById('studys_totals').removeChild(document.getElementById('studynumero'+id));
            }
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

        function onsubmited(){
            var ced = document.getElementById("cedula").value;
            axios.post('{{route("verifyCedula")}}', {
                cedula: ced,
            })
            .then(function (response) {
                return response.data.res;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection