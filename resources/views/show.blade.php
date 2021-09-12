@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center mt-5">
                <h3 class="text-success">Hojas De Vida De {{$hdv->nombre1}} {{$hdv->nombre2}} {{$hdv->apellido1}} {{$hdv->apellido2}}</h3>
            </div>
            <div class="col-sm-12 text-right">
                <a href="{{route('edit', $hdv->id)}}"><button type="button" class="btn btn-sm btn-warning px-3">Editar</button></a>
                <a href="{{route('index')}}"><button type="button" class="btn btn-sm btn-secondary px-3">Volver</button></a>
            </div>
            <div class="col-sm-12">
                @include('flash::message')
            </div>
            <div class="col-sm-12 mt-4">
                <h4 class="text-success">Datos básicos</h4>
            </div>
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" colspan="2">Primer Nombre</th>
                            <td>{{$hdv->nombre1}}</td>
                            <th scope="row" colspan="2">Segundo Nombre</th>
                            <td>{{$hdv->nombre2 ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="2">Primer Apellido</th>
                            <td>{{$hdv->apellido1}}</td>
                            <th scope="row" colspan="2">Segundo Apellido</th>
                            <td>{{$hdv->apellido2 ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Telefono</th>
                            <td>{{$hdv->telefono}}</td>
                            <th scope="row">Direccion</th>
                            <td>{{$hdv->direccion ?? 'N/A'}}</td>
                            <th scope="row">Correo</th>
                            <td>{{$hdv->correo ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Genero</th>
                            <td>{{ucfirst($hdv->genero)}}</td>
                            <th scope="row">Nacionalidad</th>
                            <td>{{ucfirst($hdv->nacionalidad)}}</td>
                            <th scope="row">Estado Civil</th>
                            <td>{{ucfirst($hdv->estado_civil)}}</td>
                        </tr>
                        <tr>
                            <th scope="row">RH</th>
                            <td>{{ucfirst($hdv->rh)}}</td>
                            <th scope="row">Fecha de Nacimiento</th>
                            <td>{{ucfirst($hdv->fecha_nacimiento)}}</td>
                        </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-sm-12 mt-4">
                <h4 class="text-success">Estudios</h4>
            </div>
            <div class="col-sm12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Entidad educativa</th>
                            <th scope="col">Fecha de terminación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hdv->study as $key => $stu)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$stu->titulo}}</td>
                                <td>{{$stu->entidad_educativa}}</td>
                                <td>{{$stu->fecha_terminacion}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="col-sm-12 mt-4">
                <h4 class="text-success">Trabajos</h4>
            </div>
            <div class="col-sm12 mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Terminación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hdv->jobs as $key => $job)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$job->empresa}}</td>
                                <td>{{$job->cargo}}</td>
                                <td>{{$job->fecha_inicio}}</td>
                                <td>{{$job->fecha_terminacion ?? 'N/A'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection