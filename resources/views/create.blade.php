@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 text-center">
                <h2 class="text-success">Crear Hoja de vida</h2>
            </div>
            <form class="col-sm-12 needs-validation" novalidate method="POST" action="{{route('store')}}">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-success">Datos básicos</h4>
                        <hr>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cedula">Cedula</label>
                        <input type="number" class="form-control" id="cedula" name="cedula" required placeholder="Cedula" minlength="5">
                        <div class="invalid-feedback">
                            La cedula no puede ser vacia y debe tenr minimo 5 digitos.
                          </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nombre1">Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre1" required placeholder="Nombre" minlength="3">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nombre2">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido" required minlength="3">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="telefono">Segundo Apellido</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required minlength="7" minlength="10">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Telefono" required minlength="3">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="genero_mujer">Genero</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="genero" id="genero_mujer" value="mujer">
                            <label class="form-check-label" for="genero_mujer">
                              Mujer
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="genero" id="genero_hombre" value="hombre">
                            <label class="form-check-label" for="genero_hombre">
                              Hombre
                            </label>
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nacionalidad_co">Nacionalidad</label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="nacionalidad" id="nacionalidad_co" value="colombiano">
                            <label class="form-check-label" for="nacionalidad_co">
                              Colombiano
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="nacionalidad" id="nacionalidad_ex" value="extranjero">
                            <label class="form-check-label" for="nacionalidad_ex">
                              Extranjero
                            </label>
                        </div>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="estado_civil">Estado Civil</label>
                        <select class="custom-select" id="estado_civil" name="estado_civil">
                            <option selected>Seleccione</option>
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="separado">Separado</option>
                            <option value="viudo">Viudo</option>
                          </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="rh">RH</label>
                        <select class="custom-select" id="rh" name="rh">
                            <option selected>Seleccione</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                          </select>
                      </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12">
                        <h4 class="text-success">Estudios <button type="button" class="btn btn-sm btn-info ml-4 text-white"><i class="fas fa-plus"></i></button></h4>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="titulo">Titulo</label>
                                <input type="number" class="form-control" id="titulo" name="titulo[]" required placeholder="Titulo">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="entidad_educativa">Entidad educativa</label>
                                <input type="number" class="form-control" id="entidad_educativa" name="entidad_educativa[]" required placeholder="Entidad" >
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="fecha_terminacion">Fecha terminacion</label>
                                <input type="date" class="form-control" id="fecha_terminacion" name="fecha_terminacion[]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="titulo1">Titulo</label>
                                        <input type="number" class="form-control" id="titulo1" name="titulo[]" required placeholder="Titulo">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="entidad_educativa1">Entidad educativa</label>
                                        <input type="number" class="form-control" id="entidad_educativa1" name="entidad_educativa[]" required placeholder="Entidad" >
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_terminacion1">Fecha terminacion</label>
                                        <input type="date" class="form-control" id="fecha_terminacion1" name="fecha_terminacion[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label for="" class="invisible">Titulo</label>
                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12">
                        <h4 class="text-success">Trabajos <button type="button" class="btn btn-sm btn-info ml-4 text-white"><i class="fas fa-plus"></i></button></h4>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="empresa">Empresa</label>
                                <input type="number" class="form-control" id="empresa" name="empresa[]" required placeholder="Empresa">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="cargo">Cargo</label>
                                <input type="number" class="form-control" id="cargo" name="cargo[]" required placeholder="Cargo" >
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio[]">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="fecha_terminacion_jobs">Fecha terminacion</label>
                                <input type="date" class="form-control" id="fecha_terminacion_jobs" name="fecha_terminacion_jobs[]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="empresa1">Empresa</label>
                                        <input type="number" class="form-control" id="empresa1" name="empresa[]" required placeholder="Empresa">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="cargo1">Cargo</label>
                                        <input type="number" class="form-control" id="cargo1" name="cargo[]" required placeholder="Cargo" >
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="fecha_inicio1">Fecha Inicio</label>
                                        <input type="date" class="form-control" id="fecha_inicio1" name="fecha_inicio[]">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="fecha_terminacion_jobs1">Fecha terminacion</label>
                                        <input type="date" class="form-control" id="fecha_terminacion_jobs1" name="fecha_terminacion_jobs[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label for="" class="invisible">Titulo</label>
                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
    </script>
@endsection