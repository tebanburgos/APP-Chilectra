					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Ingresar Proyecto</h3>
							</div>
							<div class="panel-body">
								<?php echo validation_errors(); ?>
								<form class="form" action="<?php echo site_url('proyecto/ingresar'); ?>" method="POST">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre del Proyecto</label>
											<input type="text" name="proyecto_nombre" value="<?php echo set_value('proyecto_nombre'); ?>" class="form-control">
										</div>
										<div class="form-group">
											<label>Tipo de Proyecto</label>
											<select name="proyecto_tipo" class="form-control">
												<option value="">Seleccione un tipo</option>
												<?php if ( $proyecto_tipo): ?>
												<?php foreach ( $proyecto_tipo->result() as $pt): ?>
												<option value="<?php echo $pt->opcion_valor; ?>"><?php echo $pt->opcion_valor; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Cliente</label>
											<input type="text" name="proyecto_cliente" value="" class="form-control">
										</div>
										<div class="form-group">
											<label>Línea de Negocios</label>
											<select name="proyecto_linea" class="form-control">
												<option value="">Seleccione una línea de negocios</option>
												<?php if ( $proyecto_linea): ?>
												<?php foreach ( $proyecto_linea->result() as $pt): ?>
												<option value="<?php echo $pt->opcion_valor; ?>"><?php echo $pt->opcion_valor; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>										
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-plus"></i> Ingresar Proyecto</button>
									</div>
								</form>
							</div>
							</div>
						</div>
					</div>