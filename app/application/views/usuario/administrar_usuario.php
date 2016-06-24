					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 pull-right text-right">
									<a href="<?php echo site_url('usuario/ingresar'); ?>"><button class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-plus-square"></i> Ingresar Usuario</button></a>
								</div>
							</div>
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Administrador de Usuarios</h3>
							</div>
							<div class="panel-body">
								<?php if ( ! empty($mensaje)) mostrar_mensaje($mensaje, $mensaje_clase); ?>
								<table class="table table-first-column-number table-striped  table-hover">
								<thead>
									<tr>
										<th style="padding-left: 1em;">#</th> 
										<th>Usuario</th>
										<th>Email</th>
										<th>Estado</th>
										<th width="230">Opciones</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( $usuario->num_rows() > 0): ?>
									<?php foreach ($usuario->result() as $u): ?>
									<?php $activado = ( $u->activo_admin == 1 ) ? '<span class="label label-success">Activado</span>' : '<span class="label label-danger">Desactivado</span>'; ?> 
									<tr>
									<td>1</td>
									<td><?php echo $u->nombres; ?> <?php echo $u->apellido_paterno; ?> <?php echo $u->apellido_materno; ?></td>
									<td><?php echo $u->email; ?></td>
									<td><?php echo $activado; ?></td>
									<td><a href="<?php echo site_url("usuario/editar/".$u->usuario_id); ?>" class="btn btn-primary btn-xs">Editar <i class="fa fa-pencil-square-o"></i></a> &nbsp; <a href="#" onclick="eliminar(<?php echo $u->usuario_id; ?>);" class="btn btn-danger btn-xs">Eliminar <i class="fa fa-times"></i></a></td>                       
									</tr>
									<?php endforeach; ?>
									<?php else: ?>
									<tr>
									<td colspan="6"><div class="alert alert-warning">Aún no hay usuarios en el sistema</div></td>
									</tr>
									<?php endif; ?>
								</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
<script>
	function eliminar(usuario_id)
	{
		bootbox.confirm("¿Estás seguro de eliminar este usuario?", function(result) {
 			if (result)
 			{
				$.ajax({
					url: '<?php echo site_url("usuario/eliminar"); ?>/'+usuario_id,
					dataType: 'json',
					error: function(){ bootbox.alert('Ocurrió un error inesperado'); },
					success: function(e) {
						if (e.success == true)
						{
							window.location.href = '<?php echo site_url("usuario/administrar"); ?>';
						}
						else
						{
							bootbox.alert('Ocurrió un error inesperado');
						}
					}
				});				
			}
		}); 
	}
</script>