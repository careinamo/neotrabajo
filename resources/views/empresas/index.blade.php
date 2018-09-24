@extends('layouts.app')

@section('titulo_pantalla')
	Curso registrados
@endsection

@section('breadcrumb')
	      <li class="breadcrumb-item">
            <a href="#">Empresas</a>
          </li>
@endsection

@section('content')
<style>
	.tr-item:hover .botones-backend{ 
		visibility: visible;
	}
	.botones-backend{
		visibility: hidden;
	}
</style>
@if($empresas->count())
	<div class="row">	
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<p><span>ORDENAR:</span> <span> <i class="fa fa-calendar"></i> Fecha:</span></p>
				</div>
			</div>
			<div class="card card-accent-secondary card-item">
				<div class="card-body">
					<table class="table table-responsive-sm table-hover table-outline mb-0">
						<thead class="thead-light">
							<tr>
								<th>Empresas</th>
							</tr>
						</thead>
						<tbody>
						@foreach($empresas as $empresa)
							<tr class="tr-item">
								<td style="text-transform: uppercase;">
									<h6>
										{{ $empresa->nombre_comercial }}									
										<span class="botones-backend">
											<a href="{{ url('empresas/'.$empresa->id.'/edit') }}" class="card-header-action btn-settings">
												<i class="icon-settings"></i>
											</a>
											<a href="{{ url('empresas/'.$empresa->id) }}" class="card-header-action btn-magnifying-glass">
												<i class="icon-list"></i>
											</a>
											<a href="#" class="card-header-action btn-close">
												<i class="icon-close"></i>
											</a>
										</span>
									</h6>
									<p>{{ $empresa->denominacion_social }}</p>
								</td>
							</tr>
						@endforeach	
						</tbody>
					</table>
				</div>
			</div>


			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">1</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">2</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">3</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
		</div>		
	</div>
@else	

@endif	
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