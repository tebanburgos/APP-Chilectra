					<div class="row">
						<div class="col-md-12">			
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> <strong>TAREA:</strong> <?php echo $tarea->tarea_nombre; ?></h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<?php echo mostrar_mensaje($mensaje, $mensaje_clase); ?>
									</div>
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
										<!-- desarrollar esto -->
										<?php foreach ($bitacora->result() as $b): ?>
											<?php echo $b->bitacora_registro; ?>
										<?php endforeach; ?>
										<?php else: ?>
										<p class="alert alert-warning">Aún no hay movimientos en la bitácora</p>
										<?php endif; ?><!--
										<form action="<?php echo site_url('tarea/subir_adjunto').'/'.$this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">
											<input type="text" name="adjunto_titulo" placeholder="descripción breve">
											<input type="file" name="adjunto_archivo">
										</form>-->
									</div>
									<div class="col-md-4">
										<h3>Adjuntos</h3>
										<?php if ( $adjunto): ?>
										<table class="table table-striped">
										<?php foreach ( $adjunto->result() as $a): ?>
										<tr>
											<td><?php echo $a->adjunto_titulo; ?></td>
											<td><a href="<?php echo base_url('uploads/'.$a->adjunto_archivo); ?>" target="_blank"><?php echo $a->adjunto_archivo; ?></a></td>
										</tr>											
										<?php endforeach; ?>
										</table>										
										<?php else: ?>
										<p class="alert alert-warning">Aún no hay archivos adjuntos</p>
										<?php endif; ?>
										<form action="<?php echo site_url('tarea/subir_adjunto/'.$this->uri->segment(3)); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
											<div class="form-group">
												<label>Título del Adjunto <small>(con este nombre se mostrará el archivo adjunto)</small></label>
												<input type="text" name="titulo" class="form-control">
											</div>
											<div class="form-group">
												<input type="file" name="adjunto" size="20" class="form-control">
											</div>
											<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Subir</button>
										</form>
									</div>									
								</div>
							</div>
							</div>
						</div>
					</div>