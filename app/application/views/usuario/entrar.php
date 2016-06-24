		<div class="col-md-6 col-md-offset-3">			
			<div class="panel panel-default">
			<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h3 style="margin-top: 0;">Administrador de Proyectos</h3>
				</div>
			</div>		
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default panel-login">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-user"></i> Entre con su cuenta</h3>
						</div>
						<div class="panel-body">
							<?php mostrar_mensaje($mensaje, $mensaje_clase); ?>
							<?php echo validation_errors(); ?>
							<form role="form" action="<?php echo site_url('usuario/entrar'); ?>" method="POST">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="E-mail" name="usuario" type="email" autofocus="">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Contraseña" name="clave" type="password" value="">
										<div class="pull-right"><small><a href="<?php echo site_url('usuario/recuperar_clave'); ?>">Olvidé mi contraseña</a></small></div>
									</div>
									<!--
									<div class="checkbox">
										<label>
											<input name="remember" type="checkbox" value="Remember Me">Remember Me
										</label>
									</div>
									-->
									<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-right"></i> Entrar</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4" style="overflow: hidden;">
					<img src="<?php echo base_url('assets/img/logo.jpg'); ?>">
				</div>
			</div>
			
			</div>
			</div>
		</div>	