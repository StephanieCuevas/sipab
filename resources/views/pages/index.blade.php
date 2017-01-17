@extends('layout')

@section('content')
      <div class="jumbotron">
            <div class="container  center-block">
                <h1></h1>


                    	<div class="well col-sm-8  center-block">
		<h1>Buscar elemento</h1>
		{!!Form::open(['route'=>'buscarElemento','method'=>'POST'])!!}

		
		<fieldset class="form-group" >
			<div class="control-label col-sm-3">
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
			<div class="col-sm-5">
			
			
			</br>
			
			</br>
			
			</br>
			
			</br>
			
			</br>
			
			</br>
			
			</div>
		</fieldset>

		<fieldset class="form-group" >
			<div class="col-sm-5">
				{!!Form::submit('Buscar',['class'=>'btn btn-primary' ])!!}

			</div>
		</fieldset>

		{!! Form::close() !!}  

	</div>
             
            </div>
        </div>
        
    </div>
</div>

@endsection