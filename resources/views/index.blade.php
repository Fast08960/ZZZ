@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center mt-5">
                <h3 class="text-success">Hojas De Vida Registradas</h3>
            </div>
            <div class="col-sm-12 text-right">
                <a href="{{route('create')}}"><button type="button" class="btn btn-sm btn-info px-3 text-white">Crear HDV</button></a>
            </div>
            <div class="col-sm-12 mt-4">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $hdv)
                            <tr>
                                <th scope="row">{{$hdv->cedula}}</th>
                                <td>{{$hdv->nombre1}} {{$hdv->nombre2}}</td>
                                <td>{{$hdv->apellido1}} {{$hdv->apellido2}}</td>
                                <td>{{$hdv->correo}}</td>
                                <td>{{$hdv->telefono}}</td>
                                <td class="text-center">
                                    <a href="{{route('show', $hdv->id)}}"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button></a>
                                    <a href="{{route('edit', $hdv->id)}}"><button type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></a>
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection