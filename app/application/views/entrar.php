
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Entre con su cuenta</h3>
					</div>
					<div class="panel-body">
						<?php mostrar_mensajes(); ?>
						<?php echo validation_errors(); ?>
						<form role="form" action="<?php echo site_url('usuario/entrar'); ?>" method="POST">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
								</div>
								<!--
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>
								-->
								<button type="submit" class="btn btn-sm btn-success">Entrar</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>