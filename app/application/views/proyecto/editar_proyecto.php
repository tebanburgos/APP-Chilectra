					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Editar Proyecto</h3>
							</div>
							<div class="panel-body">
								<?php echo validation_errors(); ?>
								<form class="form" action="<?php echo site_url('proyecto/editar').'/'.$this->uri->segment(3); ?>" method="POST">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre del Proyecto</label>
											<input type="text" name="proyecto_nombre" value="<?php echo set_value('proyecto_nombre', $proyecto->proyecto_nombre); ?>" class="form-control">
										</div>
										<div class="form-group">
											<label>Tipo de Proyecto</label>
											<select name="proyecto_tipo" class="form-control">
												<option value="">Seleccione un tipo</option>
												<?php if ( $proyecto_tipo): ?>
												<?php foreach ( $proyecto_tipo->result() as $pt): ?>
												<option value="<?php echo $pt->opcion_valor; ?>" <?php echo set_select('proyecto_tipo', $pt->opcion_valor, $pt->opcion_valor == $proyecto->proyecto_tipo); ?>><?php echo $pt->opcion_valor; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Cliente</label>
											<input type="text" name="proyecto_cliente" value="<?php echo set_value('proyecto_cliente', $proyecto->proyecto_cliente); ?>" class="form-control">
										</div>
										<div class="form-group">
											<label>Línea de Negocios</label>
											<select name="proyecto_linea" class="form-control">
												<option value="">Seleccione una línea de negocios</option>
												<?php if ( $proyecto_linea): ?>
												<?php foreach ( $proyecto_linea->result() as $pt): ?>
												<option value="<?php echo $pt->opcion_valor; ?>" <?php echo set_select('proyecto_linea', $pt->opcion_valor, $pt->opcion_valor == $proyecto->proyecto_linea); ?>><?php echo $pt->opcion_valor; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>										
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-edit"></i> Editar Proyecto</button>
									</div>
								</form>
							</div>
							</div>
						</div>
					</div>