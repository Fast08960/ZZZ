
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hoja de vida</title>
	<style>
		.text-center{
			width: 100%;
			text-align: center;
		}
		.text-primary{
			color: blueviolet;
		}
		.bg-gray{
			color: white;
			background: gray;
		}
		.d-flex{
			display: flex;
			justify-content: space-between;
		}
		.float-left{
			float:left;
		}
		.float-right{
			float:right;
		}
		table {
			width:100%;
			font:normal 13px Arial;
			text-align:center;
			border-collapse:collapse;
		}
		table th {
			font:bold 15px Arial;
		}
		table td {
			padding: 8px;
		}
		.fila_impar {
			background-color:lightgray;
		}
		.fila_par {
			background-color:lightgreen;
		}
	</style>
</head>
<body>
	<div class="text-center">
		<h1 class="text-primary">Hoja de vida de {{$hdv->nombre1}} {{$hdv->nombre2}} {{$hdv->apellido1}} {{$hdv->apellido2}}</h1>
		<img src="{{asset('storage/logos/' . $hdv->image)}}" alt="Imagen de usuario" width="200px">
	</div>
	<div class="text-center bg-gray">
		<h3>Datos personales</h3>
	</div>
	<table>
		<tbody>
			<tr>
				<th><b>Identificación</b></th>
				<td>{{$hdv->cedula ?? 'N/A'}}</td>
			</tr>
			<tr>
				<th><b>Nombres y apellidos</b></th>
				<td>{{$hdv->nombre1}} {{$hdv->nombre2}} {{$hdv->apellido1}} {{$hdv->apellido2}}</td>
			</tr>
			<tr>
				<th><b>Fecha de nacimiento</b></th>
				<td>{{ucfirst($hdv->fecha_nacimiento)}}</td>
			</tr>
			<tr>
				<th><b>Nacionalidad</b></th>
				<td>{{ucfirst($hdv->nacionalidad)}}</td>
			</tr>
			<tr>
				<th><b>RH</b></th>
				<td>{{ucfirst($hdv->rh)}}</td>
			</tr>
			<tr>
				<th><b>Telefono</b></th>
				<td>{{$hdv->telefono}}</td>
			</tr>
			<tr>
				<th><b>Estado civil</b></th>
				<td>{{ucfirst($hdv->estado_civil)}}</td>
			</tr>
			<tr>
				<th><b>Genero</b></th>
				<td>{{ucfirst($hdv->genero)}}</td>
			</tr>
			<tr>
				<th><b>Dirección</b></th>
				<td>{{$hdv->direccion ?? 'N/A'}}</td>
			</tr>
		</tbody>
	</table>
	<div class="text-center bg-gray">
		<h3>Estudios</h3>
	</div>
	<table>
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Entidad</th>
				<th>Fecha culminación</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($hdv->study as $key => $stu)
				<tr>
					<td>{{$stu->titulo}}</td>
					<td>{{$stu->entidad_educativa}}</td>
					<td>{{$stu->fecha_terminacion}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center bg-gray">
		<h3>Trabajos</h3>
	</div>
	<table style="width:100%">
		<thead>
			<tr>
				<th>Empresa</th>
				<th>Cargo</th>
				<th>Fecha Inicio</th>
				<th>Fecha Culminación</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($hdv->jobs as $key => $job)
				<tr>
					<td>{{$job->empresa}}</td>
					<td>{{$job->cargo}}</td>
					<td>{{$job->fecha_inicio}}</td>
					<td>{{$job->fecha_terminacion ?? 'N/A'}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>