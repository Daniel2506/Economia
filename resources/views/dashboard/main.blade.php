@extends('layout.layout')

@section('title') Simulador @stop

@section('content')
	<section class="content">
		<div class="box box-body box-danger" id="simulador">
			{!! Form::open(['id' => 'cliente-form', 'data-toggle' => 'validator']) !!}
				<div class="row">
					<label class="control-label col-sm-1"> Nombre: </label>
					<div class="form-group col-sm-5">
						<input type="text" name="nombre_cliente" id="nombre_cliente" class="input-sm form-control input-toupper" placeholder="Nombre del cliente" required>
					</div>
					<label class="control-label col-sm-1">Cedula</label>
					<div class="form-group col-sm-5">
						<input type="text" name="cedula_cliente" id="cedula_cliente" class="form-control input-sm" placeholder="Cedula cliente" required>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-sm-1">Monto</label>
					<div class="form-group col-sm-3">
						<input type="text" class="form-control input-sm" name="monto_cliente" id="monto_cliente" data-currency>
					</div>
					<label class="control-label col-sm-1">Plazo</label>
					<div class="form-group col-sm-1">
						<input type="number" name="plazo_cliente" id="plazo_cliente"  value="5" class="form-control input-sm" min="5" max="10">
					</div>

					<label class="control-label col-sm-1">Periodo</label>
					<div class="form-group col-sm-5">
						<select id="periodo_cliente" class="form-control col-sm-2">
							<option>Mensual</option>
							<option>Bimestral</option>
							<option>Trimestral</option>
							<option>Semestral</option>
						</select>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<div class="box box-solid">
						<div class="box-header whit-border">
							<h3 class="box-title">Tasa de interes</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<label class="control-label col-sm-4">Efectuvo Anual %</label>
								<div class="form-group col-sm-8">
									<input type="number" name="ea_cliente" id="ea_cliente" placeholder="EA %" min="1" class="form-control input-sm change-calcule">
								</div>
							</div>
							<div class="row">
								<label class="control-label col-sm-4">Nominal Anual %</label>
								<div class="form-group col-sm-8">
									<input type="number" name="nominal_anual_cliente" placeholder="Nominal Anual %" min="1" class="form-control input-sm change-calcule">
								</div>
							</div>
							<div class="row">
								<label class="control-label col-sm-4">Interes Periodico %</label>
								<div class="form-group col-sm-8">
									<input type="number" name="ip_cliente" class="form-control input-sm change-calcule" min="1" placeholder="Interes Periodico %">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<div class="box box-solid">
						<div class="box-header whit-border">
							<h3 class="box-title">Periodo de gracia propiamente dicho</h3>
						</div>
						<div class="box-body">
							<div class="row">
									<div class="form-group col-sm-7">
										<select id="periodo_gracia_cliente" class="form-control">
											<option>1 Año</option>
											<option>2 Años</option>
											<option>3 Años</option>
										</select>
									</div>
									<div class="form-group col-sm-2">
										<input type="checkbox" name="check_periodo_gracia" id="check_periodo_gracia">
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-12">
					<div class="row">
						<div class="col-sm-2 col-md-offset-4">
							<a href="#" class="btn btn-default btn-sm btn-block">Regresar</a>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-sm btn-block"> Enviar</button>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
    </section>
@stop
