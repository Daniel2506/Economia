@extends('layout.layout')

@section('title') Simulador @stop

@section('content')
	<section class="content">
		<div class="box box-body box-danger jaja">
			<div id="simulador">
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
							<select id="periodo_cliente" name="periodo_cliente" class="form-control col-sm-2">
								<option value="12">Mensual</option>
								<option value="6">Bimestral</option>
								<option value="4">Trimestral</option>
								<option value="2"" >Semestral</option>
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
										<input type="text" name="ea_cliente" id="ea_cliente" placeholder="EA %" min="1" class="form-control input-sm">
									</div>
								</div>
								<div class="row">
									<label class="control-label col-sm-4">Nominal Anual %</label>
									<div class="form-group col-sm-8">
										<input type="text" name="nominal_anual_cliente" id="nominal_anual_cliente" placeholder="Nominal Anual %" min="1" class="form-control input-sm">
									</div>
								</div>
								<div class="row">
									<label class="control-label col-sm-4">Interes Periodico %</label>
									<div class="form-group col-sm-8">
										<input type="text" name="ip_cliente" id="ip_cliente" class="form-control input-sm" min="1" placeholder="Interes Periodico %">
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
											<select id="periodo_gracia_cliente" name="periodo_gracia_cliente" class="form-control">
												<option value="1">1 Año</option>
												<option value="2">2 Años</option>
												<option value="3">3 Años</option>
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
		</div>
    </section>
    <script type="text/template" id="show-amortizacion-tpl">
    	<div class="row">
	        	<label class="control-label col-sm-2">Nombre Cliente</label>
	        <div class="form-group col-md-3">
	            <div><%- nombre_cliente %></div>
	        </div>
	        	<label class="control-label col-sm-2">Identificación Cliente</label>
	        <div class="form-group col-md-3">
	            <div><%- cedula_cliente %></div>
	        </div>
    		<div class="col-md-1 col-sm-2 col-xs-2 pull-right">
				<a href="#" class="btn btn-danger btn-sm btn-block btn-pdf-click">
					<i class="fa fa-file-pdf-o"></i>
				</a>
			</div>
   		</div>
   		<div class="row">
	        	<label class="control-label col-sm-2">Monto del credito</label>
	        <div class="form-group col-md-3">
	            <div>$ <%- window.Misc.currency( monto_cliente ) %></div>
	        </div>
	        	<label class="control-label col-sm-2">Plazo</label>
	        <div class="form-group col-md-1">
	            <div><%- plazo_cliente %>  AÑOS</div>
	        </div>
	        	<label class="control-label col-sm-2">Periodo</label>
	        <div class="form-group col-md-2">
	            <div>
	            	<% if(periodo_cliente == 12){ %>
	            		MENSUAL	
	            	<% }else if(periodo_cliente == 6 ){ %>
	            		BIMESTRAL
	            	<% }else if(periodo_cliente == 4 ){ %>
	            		TRIMESTRAL
        			<% }else if(periodo_cliente == 2 ){ %>
	            		SEMESTRAL
	            	<% } %>	
	            </div>
	        </div>
   		</div>
   		<div class="row">
	        	<label class="control-label col-sm-2">Efectivo anual</label>
	        <div class="form-group col-md-3">
	            <div><%- ea_cliente %> %</div>
	        </div>
	        	<label class="control-label col-sm-2">Nominal anual</label>
	        <div class="form-group col-md-2">
	            <div><%- nominal_anual_cliente %> %</div>
	        </div>
	        	<label class="control-label col-sm-2">Interes periodico</label>
	        <div class="form-group col-md-1">
	            <div><%- ip_cliente %> %</div>
	        </div>
   		</div>
		<div class="table-responsive no-padding">
			<table id="browse-amortizacion" class="table table-hover table-bordered" cellspacing="0">
				<thead>
				    <tr>
				        <th width="5%">#</th>
				        <th>Fecha</th>
				        <th>Saldo a capital</th>
				        <th>A. Capital</th>
				        <th>A. Interes</th>
				        <th>Cuota Fija</th>
				        <th>Flujo de caja</th>
				    </tr>
				</thead>
				<tbody>
					<tr>
				        <td>0</td>
				        <td>-</td>
				        <td>+ $<%- window.Misc.currency( monto_cliente ) %></td>
				        <td>-</td>
				        <td>-</td>
				        <td>-</td>
				        <td>+ <%- window.Misc.currency( monto_cliente ) %></td>
					</tr>
					<% _.each(model, function(item) { %>
				    	<tr>
				            <td><%- item.pos %></td>
				            <td><%- item.fecha %></td>
				            <td> $ <%- window.Misc.currency( item.saldoCapital ) %></td>
				            <td> $ <%- window.Misc.currency( item.capital ) %></td>
				            <td> $ <%- window.Misc.currency( item.interes ) %></td>
				            <td> $ <%- window.Misc.currency( item.anualidad )%></td>
				            <td> - $ <%- window.Misc.currency( item.total )%></td>
						</tr>
				    <% }); %>
				</tbody>
			</table>
   		</div>
   		<div class="row">
				<div class="col-sm-2 col-md-offset-5">
				<a href="<%- window.Misc.urlFull( Route.route('cliente.index') ) %>" class="btn btn-default btn-sm btn-block">Regresar</a>
			</div>
   		</div>
    </script>

    <script type="text/template" id="show-gracia-tpl">
    	<div class="row">
	        	<label class="control-label col-sm-2">Nombre Cliente</label>
	        <div class="form-group col-md-3">
	            <div><%- nombre_cliente %></div>
	        </div>
	        	<label class="control-label col-sm-2">Identificación Cliente</label>
	        <div class="form-group col-md-3">
	            <div><%- cedula_cliente %></div>
	        </div>
    		<div class="col-md-1 col-sm-2 col-xs-2 pull-right">
				<a href="#" class="btn btn-danger btn-sm btn-block btn-pdf-click">
					<i class="fa fa-file-pdf-o"></i>
				</a>
			</div>
   		</div>
   		<div class="row">
	        	<label class="control-label col-sm-2">Monto del credito</label>
	        <div class="form-group col-md-3">
	            <div> $ <%-window.Misc.currency( monto_cliente ) %></div>
	        </div>
	        	<label class="control-label col-sm-2">Plazo</label>
	        <div class="form-group col-md-1">
	            <div><%- plazo_cliente %>  AÑOS</div>
	        </div>
	        	<label class="control-label col-sm-2">Periodo</label>
	        <div class="form-group col-md-2">
	            <div>
	            	<% if(periodo_cliente == 12){ %>
	            		MENSUAL	
	            	<% }else if(periodo_cliente == 6 ){ %>
	            		BIMESTRAL
	            	<% }else if(periodo_cliente == 4 ){ %>
	            		TRIMESTRAL
        			<% }else if(periodo_cliente == 2 ){ %>
	            		SEMESTRAL
	            	<% } %>	
	            </div>
	        </div>
   		</div>
   		<div class="row">
	        <div class="form-group col-md-3">
	        	<label class="control-label">Efectivo anual</label>
	            <div><%- ea_cliente %> %</div>
	        </div>
	        <div class="form-group col-md-3">
	        	<label class="control-label">Nominal anual</label>
	            <div><%- nominal_anual_cliente %> %</div>
	        </div>
	        <div class="form-group col-md-3">
	        	<label class="control-label">Interes periodico</label>
	            <div><%- ip_cliente %> %</div>
	        </div>
	        <div class="form-group col-md-3">
	        	<label class="control-label">P.Gracia</label>
	            <div><%- periodo_gracia_cliente %> AÑOS</div>
	        </div>
   		</div>
	 	<div class="table-responsive no-padding">
	        <table id="browse-amortizacion" class="table table-hover table-bordered" cellspacing="0">
	            <thead>
	                <tr>
	                    <th width="5%">#</th>
	                    <th>Fecha</th>
	                    <th>Saldo a capital</th>
	                    <th>A. Capital</th>
	                    <th>A. Interes</th>
	                    <th>Cuota Fija</th>
	                    <th>Flujo de caja</th>
	                </tr>
	            </thead>
	            <tbody>
					<tr>
				        <td>0</td>
				        <td>-</td>
				        <td>+ $<%- window.Misc.currency( monto_cliente ) %></td>
				        <td>-</td>
				        <td>-</td>
				        <td>-</td>
				        <td>+ <%- window.Misc.currency( monto_cliente ) %></td>
					</tr>
					<% _.each(model, function(item) { %>
				    	<tr>
				            <td><%- item.pos %></td>
				            <td><%- item.fecha %></td>
				            <td> $ <%- (item.saldoCapital != '') ? window.Misc.currency( item.saldoCapital ) : '-' %></td>
				            <td> $ <%- (item.capital != '') ? window.Misc.currency( item.capital ) : '-' %></td>
				            <td> $ <%- (item.interes != '') ? window.Misc.currency( item.interes ) : '-' %></td>
				            <td> $ <%- (item.anualidad != '') ? window.Misc.currency( item.anualidad ) : '-' %></td>
				            <td> - $ <%- window.Misc.currency( item.total )%></td>
						</tr>
				    <% }); %>
	            </tbody>
	        </table>
    	</div>
   		<div class="row">
			<div class="col-sm-2 col-md-offset-5">
				<a href="<%- window.Misc.urlFull( Route.route('cliente.index') ) %>" class="btn btn-default btn-sm btn-block">Regresar</a>
			</div>
   		</div>
    </script>
@stop
