					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<?php if ( $mensaje): ?>
								<div class="col-md-12">
								<?php mostrar_mensaje($mensaje, $mensaje_clase); ?>
								</div>
								<?php endif; ?>
								<div class="col-md-6 pull-right text-right">
									<a href="<?php echo site_url('etapa/ingresar'); ?>"><button class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa-plus-square"></i> Ingresar Etapa</button></a>
								</div>
							</div>
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Administrador de etapas</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
										<th>Nombre</th>
										<th>Campos Requeridos al Finalizar</th>
										<th>Orden de secuencia</th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php if ( $etapa->num_rows() > 0): ?>
										<?php foreach ( $etapa->result() as $e): ?>
										<tr id="etapa_<?php echo $e->etapa_id; ?>">
											<td><?php echo $e->etapa_nombre; ?></td>
											<td><?php echo $e->etapa_requerido; ?></td>
											<td><?php echo $e->etapa_orden; ?></td>
											<td width="270"><a href="<?php echo site_url('etapa/editar/'.$e->etapa_id); ?>"><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</button></a> <a href="<?php echo site_url('tarea/ingresar/'.$e->etapa_id); ?>"><button class="btn btn-xs btn-info"><i class="fa fa-clock-o"></i> Agregar Tarea</button></a> <a href="#" onclick="eliminar(<?php echo $e->etapa_id; ?>);"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a></td>														
										</tr>
										<tr>
											<td colspan="4">
												<table class="table table-stripped" style="background-color: #f7f7f7;">
													<thead>
													<tr>
														<th style="width: 10%; border-bottom: none; background-color: white;">&nbsp;</th>
														<th>Tarea</th>
														<th>Orden de secuencia</th>
														<th>Asignado A</th>
														<th>&nbsp</th>
													</tr>
													</thead>
													<tbody>
													<?php $tarea = $this->tarea_model->obtener_por_etapa($e->etapa_id); ?>
													<?php if ( $tarea): ?>
													<?php foreach ( $tarea->result() as $t): ?>
													<tr>
														<td style="border-top: 0; background-color: white;"></td>
														<td><?php echo $t->tarea_nombre; ?></td>
														<td><?php echo $t->tarea_orden; ?></td>
														<td><?php echo $t->tarea_rol; ?></td>
														<td><a href="<?php echo site_url('tarea/editar/'.$t->tarea_id); ?>"><button class="btn btn-xs btn-success"><i class="fa fa-clock-o"></i> Editar Tarea</button></a> <a href="#" onclick="eliminar_tarea(<?php echo $t->tarea_id; ?>);"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar Tarea</button></a></td>
													</tr>
													<?php endforeach; ?>
													<?php else: ?>
													<tr>
														<td style="border-top: 0; background-color: white;"></td>
														<td colspan="4"><p class="alert alert-warning">Aún no hay tareas creadas para esta etapa.</p></td>
													</tr>														
													<?php endif; ?>
													</tbody>
												</table>
											</td>
										</tr>
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
										<td colspan="4"><p class="alert alert-warning">Aún no hay etapas que mostrar</p></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
					<script>
						function eliminar(etapa_id)
						{
							bootbox.confirm('¿Está seguro de eliminar este registro?', function(result){
								if ( result)
								{
									jQuery.ajax({
										dataType: 'json',
										type: 'post',
										url: '<?php echo site_url("etapa/eliminar"); ?>/'+etapa_id,
										success: function(r){
											if ( r.success)
											{
												window.location.href = '<?php echo site_url("etapa/administrar"); ?>';
											}
											else
											{
												bootbox.alert('Ocurrió un error al eliminar');
											}
										},
										error: function(){
											bootbox.alert('Ocurrió un error de conexión al eliminar');
										}
									});
								}
								else return;
							});
						}
						function eliminar_tarea(tarea_id)
						{
							bootbox.confirm('¿Está seguro de eliminar este registro?', function(result){
								if ( result)
								{
									jQuery.ajax({
										dataType: 'json',
										type: 'post',
										url: '<?php echo site_url("tarea/eliminar"); ?>/'+tarea_id,
										success: function(r){
											if ( r.success)
											{
												window.location.href = '<?php echo site_url("etapa/administrar"); ?>';
											}
											else
											{
												bootbox.alert('Ocurrió un error al eliminar');
											}
										},
										error: function(){
											bootbox.alert('Ocurrió un error de conexión al eliminar');
										}
									});
								}
								else return;
							});
						}						
					</script>
