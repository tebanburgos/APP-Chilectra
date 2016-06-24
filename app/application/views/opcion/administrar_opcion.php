					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<?php if ( $mensaje): ?>
								<div class="col-md-12">
								<?php mostrar_mensaje($mensaje, $mensaje_clase); ?>
								</div>
								<?php endif; ?>
								<div class="col-md-6 pull-right text-right">
									<a href="<?php echo site_url('opcion/ingresar'); ?>"><button class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa-plus-square"></i> Ingresar Opción</button></a>
								</div>
							</div>
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Administrador de Opciones</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
										<th>Opción</th>
										<th>Valor</th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php if ( $opcion->num_rows() > 0): ?>
										<?php foreach ( $opcion->result() as $o): ?>
										<tr>
										<td><?php echo $o->opcion_titulo; ?></td>
										<td><?php echo $o->opcion_valor; ?></td>
										<td width="200"><a href="<?php echo site_url('opcion/editar/'.$o->opcion_id); ?>"><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</button></a> <a href="#" onclick="eliminar(<?php echo $o->opcion_id; ?>);"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a></td>
										</tr>
										<?php endforeach; ?>
										<?php else: ?>
										<td colspan="2"><p class="alert alert-warning">Aún no hay opciones que mostrar</p></td>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
					<script>
						function eliminar(opcion_id)
						{
							bootbox.confirm('¿Está seguro de eliminar este registro?', function(result){
								if ( result)
								{
									jQuery.ajax({
										dataType: 'json',
										type: 'post',
										url: '<?php echo site_url("opcion/eliminar"); ?>/'+opcion_id,
										success: function(r){
											if ( r.success)
											{
												window.location.href = '<?php echo site_url("opcion/administrar"); ?>';
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
