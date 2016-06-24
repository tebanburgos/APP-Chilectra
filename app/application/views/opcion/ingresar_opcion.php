					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Ingresar Opción</h3>
							</div>
							<div class="panel-body">
								<form class="form" action="<?php echo site_url('opcion/ingresar'); ?>" method="POST">
									<div class="col-md-12">
									<?php echo validation_errors(); ?>
									<div class="alert alert-info">
										Valores permitidos de opción:
										<ul>
											<li>TIPO_PROYECTO</li>
											<li>AREA_COMERCIAL</li>
											<li>LINEA_NEGOCIO</li>
										</ul>
									</div>										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Opción</label>
											<input type="text" name="opcion_titulo" value="<?php echo set_value('opcion_titulo'); ?>" class="form-control">
										</div>			
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Valor</label>
											<input type="text" name="opcion_valor" value="<?php echo set_value('opcion_valor'); ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-default btn-lg pull-right">Ingresar</button>
									</div>
								</form>
							</div>
							</div>
						</div>
					</div>