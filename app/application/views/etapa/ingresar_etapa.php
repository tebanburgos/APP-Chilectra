					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Ingresar Etapa</h3>
							</div>
							<div class="panel-body">
								<form class="form" action="<?php echo site_url('etapa/ingresar'); ?>" method="POST">
									<div class="col-md-12">
									<?php echo validation_errors(); ?>									
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre</label>
											<input type="text" name="etapa_nombre" value="<?php echo set_value('etapa_nombre'); ?>" class="form-control">
										</div>			
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Campos Requeridos al Finalizar la Etapa</label>
											<input type="text" name="etapa_requerido" value="<?php echo set_value('etapa_requerido'); ?>" class="form-control">
										</div>			
									</div>									
									<div class="col-md-6">
										<div class="form-group">
											<label>Orden de Secuencia <small>(números del 0 al 99)</small></label>
											<input type="text" name="etapa_orden" value="<?php echo set_value('etapa_orden'); ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-plus"></i> Ingresar</button>
									</div>
								</form>
							</div>
							</div>
						</div>
					</div>