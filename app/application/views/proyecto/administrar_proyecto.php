					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<?php if ( $mensaje): ?>
								<div class="col-md-12">
								<?php mostrar_mensaje($mensaje, $mensaje_clase); ?>
								</div>
								<?php endif; ?>							
								<div class="col-md-6 pull-right text-right">
									<a href="<?php echo site_url('proyecto/ingresar'); ?>"><button class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa-plus-square"></i> Ingresar Proyecto</button></a>
								</div>
							</div>
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Administrar Proyectos</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
										<th>Nombre</th>
										<th>Carta Gantt</th>
										<th>Línea de Negocios</th>
										<th>Tipo</th>
										<th>Cliente</th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php if ( $proyecto->num_rows() > 0): ?>
										<?php foreach ( $proyecto->result() as $p): ?>
										<tr>
										<td> <a href="<?php echo site_url('proyecto/etapas_info/'.$p->proyecto_id); ?>"> <?php echo $p->proyecto_nombre; ?> </a> </td>
										<td> <small><a href="<?php echo site_url('proyecto/gantt/'.$p->proyecto_id); ?>"><i class="fa fa-calendar"></i> Ver Gantt</a></small> </td>
										<td><?php echo $p->proyecto_linea; ?></td>
										<td><?php echo $p->proyecto_tipo; ?></td>
										<td><?php echo $p->proyecto_cliente; ?></td>
										<td width="360"> <a href="<?php echo site_url('proyecto/etapas_info/'.$p->proyecto_id); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-align-justify"></i> Revisar</button></a> <a href="<?php echo site_url('proyecto/ingresar_info/'.$p->proyecto_id); ?>"><button class="btn btn-info btn-xs"><i class="fa fa-plus-circle"></i> Agregar Info</button></a> <a href="<?php echo site_url('proyecto/editar/').'/'.$p->proyecto_id; ?>"><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</button></a> <a href="#" onclick="eliminar(<?php echo $p->proyecto_id; ?>);"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a></td>
										</tr>
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
										<td colspan="5"><p class="alert alert-warning">Aún no hay proyectos que mostrar</p></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
					<script>
						function eliminar(proyecto_id)
						{
							bootbox.confirm('¿Está seguro de eliminar este Proyecto?', function(result){
								if ( result)
								{
									jQuery.ajax({
										dataType: 'json',
										type: 'post',
										url: '<?php echo site_url("proyecto/eliminar"); ?>/'+proyecto_id,
										success: function(r){
											if ( r.success)
											{
												window.location.href = '<?php echo site_url("proyecto/administrar"); ?>';
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
