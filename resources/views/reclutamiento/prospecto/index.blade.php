@extends('/reclutamiento/layout')



@section('content')


<script type="text/javascript" id="js">$(document).ready(function() {
$(document).ready(function() 
    { 
        $("#prospectoTable").tablesorter(); 
    } 
);  </script>


      <div class="jumbotron">
            <div class="container  center-block">
                <h1></h1>


                    	<div class="well  col-md-9 ">
		<h2 align="center">Listado de prospectos</h2>
		<br>
		<div class="col-md-offset-3">
		{!!Form::open(['route'=>'reclutamiento.prospecto.index','method'=>'GET'])!!}

		
		<fieldset class="form-group " >
			<div class="control-label col-sm-3 ">
				{!!Form::label('ID')!!}
			</div>
			<div class="col-sm-4">
				{!!Form::text('id',null,['class'=>'form-control','placeholder'=>''])!!}
			</div>
		</fieldset>


		<fieldset class="form-group" >
			<div class="control-label col-sm-3">
				{!!Form::label('RFC')!!}
			</div>
			<div class="col-sm-4">
				{!!Form::text('rfc',null,['class'=>'form-control','placeholder'=>''])!!}
			</div>
		</fieldset>
		<fieldset class="form-group" >
			<div class="control-label col-sm-3">
				{!!Form::label('Nombre')!!}
			</div>
			<div class="col-sm-4">
				{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>''])!!}
			</div>
		</fieldset>
		<fieldset class="form-group" >
			<div class="control-label col-sm-3">
				{!!Form::label('Apellido Paterno')!!}
			</div>
			<div class="col-sm-4">
				{!!Form::text('apellido_paterno',null,['class'=>'form-control','placeholder'=>''])!!}
			</div>
		</fieldset>
		<fieldset class="form-group" >
			<div class="control-label col-sm-3">
				{!!Form::label('Apellido Materno')!!}
			</div>
			<div class="col-sm-4">
				{!!Form::text('apellido_materno',null,['class'=>'form-control','placeholder'=>''])!!}
			</div>
		</fieldset>
		<fieldset class="form-group" >
			<div class="control-label col-sm-3">
				{!!Form::label('Estatus')!!}
			</div>
			<div class="col-sm-4">
				{!! Form::checkbox('historico',null,true, array('id'=>'historico')) !!}
			
				{!!Form::label('Candidato Historico')!!}
				</br>
				{!! Form::checkbox('pre_candidato',null,true, array('id'=>'pre_candidato')) !!}
				
				{!!Form::label('Pre Candidato')!!}
				</br>
				{!! Form::checkbox('candidato_proceso',null,true, array('id'=>'candidato_proceso'))!!}
				{!!Form::label('Candidato en Proceso')!!}
				</br>
				{!! Form::checkbox('candidato_aprobado',null,true, array('id'=>'candidato_aprobado')) !!}
				{!!Form::label('Candidato Aprobado')!!}
				</br>
				{!! Form::checkbox('candidato_contratado',null,true, array('id'=>'candidato_contratado')) !!}
				{!!Form::label('Candidato Contratado')!!}
				</br>
				{!! Form::checkbox('candidato_rechazado',null,true, array('id'=>'candidato_rechazado')) !!}
				{!!Form::label('Candidato Rechazado')!!}
				</br>
				{!! Form::checkbox('inactivo',null,true, array('id'=>'inactivo')) !!}
				{!!Form::label('Inactivo')!!}




			</div>

		</fieldset>

		<fieldset class="form-group" >
			<div class="col-sm-7">
				{!!Form::submit('Buscar',['class'=>'btn btn-primary btn-lg btn-block' ])!!}

			</div>
		</fieldset>

		{!! Form::close() !!}  
		</div>


	</div>
             
            </div>
        </div><!-- FIN DIV BUSQUEDA WELL-->


<div id="listaProspecto" class="well">
<div id="datoRevisado"></div>
<br>
<b>Total de Elementos de la Tabla:</b>

<fieldset>
	<legend>
		Buscar
	</legend>
	<input name="prospectoFilter" id="prospectoFilter" style="width: 300px" type="text">
	<input id="prospectoClearFilter" type="submit" value="Borrar">
</fieldset>

<table class="tablesorter" id="prospectoTable">
<thead>
<tr>
<th >Opciones</th>
<th>Id</th>
<th>Estatus</th>
<th>RFC</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Reingreso</th>
<th>Delegacion</th>
<th>Administrativo</th>
<th>Fecha de Inicio Laboral</th>
</tr>
</thead>


<tbody>

 </tbody>

</table>

</div><!-- FIN DIV listado-->




    </div><!-- FIN DIV COINTAINER-->
</div><!-- FIN DIV JUMBOTRON-->







@endsection