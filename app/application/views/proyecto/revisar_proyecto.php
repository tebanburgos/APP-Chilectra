					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<?php if ( $mensaje): ?>
								<div class="col-md-12">
								<?php mostrar_mensaje($mensaje, $mensaje_clase); ?>
								</div>
								<?php endif; ?>							
							</div>
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Proyectos</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
										<th>Nombre</th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php if ( $proyecto->num_rows() > 0): ?>
										<?php foreach ( $proyecto->result() as $p): ?>
										<tr>
										<td><?php echo $p->proyecto_nombre; ?></td>
										
										<td width="260"><a href="<?php echo site_url('proyecto/etapas_info/'.$p->proyecto_id); ?>"><button class="btn btn-info btn"><i class="fa fa-align-justify"></i> Revisar</button></a></td>
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