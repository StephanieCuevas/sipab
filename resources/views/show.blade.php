@extends('/layout')

@section('content')
      <div class="jumbotron">
            <div class="container">
                <h1></h1>


                    	<div class="well">
		<h1>Informacion de elemento policial</h1>
		

		
			<div class="table-responsive">
		
		
		<table class="table table-bordered">
			
			<thead>
				
				
				<th>ID</th>
				<th>ESTATUS</th>
				<th>RFC</th>
				<th>NOMBRE</th>
				<th>APELLIDO PATERNO</th>
				<th>APELLIDO MATERNO</th>
				<th>REINGRESO</th>
				<th>DELEGACIÓN</th>
				<th>ADMIINISTRATIVO</th>
				<th>FECHA DE INICIO LABORAL</th>

				
			</thead>
			@foreach($elemento as $e)





			<tbody>
				<tr>
					<td>{{ $e->id_elemento_policial }}</td>
					<td>{{ $e->nombre }}</td>
					<td>{{ $e->apellido_paterno }}</td>
					<td>{{ $e->apellido_materno }}</td>
					
					<td>{{ $e->estado_civil }}</td>

					
					<td>{{ $e->calle.", ".$e->n_ext.", Col.".$e->colonia.", ".$e->municipio.", ".$e->entidad }}</td>


//IF $E->STATUS= CANDIDATO CONTRATADO


					<td>
					{!!Form::open(['route'=>'contrato.store','method'=>'POST'])!!}
					{!! Form::hidden('id', $e->id_elemento_policial, array('id' => 'id')) !!}
		
						<fieldset class="form-group" >
							
								{!!Form::label('Fecha Contrato')!!}
							
								{!!Form::date('fecha');!!}
							
						</fieldset>


						<fieldset class="form-group" >
							<div class="col-sm-5">
								{!!Form::submit('Generar',['class'=>'btn btn-primary' ])!!}

							</div>
						</fieldset>

					{!! Form::close() !!}  
					</td>





					<td>
						{!!Form::open(['route'=>'descargarContrato','method'=>'POST'])!!}
						{!! Form::hidden('id', $e->id_elemento_policial, array('id' => 'id')) !!}
						{!!Form::submit('Descargar',['class'=>'btn btn-primary' ])!!}
						{!! Form::close() !!}  


					</td>

				

				</tr>
			</tbody>
			@endforeach
		</table>

	

	</div>



	</div>
             
            </div>
        </div>
        
    </div>
</div>

@endsection