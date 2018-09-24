@extends('layouts.app')

@section('titulo_pantalla')
	Curso: {{$curso->nombre}}
@endsection

@section('breadcrumb')
	      <li class="breadcrumb-item">
            <a href="{{ url('cursos') }}">Cursos</a>
          </li>
          <li class="breadcrumb-item active">confirmacion de inscripcion </li>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>Precauccion</h4>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ Session::get('alert-success') }}</h4>
    </div>
    @endif

    @if($curso->plazas_disponibles != 0)	
    	<form method="POST" action="{{url('cursos/'.$curso->id.'/inscribirme')}}" accept-charset="UTF-8" >
    	{{ csrf_field() }}
    @else
   		<form method="GET" action="{{url('cursos')}}" accept-charset="UTF-8" >
    @endif
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
				<div class="card-header">
					<i class="icon-note"></i> Confirmacion de Incripcion
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<input type="hidden" name="usuario" value="{{$user->pk}}" placeholde>
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" disabled="disabled" class="form-control" name="nombre" value="{{ old('nombre')? old('nombre') : strtoupper($curso->nombre) }}">
								</div>
								<div class="form-group">
									<label>Lugar Celebracion</label>
									<input type="text" disabled="disabled" class="form-control" name="lugar_celebracion" value="{{ old('lugar_celebracion')? old('lugar_celebracion') : strtoupper($curso->lugar_celebracion) }}">
								</div>
								<div class="form-group">
									<label>Descripccion larga</label>
									<input type="text" disabled="disabled" class="form-control" name="contenido" value="{{ old('contenido')? old('contenido') : strtoupper($curso->contenido) }}">
								</div>
								<div class="form-group">
									<label>Fecha Inicio</label>
									<div class="input-group">
										<span class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
										</span>
										<input type="text" disabled="disabled" name="fecha_inicio" value="{{ old('fecha_inicio')? old('fecha_inicio') : strtoupper($curso->fecha_inicio) }}" class="form-control" id="date">
									</div>
								</div>
								<div class="form-group">
									<label>Fecha Fin</label>
									<div class="input-group">
										<span class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
										</span>
										<input type="text" disabled="disabled" name="fecha_fin" value="{{ old('fecha_fin')? old('fecha_fin') : strtoupper($curso->fecha_fin) }}" class="form-control" id="date">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>hora Incio</label>
									<input type="text" disabled="disabled" class="form-control" name="hora_inicio" value="{{ old('hora_inicio')? old('hora_inicio') : strtoupper($curso->hora_inicio) }}">
								</div>			
								<div class="form-group">
									<label>Hora fin:</label>
									<input type="text" disabled="disabled" class="form-control" name="hora_fin" value="{{ old('hora_fin')? old('hora_fin') : strtoupper($curso->hora_fin) }}">
								</div>
								<!--<div class="form-group">
									<label>Duracion horas</label>
									<input type="text" disabled="disabled" class="form-control" name="duracion_horas" value="{{ old('duracion_horas') }}">
								</div>-->
								<div class="form-group">
									<label>Plazas Totales</label>
									<input type="text" disabled="disabled" class="form-control" name="plazas_total" value="{{ old('plazas_total')? old('plazas_total') : strtoupper($curso->plazas_total) }}">
								</div>
								<!--<div class="form-group">
									<label>Plazas disponibles actualmente:</label>
									<input type="text" disabled="disabled" class="form-control" name="plazas_disponibles" value="{{ old('plazas_disponibles') }}">
								</div>-->
								<div class="form-group">
								    <label>Mayores de:</label>
								    <input type="text" disabled="disabled" class="form-control" name="edades_recomendadas" value="{{ old('edades_recomendadas')? old('edades_recomendadas') : strtoupper($curso->edades_recomendadas) }}">                   
								</div>
								<div class="form-group">
								    <label>Sector:</label>
					    			<input type="text" disabled="disabled" class="form-control" name="edades_recomendadas" value="{{ old('edades_recomendadas')? old('edades_recomendadas') : ($curso->sectores->count()) ? $curso->sectores[0]->nombre : '' }}" placeholde>                   
								</div>
						</div>		
						@if($curso->puestos->count())
							@foreach($curso->puestos as $puesto)
							<p><span>{{ $puesto->nombre }}</span></p>
							@endforeach							
						@endif		
					</div>
				</div>
				<div class="card-footer">
					<div class="float-right mr-3">
						@if($curso->plazas_disponibles != 0)	
							<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Incribirme</button>
						@else
							<button type="submit" class="btn btn-primary" disabled="" name="signup" value="Sign up">Inscripcion Cerrada</button>
						@endif
						
					</div>				
				</div>
			</div>
	    </div>
    </div>
    </form>	

@endsection
