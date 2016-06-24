					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Ingresar Información a Proyecto</h3>
							</div>
							<div class="panel-body">
								<?php echo validation_errors(); ?>
								<form class="form" action="<?php echo site_url('proyecto/ingresar_info').'/'.$this->uri->segment(3); ?>" method="POST">
									<div class="row">
									<div class="col-md-12">
									<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Información General</h3>
									</div>
									<div class="panel-body">
									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre del Proyecto</label>
											<input type="text" name="proyecto_nombre" value="<?php echo $proyecto->proyecto_nombre; ?>" class="form-control" disabled="disabled">
										</div>
										<div class="form-group">
											<label>Tipo de Proyecto</label>
											<input name="proyecto_tipo" value="<?php echo $proyecto->proyecto_tipo; ?>" class="form-control" disabled="disabled">
										</div>
										<div class="form-group">
											<label>Ejecutivo Servicios</label>
											<select name="ejecutivo_servicios_id" class="form-control">
												<option value="">Elija un Ejecutivo de la lista</option>
												<?php if ( $es->num_rows() > 0): ?>
												<?php foreach ($es->result() as $ejec): ?>
												<option value="<?php echo $ejec->usuario_id; ?>" <?php echo set_select('ejecutivo_servicios_id', $ejec->usuario_id, $ejec->usuario_id == $proyecto->ejecutivo_servicios_id); ?>><?php echo $ejec->nombres.' '.$ejec->apellido_paterno; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>
										<div class="form-group">
											<label>Área Comercial</label>
											<select name="proyecto_area" class="form-control">
												<option value="">Elije una área comercial</option>
												<?php if ( $area_comercial): ?>
												<?php foreach( $area_comercial->result() as $ac): ?>
												<option value="<?php echo $ac->opcion_valor; ?>" <?php echo set_select('proyecto_area', $ac->opcion_valor, $proyecto->proyecto_area == $ac->opcion_valor); ?>><?php echo $ac->opcion_valor; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
												<!--
												<option value="GGCC">GGCC</option>
												<option value="INM">INM</option>
												<option value="CCEE">CCEE</option>
												-->
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Cliente</label>
											<input name="proyecto_cliente" class="form-control" value="<?php echo $proyecto->proyecto_cliente; ?>" disabled="disabled">
										</div>
										<div class="form-group">
											<label>Línea de Negocios</label>
											<input name="proyecto_linea" value="<?php echo $proyecto->proyecto_linea; ?>" class="form-control" disabled="disabled">
										</div>
										<div class="form-group">
											<label>Ejecutivo Negocios</label>
											<select name="ejecutivo_negocios_id" class="form-control">
												<option value="">Elija un Ejecutivo de la lista</option>
												<?php if ( $en->num_rows() > 0): ?>
												<?php foreach ($en->result() as $ejec): ?>
												<option value="<?php echo $ejec->usuario_id; ?>" <?php echo set_select('ejecutivo_negocios_id', $ejec->usuario_id, $proyecto->ejecutivo_negocios_id == $ejec->usuario_id); ?>><?php echo $ejec->nombres.' '.$ejec->apellido_paterno; ?></option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
										</div>									
									</div>
									</div>
									</div>
									</div>
										<div class="form-group">
											<p>Nota: recuerde asignar un Ejecutivo de Servicios y un Ejecutivo de Negocios al Proyecto para poder gestionar cada etapa.</p>
										</div>
									</div>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="col-md-12">
									<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Datos Proyectados</h3>
									</div>									
									<div class="panel-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Ingreso Proyectado</label>
													<input type="text" value="<?php echo set_value('proyecto_ingreso_proyectado', $proyecto->proyecto_ingreso_proyectado); ?>" name="proyecto_ingreso_proyectado" class="form-control">
												</div>
												<div class="form-group">
													<label>Costo Proyectado</label>
													<input type="text" value="<?php echo set_value('proyecto_costo_proyectado', $proyecto->proyecto_costo_proyectado); ?>" name="proyecto_costo_proyectado" class="form-control">
												</div>
											</div>										
											<div class="col-md-6">
												<div class="form-group">
													<label>Fecha de Término Proyectada</label>
													<input type="text" value="<?php echo set_value('proyecto_ft_proyectada', $proyecto->proyecto_ft_proyectada); ?>" name="proyecto_ft_proyectada" class="form-control datepicker">
												</div>																			
											</div>								
										</div>
										<div class="form-group">
											<p>Nota: recuerde asignar una Fecha de Término Proyectada para poder visualizar la Carta Gantt.</p>
										</div>
									</div>
									</div>
									</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Datos Reales</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Ingreso Real</label>
																<input type="text" value="<?php echo set_value('proyecto_ingreso_real', $proyecto->proyecto_ingreso_real); ?>" name="proyecto_ingreso_real" class="form-control">
															</div>
															<div class="form-group">
																<label>Costo Real</label>
																<input type="text" value="<?php echo set_value('proyecto_costo_real', $proyecto->proyecto_costo_real); ?>" name="proyecto_costo_real" class="form-control">
															</div>
														</div>										
														<div class="col-md-6">
															<div class="form-group">
																<label>Fecha de Término Real</label>
																<input type="text" value="<?php echo set_value('proyecto_ft_real', $proyecto->proyecto_ft_real); ?>" name="proyecto_ft_real" class="form-control datepicker">
															</div>																			
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>									
								<div class="col-md-12">
									<a href="<?php echo site_url('proyecto/administrar'); ?>"><button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-plus"></i> Agregar Información a Proyecto</button></a>
								</div>
								</form>
							</div>
							</div>
						</div>
					</div>
					<script>
						jQuery.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
						jQuery(document).ready(function(){
							jQuery('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
						});
					</script>