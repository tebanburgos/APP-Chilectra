					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Editar Tarea</h3>
							</div>
							<div class="panel-body">
								<form class="form" action="<?php echo site_url('tarea/editar').'/'.$this->uri->segment(3); ?>" method="POST">
									<div class="col-md-12">
									<?php echo validation_errors(); ?>									
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre de la Tarea</label>
											<input type="text" name="tarea_nombre" value="<?php echo set_value('tarea_nombre', $tarea->tarea_nombre); ?>" class="form-control">
										</div>
										<div class="form-group">
											<label>Rol Asignado a la Tarea</label>
											<select name="tarea_rol" class="form-control" style="margin-top:10px;">
												<option value="" <?php echo set_select('tarea_rol', '', $tarea->tarea_rol == ''); ?>>Seleccione un Rol</option>
												<option value="ES" <?php echo set_select('tarea_rol', 'ES', $tarea->tarea_rol == 'ES'); ?>>Ejecutivo de Servicios</option>
												<option value="EN" <?php echo set_select('tarea_rol', 'EN', $tarea->tarea_rol == 'EN'); ?>>Ejecutivo de Negocios</option>
												<option value="NA" <?php echo set_select('tarea_rol', 'NA', $tarea->tarea_rol == 'NA'); ?>>Sin Rol / Otro</option>
											</select>
										</div>											
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Orden de secuencia de la Tarea</label>
											<input type="text" name="tarea_orden" value="<?php echo set_value('tarea_orden', $tarea->tarea_orden); ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-edit"></i> Editar</button>
									</div>
								</form>
							</div>
							</div>
						</div>
					</div>