							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-comments-o"></i> Actividad Reciente</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th><i class="fa fa-calendar"></i> Fecha</th>
												<th><i class="fa fa-user"></i> Usuario</th>
												<th><i class="fa fa-comments-o"></i> Detalle</th>
											</tr>	
										</thead>
										<tbody>
											<?php $actividad_reciente = $this->widget_model->obtener_actividad_reciente(); ?>
											<?php if ( $actividad_reciente): ?>
											<?php foreach ( $actividad_reciente->result() as $act): ?>
											<tr>
												<?php $act_usuario = $this->usuario_model->obtener($act->usuario_id); ?>
												<td><small><?php echo date('d-m-Y H:i', $act->log_fecha); ?></small></td>
												<td><?php echo $act_usuario->nombres.' '.$act_usuario->apellido_paterno.' '.$act_usuario->apellido_materno; ?></td>
												<td><?php echo $act->log_descripcion; ?></td>
											</tr>
											<?php endforeach; ?>
											<?php else: ?>
											<tr>
												<td colspan="3"><p class="alert alert-warning">Aún no se ha registrado actividad</p></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									<!--<a href="#"><button class="btn btn-default">Ver más</button></a>-->
								</div>
							</div>