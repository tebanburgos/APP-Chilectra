					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Editar Usuario</h3>
							</div>
							<div class="panel-body">
								<?php echo validation_errors(); ?>
								<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" class="form">								
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
										<label for="nombres">Nombres</label>
										<?php echo form_input('nombres', set_value('nombres', $usuario->nombres), 'id="nombres", class="form-control"'); ?>	
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
										<label for="apellido_paterno">Apellido Paterno</label>
										<?php echo form_input('apellido_paterno', set_value('apellido_paterno', $usuario->apellido_paterno), 'id="apellido_paterno", class="form-control"'); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
										<label for="apellido_materno">Apellido Materno</label>
										<?php echo form_input('apellido_materno', set_value('apellido_materno', $usuario->apellido_materno), 'id="apellido_materno", class="form-control"'); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
										<label for="email">E-Mail</label>
										<?php echo form_input('email', set_value('email', $usuario->email), 'id="email", class="form-control"'); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
										<label for="empresa">Empresa</label>
										<?php echo form_input('empresa', set_value('empresa', $usuario->empresa), 'id="empresa", class="form-control"'); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
										<label for="telefono">Teléfono</label>
										<?php echo form_input('telefono', set_value('telefono', $usuario->telefono), 'id="telefono", class="form-control"'); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
										<label for="celular">Celular</label>
										<?php echo form_input('celular', set_value('celular', $usuario->celular), 'id="celular", class="form-control"'); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
										<label for="clave">Contraseña</label>	
										<?php echo form_password('clave', '', 'id="clave", class="form-control"'); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
										<label for="repetir_clave">Repetir Contraseña</label>
										<?php echo form_password('repetir_clave', '', 'id="repetir_clave", class="form-control"'); ?>	
										</div>
									</div>
								</div>	
								<div class="row">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-6">
												<label>Permiso de Usuario y Activación</label>
												<div class="radio">
												<label>
													<?php echo form_radio(array('name' => 'permiso[]', 'value' => $permiso[0]['permiso'], 'checked' => set_radio('permiso[]', $permiso[0]['permiso'], $permiso[0]['permiso'] == $permiso_bd[0]), 'id' => 'permiso0')); ?>
													<?php echo $permiso[0]['etiqueta']; ?>			
												</label>
												</div>
												<div class="radio">
												<label>
													<?php echo form_radio(array('name' => 'permiso[]', 'value' => $permiso[1]['permiso'], 'checked' => set_radio('permiso[]', $permiso[1]['permiso'], $permiso[1]['permiso'] == $permiso_bd[0]), 'id' => 'permiso1')); ?>
													<?php echo $permiso[1]['etiqueta']; ?>
												</label>
												</div>
												<div class="checkbox">
													<label class="checkbox"><?php echo form_checkbox(array('name' => 'activo_admin', 'value' => 1, 'checked' => ( set_checkbox('activo_admin', 1) || $usuario->activo_admin == 1 ), 'id' => 'activo_admin')); ?> Activar Usuario</label>
												</div>												
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Rol Usuario</label>
													<select name="rol" class="form-control" style="margin-top:10px;">
														<option value="" <?php echo set_select('rol', '', $usuario->rol == ''); ?>>Seleccione un Rol</option>
														<option value="ES" <?php echo set_select('rol', 'ES', $usuario->rol == 'ES'); ?>>Ejecutivo de Servicios</option>
														<option value="EN" <?php echo set_select('rol', 'EN', $usuario->rol == 'EN'); ?>>Ejecutivo de Negocios</option>
														<option value="NA" <?php echo set_select('rol', 'NA', $usuario->rol == 'NA'); ?>>Sin Rol / Otro</option>
													</select>
												</div>
											</div>						
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group" style="margin-top: 10px;">
											<?php echo form_button(array('id' => 'editar_usuario', 'name' => 'editar_usuario', 'class' => 'btn btn-success btn-lg', 'type' => 'submit'), '<i class="fa fa-edit"></i> Editar'); ?>
										</div>
									</div>
								</div>
								</form>
							</div>
							</div>
						</div>
					</div>