@extends('layouts.app')

@section('titulo_pantalla')
	Nueva Oferta
@endsection

@section('breadcrumb')
	      <li class="breadcrumb-item">
            <a href="{{ url('cursos') }}">Ofertas</a>
          </li>
          <li class="breadcrumb-item active">Nueva</li>
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
						<i class="icon-note"></i> Nuevo Curso de formación
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">								
								{{ csrf_field() }}
								<div class="form-group">
									<label>Descripccion del Puesto:</label>
									<input type="text" disabled="" class="form-control" name="descripccion" value="{{ $oferta->descripccion }}">
								</div>
								<div class="form-group">
									<label>Descripccion Larga:</label>
									<input type="text" disabled="" class="form-control" name="descripccion_larga" value="{{ $oferta->descripccion_larga }}">
								</div>
								<div class="form-group">
									<label>Numero de Puestos:</label>
									<input type="text" disabled="" class="form-control" name="numero_puestos" value="{{ $oferta->numero_puestos }}">
								</div>
								<div class="form-group">
									<label>Tareas a desenvolver:</label>
									<input type="text" disabled="" class="form-control" name="tareas_desenvolver" value="{{ $oferta->tareas_desenvolver }}">
								</div>								
								<div class="form-group">
									<label>Fecha Limite:</label>
									<div class="input-group">
										<span class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
										</span>
										<input type="text" disabled="" name="plazo_presentación" id="fecha_limite"  value="{{ $oferta->plazo_presentación }}" class="form-control">
									</div>
								</div>
								<div class="form-group">
								    <label for="tipo_contrato">Tipo de contrato:</label>
								    <select disabled="" id="tipo_contrato" class="form-control" name="tipo_contrato">
								    	<option  value="0" selected="selected">Seleccione</option>
								    	@foreach($tiposContrato as $tipoContrato)
											<option value="{{ $tipoContrato->id }}"  {{ ($oferta->tipoContrato->id == $tipoContrato->id ) ? 'selected' : '' }}>{{ $tipoContrato->descripcion }}</option>
								    	@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Fecha Incorporacion:</label>
									<div class="input-group">
										<span class="input-group-prepend">
										<span class="input-group-text">
											<i class="fa fa-calendar"></i>
										</span>
										</span>
										<input type="text" disabled="" name="fecha_incorporacion" id="fecha_incorporacion"  value="{{ $oferta->fecha_incorporacion }}" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label>Tiempo de contrato:</label>
									<input type="text" disabled="" class="form-control" name="duracion_contratos" value="{{ $oferta->duracion_contratos }}">
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Localidad:</label>
									<input type="text" disabled="" class="form-control" name="localidad" value="{{ $oferta->localidad }}">
								</div>
								<div class="form-group">
									<label>Horario de entrada:</label>
									<input type="text" disabled="" class="form-control" id="horario_incio" name="horario_incio" value="{{ $oferta->horario_incio }}">
								</div>	
								<div class="form-group">
									<label>Horario de salida:</label>
									<input type="text" disabled="" class="form-control" id="horario_fin" name="horario_fin" value="{{ $oferta->horario_fin }}">
								</div>	
								<div class="form-group">
									<label>Salario:</label>
									<input type="text" disabled="" class="form-control" id="salario" name="salario" value="{{ $oferta->salario }}">
								</div>
								<div class="form-group">
									<label>Formacion Necesaria:</label>
									<input type="text" disabled="" class="form-control" id="formación_requisito" name="formación_requisito" value="{{ $oferta->formación_requisito }}">
								</div>		
								<div class="form-group">
									<label>Experiencia Necesaria:</label>
									<input type="text" disabled="" class="form-control" id="experiencia_requisito" name="experiencia_requisito" value="{{ $oferta->experiencia_requisito }}">
								</div>
								<div class="form-group">
									<label>Otros requisitos:</label>
									<input type="text" disabled="" class="form-control" id="otros_requisitos" name="otros_requisitos" value="{{ $oferta->otros_requisitos }}">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
		
					</div>
				</div>
	    </div>
    </div>
</div>
@endsection

@section('script_javascript')
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#fecha_limite').datepicker({format: 'yyyy-mm-dd',
	            autoclose: true,
	            todayBtn: true,
	            language:"es"
	        });

	        $('#fecha_incorporacion').datepicker({format: 'yyyy-mm-dd',
	            autoclose: true,
	            todayBtn: true,
	            language:"es"
	        });

	        $('#horario_incio').datetimepicker({
	          format: 'HH:mm:ss',
	          //locale: 'es'
	        });

	        $('#horario_fin').datetimepicker({
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