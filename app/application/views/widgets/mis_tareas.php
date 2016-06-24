							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Mis Tareas</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th><i class="fa fa-calendar"></i> Fecha</th>
												<th><i class="fa fa-building-o"></i> Proyecto</th>
												<th><i class="fa fa-calendar"></i> Etapa</th>
												<th><i class="fa fa-building-o"></i> Tarea</th>
												
											</tr>	
										</thead>
										<tbody>
										<!-- obtención de proyectos por usuario -->
											<?php $tareas = $this->widget_model->obtener_mis_tareas(); ?>
											<?php if ( $tareas): ?>
											<?php foreach ( $tareas->result() as $t): ?>
											
											<?php $etapa_actual = $this->widget_model->obtener_responsable_de_la_etapa($t->proyecto_etapa_actual);?>
											<?php $rol_actual = $this->widget_model->obtener_rol_del_usuario();?>
											<?php if($etapa_actual == $rol_actual) { ?>
											
											<tr>
												<td><?php echo date('d-m-Y', $t->proyecto_fecha_ingreso); ?></td>
												<td><?php echo $t->proyecto_nombre; ?><small class="pull-right"><a href="<?php echo site_url('proyecto/gantt/'.$t->proyecto_id); ?>"><i class="fa fa-calendar"></i> Ver Gantt</a></small></td>
												<td><?php echo $t->etapa_v2_nombre; ?></td>
												<td><a href="<?php echo site_url('etapa_v2/'.$t->etapa_v2_url.'/'.$t->proyecto_id); ?>"><?php echo $t->etapa_v2_nombre; ?></a></td>
											</tr>
											<?php } ?>

											
											<?php endforeach; ?>
											<?php else: ?>
											<tr>
												<td colspan="4"><p class="alert alert-warning">Aún no hay tareas que mostrar</p></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>