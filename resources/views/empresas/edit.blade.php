@extends('layouts.app')

@section('titulo_pantalla')
	Curso: {{$curso->nombre}}
@endsection

@section('breadcrumb')
	      <li class="breadcrumb-item">
            <a href="#">Cursos</a>
          </li>
          <li class="breadcrumb-item active">Editar: {{$curso->nombre}} </li>
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

    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
				<div class="card-header">
					<i class="icon-note"></i> Editar Curso de formación
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form method="PUT" action="{{route('cursos.update', $curso->id) }}" accept-charset="UTF-8" class="form-group">
								{{ csrf_field() }}
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" name="nombre" value="{{ old('nombre')? old('nombre') : strtoupper($curso->nombre) }}" placeholder="Nombre del curso">
								</div>
								<div class="form-group">
									<label>Lugar Celebracion</label>
									<input type="text" class="form-control" name="lugar_celebracion" value="{{ old('lugar_celebracion')? old('lugar_celebracion') : strtoupper($curso->lugar_celebracion) }}" placeholder="Lugar de celebracion">
								</div>
								<div class="form-group">
									<label>Descripccion larga</label>
									<input type="text" class="form-control" name="contenido" value="{{ old('contenido')? old('contenido') : strtoupper($curso->contenido) }}" placeholder="Descripccion larga">
								</div>
								<div class="form-group">
									<label>Fecha Inicio</label>
									<div class="input-group">
										<span class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
										</span>
										<input type="text" name="fecha_inicio" value="{{ old('fecha_inicio')? old('fecha_inicio') : strtoupper($curso->fecha_inicio) }}" class="form-control" id="date">
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
										<input type="text" name="fecha_fin" value="{{ old('fecha_fin')? old('fecha_fin') : strtoupper($curso->fecha_fin) }}" class="form-control" id="date">
									</div>
								</div>
								<div class="form-group">
									<span>Pertenece Fie ?</span>
									<input  type="checkbox" name="pertenece_fie" value="true" class="checkbox_simple" {{ (old('pertenece_fie'))? 'checked' : '' }}>
								</div>		
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>hora Incio</label>
									<input type="text" class="form-control" name="hora_inicio" value="{{ old('hora_inicio')? old('hora_inicio') : strtoupper($curso->hora_inicio) }}" placeholder="Hora inicio">
								</div>			
								<div class="form-group">
									<label>Hora fin:</label>
									<input type="text" class="form-control" name="hora_fin" value="{{ old('hora_fin')? old('hora_fin') : strtoupper($curso->hora_fin) }}" placeholder="Hora inicio">
								</div>
								<!--<div class="form-group">
									<label>Duracion horas</label>
									<input type="text" class="form-control" name="duracion_horas" value="{{ old('duracion_horas') }}" placeholder="Nombre del curso">
								</div>-->
								<div class="form-group">
									<label>Plazas Totales</label>
									<input type="text" class="form-control" name="plazas_total" value="{{ old('plazas_total')? old('plazas_total') : strtoupper($curso->plazas_total) }}" placeholder="Nombre del curso">
								</div>
								<!--<div class="form-group">
									<label>Plazas disponibles actualmente:</label>
									<input type="text" class="form-control" name="plazas_disponibles" value="{{ old('plazas_disponibles') }}" placeholder="Nombre del curso">
								</div>-->
								<div class="form-group">
								    <label>Mayores de:</label>
								    <input type="text" class="form-control" name="edades_recomendadas" value="{{ old('edades_recomendadas')? old('edades_recomendadas') : strtoupper($curso->edades_recomendadas) }}" placeholder="Nombre del curso">                   
								</div>		
						</div>		
						<div class="col-md-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Guardar</button>
							</div>
						</div>
						</form>			
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>
@endsection

@section('script_javascript')
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#fecha_inicio').datepicker({format: 'yyyy-mm-dd',
	            autoclose: true,
	            todayBtn: true,
	            language:"es"
	        });

	        $('#fecha_fin').datepicker({format: 'yyyy-mm-dd',
	            autoclose: true,
	            todayBtn: true,
	            language:"es"
	        });

	        $('#hora_inicio').datetimepicker({
	          format: 'HH:mm:ss',
	          //locale: 'es'
	        });

	        $('#hora_fin').datetimepicker({
	          format: 'HH:mm:ss',
	          //locale: 'es'
	        });
	        $('input.checkbox_simple').iCheck({
	          checkboxClass: 'icheckbox_square-blue',
	          radioClass: 'iradio_square-blue',
	          increaseArea: '20%' // optional
	        });
	    });
	</script>
@endsection