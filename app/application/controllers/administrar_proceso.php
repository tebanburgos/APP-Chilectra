					<div class="row">
						<div class="col-md-12">			
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> <strong>TAREA:</strong> <?php echo $tarea->tarea_nombre; ?></h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<h3>Estado de la Tarea</h3>
										<form action="<?php echo site_url('tarea/proceso/'.$this->uri->segment(3)); ?>" method="POST">
											<div class="form-group">
												<label>Fecha de Inicio</label>
												<input name="proceso_fecha_inicio" disabled="disabled" value="<?php echo date('d-m-Y', $tarea->proceso_fecha_inicio); ?>" class="form-control">
											</div>
											<!--
											<div class="checkbox">
												<label><input name="proceso_terminado" type="checkbox"> Finalizar tarea</label>
											</div>
											-->
											<div class="form-group">
												<button type="submit" name="guardar_tarea" value="1" class="btn btn-success"><i class="fa fa-check"></i> Terminar Tarea</button>
											</div>
										</form>										
									</div>
									<div class="col-md-4">
										<h3>Bitácora</h3>
										<?php if ( $bitacora): ?>
										<?php else: ?>
										<p class="alert alert-warning">Aún no hay movimientos en la bitácora</p>
										<?php endif; ?>
										<form action="<?php echo site_url('tarea/subir_adjunto').'/'.$this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">
											<input type="text" name="adjunto_titulo" placeholder="descripción breve">
											<input type="file" name="adjunto_archivo">
										</form>
									</div>
									<div class="col-md-4">
										<h3>Adjuntos</h3>
										<?php if ( $adjunto): ?>
										<?php else: ?>
										<p class="alert alert-warning">Aún no hay archivos adjuntos</p>
										<?php endif; ?>
										<?=form_open_multipart(''); ?>
										<input type="file" name="userfile" size="20" />
										<br /><br />
										<input type="submit" value="upload" />
										</form>
									</div>									
								</div>
							</div>
							</div>
						</div>
					</div>