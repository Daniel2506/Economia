@extends('layout.layout')

@section('title') Simulador @stop

@section('content')
	<section class="content">
		<div class="box box-body box-danger">
			<div class="row">
				<label class="control-label col-sm-1"> Nombre: </label>
				<div class="form-group col-sm-4">
					<input type="text" name="nombre_cliente" class="input-sm form-control" required>
				</div>
				<label class="control-label col-sm-1">Cedula</label>
				<div class="form-group col-sm-3">
					<input type="text" name="cedula_cliente" class="form-control input-sm" required>
				</div>
			</div>
			<div class="row">
				<label class="control-label col-sm-1">Monto</label>
				<div class="form-group col-sm-2">
					<input type="text" class="form-control input-sm" name="monto_cliente" data-currency>
				</div>
				<label class="control-label col-sm-1">Plazo</label>
				<div class="form-group col-sm-1">
					<input type="number" name="plazo_cliente"  class="form-control input-sm" min="5" max="10">
				</div>

				<label class="control-label col-sm-1">Periodo</label>
				<div class="form-group col-sm-3">
					<select class="form-control col-sm-2">
						<option>Mensual</option>
						<option>Bimestral</option>
						<option>Trimestral</option>
						<option>Semestral</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12" align="center">
				<div class="box box-solid">
					<div class="box-header whit-border">
						<h3 class="box-title">Tasa de interes</h3>
					</div>
					<div class="box-body">
						<label class="control-label col-sm-2">Input1</label>
						<div class="form-group col-sm-10">
							<input type="" name="" class="form-control input-sm">
						</div>
						<label class="control-label col-sm-2">Input2</label>
						<div class="form-group col-sm-10">
							<input type="" name="" class="form-control input-sm">
						</div>
						<label class="control-label col-sm-2">Input3</label>
						<div class="form-group col-sm-10">
							<input type="" name="" class="form-control input-sm">
						</div>
					</div>
				</div>
			</div>
			<div class="row">HOLA</div>
			<div class="row">
				<div class="col-sm-2 col-md-offset-4">
					<a href="#" class="btn btn-default btn-sm btn-block">Regresar</a>
				</div>
				<div class="col-sm-2">
					<a href="#" class="btn btn-primary btn-sm btn-block">Enviar</a>
				</div>
			</div>
		</div>
    </section>
@stop
