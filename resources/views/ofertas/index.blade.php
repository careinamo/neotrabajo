@extends('layouts.app')

@section('titulo_pantalla')
	Curso registrados
@endsection

@section('breadcrumb')
	      <li class="breadcrumb-item">
            <a href="{{ url('cursos') }}">Ofertas</a>
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
	.oferta-validada{
		/*background-color: green;*/
	}
	.oferta-no-validada{
		background-color: red;
	}
</style>
<div class="row">	
	<div class=" col-lg-4 col-md-12">
		<form action="/ofertas/busquedaAvanzada" method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-body">
					<div class="btn-group">
						<a class="btn btn-block btn-outline-primary"" href="{{ url('ofertas/create') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nuevo</a>
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
<!-- 						<div class="col-md-2 col-lg-12">
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
						</div> -->
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
	@if($ofertas->count())
	<div class="col-lg-8 col-md-12">
		<div class="card">
			<div class="card-body">
				<p><span>ORDENAR:</span> <span> <i class="fa fa-calendar"></i> Fecha</span></p>
			</div>
		</div>
		@foreach($ofertas as $oferta)
		<div class="card card-accent-secondary card-item {{	($oferta->validada)	? 'border-success' : 'border-danger' }}">
			<div class="card-body">
				<h4> {{ $oferta->descripcion }}
					<span style="text-transform: uppercase;"></span>
					<span class="botones-backend">
						<a href="{{ url('ofertas/'.$oferta->id.'/edit') }}" class="card-header-action btn-settings">
							<i class="icon-settings"></i>
						</a>
						<a href="{{ url('ofertas/'.$oferta->id) }}" class="card-header-action btn-magnifying-glass">
							<i class="icon-list"></i>
						</a>
						@if(!$oferta->validada)
							<a  href="{{ url('ofertas/'.$oferta->id.'/validacion')}}" class="card-header-action btn-star">
								<i class="icon-star"></i>
							</a>
						@endif
						<a  class="card-header-action btn-close">
							<i class="icon-close"></i>
						</a>
					</span>
				</h4>
				<p>{{ $oferta->tipoContrato->descripcion }}</p>
				<p>{{ $oferta->localidad }} / fecha limite: {{ $oferta->plazo_presentación }}</p>			
				<p>{{ $oferta->descripcion_larga }}</p>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div class="float-right mr-3">
							@if(true)	
								<span>Apuntate Aqui</span>							
								<a href="{{ url('ofertas/'.$oferta->id.'/inscripcion')}}">Inscribirme</a>
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