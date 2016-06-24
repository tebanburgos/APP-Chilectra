							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Últimos Proyectos</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th><i class="fa fa-calendar"></i> Fecha Ingreso</th>
												<th><i class="fa fa-building-o"></i> Nombre del Proyecto</th>
												<th><i class="fa fa-building-o"></i> Etapa Actual</th>
												<th><i class="fa fa-user"></i> Cliente</th>
											</tr>	
										</thead>
										<tbody>
											<?php $ultimos_proyectos = $this->widget_model->obtener_ultimos_proyectos(); ?>
											<?php if ( $ultimos_proyectos): ?>
											<?php foreach ( $ultimos_proyectos->result() as $p): ?>
											<tr>
												<td><?php echo date('d-m-Y', $p->proyecto_fecha_ingreso); ?></td>
												<td><a href="<?php echo site_url('proyecto/ingresar_info').'/'.$p->proyecto_id; ?>"><?php echo $p->proyecto_nombre; ?></a> <small class="pull-right"><a href="<?php echo site_url('proyecto/gantt/'.$p->proyecto_id); ?>"><i class="fa fa-calendar"></i> Ver Gantt</a></small></td>
												<?php $etapa = $this->etapa_model->obtener($p->etapa_id); ?>
												<td><?php echo $etapa->etapa_nombre; ?></td>
												<td><?php echo $p->proyecto_cliente; ?></td>
											</tr>										
											<?php endforeach; ?>
											<?php else: ?>
											<tr>
												<td colspan="3"><p class="alert alert-warning">Aún no hay proyectos que mostrar</p></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									<a href="<?php echo site_url('proyecto/administrar'); ?>"><button class="btn btn-info pull-right"><i class="fa fa-eye"></i> Ver todos</button></a>
								</div>
							</div>