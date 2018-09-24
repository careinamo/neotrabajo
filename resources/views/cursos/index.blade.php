@extends('layouts.app')

@section('titulo_pantalla')
	Curso registrados
@endsection

@section('breadcrumb')
	      <li class="breadcrumb-item">
            <a href="{{ url('cursos') }}">Cursos</a>
          </li>
@endsection

@section('content')
<style>
	.card-item:hover .botones-backend{ 
		visibility: visible;
	}	
	.card-item:hover{ 
		background: #e9f5fb;
	}		
	.botones-backend{
		visibility: hidden;
	}
</style>
<div class="row">	
	<div class=" col-lg-4 col-md-12">
		<form action="/cursos/busquedaAvanzada" method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-body">
					<div class="btn-group">
						<a class="btn btn-block btn-outline-primary"" href="{{ url('cursos/create') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nuevo</a>
					</div>
				</div>
			</div>
			<div class="card card-accent-primary">
				<div class="card-header">
					<b>FILTROS</b>	
				</div>
				<div class="card-body">					

					<div class="form-group row">
						<div class="col-md-2 col-lg-12">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" value="{{ old('nombre') }}" name="nombre">
							</div>						
						</div>
						<div class="col-md-2 col-lg-12">	
							<div class="form-group">
								<label>Ubicacion</label>
								<input type="text" class="form-control" value="{{ old('ubicacion') }}" name="ubicacion">
							</div>	
						</div>
						<div class="col-md-2 col-lg-12">
							<div class="form-group">
								<label>Plazas total:</label>
								<input type="text" class="form-control" value="{{ old('plazas') }}" name="plazas" placeholder="Mayor a ..">
							</div>					
						</div>
						<div class="col-md-2 col-lg-12">
							<div class="form-group">
								<label>Edad Minima:</label>
								<input type="text" class="form-control" value="{{ old('fecha_fin') }}" name="edades_recomendadas" placeholder="Mayor a ..">
							</div>					
						</div>
						<div class="col-md-2 col-lg-12">
							<div class="form-group">
								<label>Dispnobilidad:</label> 
								<input type="checkbox" name="plazas_disponibles" value="{{ old('plazas_disponibles') }}" class="checkbox_simple">
							</div>	
						</div>
					</div>					
				</div>
				<div class="card-footer">
					<div class="float-right mr-3">
						<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Limpiar</button>
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-filter"></i>Filtrar</button>
					</div>				
				</div>
			</div>
		</form>
	</div>	
	@if($cursos->count())
	<div class="col-lg-8 col-md-12">
		<div class="card">
			<div class="card-body">
				<p><span>ORDENAR:</span> <span> <i class="fa fa-calendar"></i> Fecha</span> / <span> <i class="fa fa-check"></i> Disponibilidad</span> / <span> <i class="fa fa-calendar"></i> Sector</span></p>
			</div>
		</div>
		@foreach($cursos as $curso)
		<div class="card card-accent-secondary card-item">
			<div class="card-body">
				<div class="float-right mr-3" data-toggle="buttons">
					<div class="btn-group" role="group" aria-label="Basic example">
						@if($curso->plazas_disponibles != 0)	
							<button type="button" class="btn btn-outline-success" style="color:#027a2b;" disabled="">Cupos: {{ $curso->plazas_disponibles }} / {{ $curso->plazas_total }} </button>								
						@else
							<button type="button" class="btn btn-outline-secondary" style="color:#000;" disabled="">Cupos: {{ $curso->plazas_disponibles }} / {{ $curso->plazas_total }} </button>
						@endif
					</div>
				</div>
				<h4>
					<span style="text-transform: uppercase;">{{ $curso->nombre }}</span>
					<span class="botones-backend">
						<a href="{{ url('cursos/'.$curso->id.'/edit') }}" class="card-header-action btn-settings">
							<i class="icon-settings"></i>
						</a>
						<a href="{{ url('cursos/'.$curso->id) }}" class="card-header-action btn-magnifying-glass">
							<i class="icon-list"></i>
						</a>
						<a  class="card-header-action btn-close">
							<i class="icon-close"></i>
						</a>
					</span>
				</h4>
				<p>{{ $curso->lugar_celebracion }} - {{ $curso->duracion_horas }} Horas - Recomendado para mayores de: {{ $curso->edades_recomendadas }} Años</p>
				<p>Fecha Inicio: {{ $curso->fecha_inicio }} / Fecha fin: {{ $curso->fecha_fin }}</p>			
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex
				ea commodo consequat.
				<hr>
				<div class="row">
					<div class="col-md-8">
						<p>
							@if($curso->sectores->count())
								<b>Dedicado a:</b>
								@foreach($curso->sectores as $sector)
									<span value="{{ $sector->id }}" >{{ $sector->nombre }}</span>
								@endforeach								
							@endif
						</p>
					</div>
					<div class="col-md-4">
						<div class="float-right mr-3">

							@if($curso->plazas_disponibles != 0)	
								<span>Apuntate Aqui</span>							
								<a href="{{ url('cursos/'.$curso->id.'/inscripcion')}}">Inscribirme</a>
							@else
								<span>Inscripcion cerrada.</span>
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
		<li class="page-item disabled">
		<a class="page-link"  tabindex="-1">Previous</a>
		</li>
		<li class="page-item">
		<a class="page-link" >1</a>
		</li>
		<li class="page-item">
		<a class="page-link" >2</a>
		</li>
		<li class="page-item">
		<a class="page-link" >3</a>
		</li>
		<li class="page-item">
		<a class="page-link" >Next</a>
		</li>
		</ul>
		</nav>
	</div>
	@else	
	<div class="col-md-12 col-lg-8">
		<p style="text-align:center;"><b>No se encontraron coincidencias</b></p>
	</div>		
	@endif	
	
	<!-- /.col-->
</div>
<!-- /.row-->
@endsection

@section('script_javascript')
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#fecha_inicio').datepicker({format: 'dd/mm/yyyy',
	            autoclose: true,
	            todayBtn: true,
	            language:"es"
	        });

	        $('#fecha_fin').datepicker({format: 'dd/mm/yyyy',
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