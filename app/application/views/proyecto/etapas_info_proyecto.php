					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> Etapas del Proyecto</h3>
							</div>
							<div class="panel-body">
							<div class="row">
							  <div class="col-md-12">	
							  
							  <!-- etapa 1 -->
							  
							  <div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><?=$titulo_etapa_1?></h3>
									</div>
									<div class="panel-body">
									<div class="row">
									<div class="col-md-12">

								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_1" name="formulario_etapa_1">
								<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="1" />
								    <label for="nombre_del_proyecto">Nombre del Proyecto</label>
									<input type="text" class="form-control" name="nombre_del_proyecto_etapa_1" id="nombre_del_proyecto_etapa_1" value="<?php echo $nombre_del_proyecto_etapa_1; ?>" disabled="disabled" />
								  </div>
								  <div class="form-group">
									<label for="cliente">Cliente</label>
									<input type="text" class="form-control" id="cliente_etapa_1" name="cliente_etapa_1" value="<?php echo $cliente_etapa_1 ?>" disabled="disabled">
								  </div>
								  <div class="form-group">
									<label for="tipo_de_proyecto">Tipo de Proyecto</label>
									<input type="text" class="form-control" id="tipo_de_proyecto_etapa_1" name="tipo_de_proyecto_etapa_1" value="<?php echo $tipo_de_proyecto_etapa_1 ?>" disabled="disabled">
								  </div>
								  <div class="form-group">
									<label for="linea_de_negocio">Linea de Negocio</label>
									<input type="text" class="form-control" id="linea_de_negocio_etapa_1" name="linea_de_negocio_etapa_1" value="<?php echo $linea_de_negocio_etapa_1 ?>" disabled="disabled">
								  </div>
								  
								  <div class="form-group">
									 <label for="adjuntar_archivo">Archivo adjuntado</label>
									 <p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_1 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_1 ?></a></p>
								 </div>       
						  	</div>
								
								
								
								<div class="col-md-6">
								
								  <div class="form-group">
									<label for="direccion">Dirección</label>
									<input type="text" class="form-control" id="direccion_etapa_1" name="direccion_etapa_1" value="<?php echo $direccion_etapa_1 ?>" disabled="disabled">
								  </div>
								  <div class="form-group">
									<label for="telefono">Teléfono</label>
									<input type="text" class="form-control" id="telefono_etapa_1" name="telefono_etapa_1" value="<?php echo $telefono_etapa_1 ?>" disabled="disabled">
								  </div>
								  <div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id="email_etapa_1" name="email_etapa_1" value="<?php echo $email_etapa_1 ?>" disabled="disabled">
								  </div>
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_1" name="bitacora_etapa_1" readonly><?php echo $bitacora_etapa_1 ?></textarea>
								  </div>
								   <div class="form-group">
									<label for="rut">Rut</label>
									<input type="rut" class="form-control" id="rut_etapa_1" name="rut_etapa_1" value="<?php echo $rut_etapa_1 ?>" disabled="disabled">
								  </div>  
								</div>
								</div>
								</form>
								
							
								
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 2 -->
							
						    <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_2?></h3>
							</div>
							<div class="panel-body">
							<div class="row">
							<div class="col-md-12">
							
							<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_2" name="formulario_etapa_2">
								
								<div class="row">
								
								<div class="col-md-6">
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="2" />
									<label for="fecha_de_inicio">Fecha de Inicio</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_inicio_etapa_2" value="<?php echo $fecha_de_inicio_etapa_2 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  <div class="form-group">
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_2 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_2 ?></a></p>
								  </div> 
								  
								</div>
								
								<div class="col-md-6">
								
								  <div class="form-group">
									<label for="contratista">Contratista seleccionado</label>
									<select class="form-control" id="contratista_etapa_2" name="contratista_etapa_2" disabled="disabled">
										<option><?php echo $contratista_etapa_2 ?></option>
									  </select>
								  </div>
								  
								  <div class="form-group">
									<label for="propuesta">Plazo de Desarrollo de Propuesta</label>
									<select class="form-control" id="propuesta_etapa_2" name="propuesta_etapa_2" disabled="disabled">
										<option><?php echo $propuesta_etapa_2 ?></option>
									  </select>
								  </div>
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_2" name="bitacora_etapa_2" readonly><?php echo $bitacora_etapa_2 ?></textarea>
								  </div>
								  
								</div>
								</div>
								</form>
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 3 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_3?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_3" name="formulario_etapa_3">
								
								<div class="row">
								
								<div class="col-md-6">
								  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="3" />
									<label for="fecha_de_inicio">Fecha de Inicio</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_inicio_etapa_3" value="<?php echo $fecha_de_inicio_etapa_3 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label for="garantia_equipo">Garantía Equipo</label>
									<input type="text" class="form-control" id="garantia_equipo_etapa_3" name="garantia_equipo_etapa_3" value="<?php echo $garantia_equipo_etapa_3 ?>" disabled="disabled"/>
								  </div>
								  
								  <div class="form-group">
									<label for="garantia_instalacion">Garantía Instalación</label>
									<input type="text" class="form-control" id="garantia_instalacion_etapa_3" name="garantia_instalacion_etapa_3" value="<?php echo $garantia_instalacion_etapa_3 ?>" disabled="disabled"/>
								  </div>
								  
								  <div class="form-group">
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_3 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_3 ?></a></p>
								  </div> 
								  
								</div>
								
								<div class="col-md-6">
								

								  <div class="form-group">
									<label for="itemizado_generico_nombre">Itemizado Genérico Nombre</label>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre1_etapa_3" name="itemizado_generico_nombre1_etapa_3" value="<?php echo $itemizado_generico_nombre1_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre2_etapa_3" name="itemizado_generico_nombre2_etapa_3" value="<?php echo $itemizado_generico_nombre2_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre3_etapa_3" name="itemizado_generico_nombre3_etapa_3"  value="<?php echo $itemizado_generico_nombre3_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre4_etapa_3" name="itemizado_generico_nombre4_etapa_3"  value="<?php echo $itemizado_generico_nombre4_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre5_etapa_3" name="itemizado_generico_nombre5_etapa_3"  value="<?php echo $itemizado_generico_nombre5_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre6_etapa_3" name="itemizado_generico_nombre6_etapa_3"  value="<?php echo $itemizado_generico_nombre6_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre7_etapa_3" name="itemizado_generico_nombre7_etapa_3"  value="<?php echo $itemizado_generico_nombre7_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre8_etapa_3" name="itemizado_generico_nombre8_etapa_3"  value="<?php echo $itemizado_generico_nombre8_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre9_etapa_3" name="itemizado_generico_nombre9_etapa_3"  value="<?php echo $itemizado_generico_nombre9_etapa_3 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre10_etapa_3" name="itemizado_generico_nombre10_etapa_3"  value="<?php echo $itemizado_generico_nombre10_etapa_3 ?>" disabled="disabled"/>
									</div>
									
								  </div>
								  
								  <div class="form-group">
									<label for="itemizado_generico_costo">Itemizado Genérico Costo</label>
									<input type="text" class="form-control" id="itemizado_generico_costo_etapa_3" name="itemizado_generico_costo_etapa_3" value="<?php echo $itemizado_generico_costo_etapa_3 ?>" disabled="disabled"/>
								  </div>
								  
								  <div class="form-group">
									<label for="plazo_construccion">Plazo Construcción</label>
									<select class="form-control" id="plazo_construccion_etapa_3" name="plazo_construccion_etapa_3" disabled="disabled"/>
										<option><?php echo $plazo_construccion_etapa_3 ?></option>
									  </select>
								  </div>
								  
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_3" name="bitacora_etapa_3" readonly><?php echo $bitacora_etapa_3 ?></textarea>
								  </div>
								  
								</div>
								</div>
								</form>
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 4 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_4?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_4" name="formulario_etapa_4">
								
								<div class="row">
								
								<div class="col-md-6">
								  
								 <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="4" />
									<label for="fecha_de_inicio">Fecha de Inicio</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_inicio_etapa_4" value="<?php echo $fecha_de_inicio_etapa_4 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  						  
								  <div class="form-group">
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_4 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_4 ?></a></p>
								  </div>  
								  
								</div>
								
								<div class="col-md-6">
								
								  <div class="form-group">
									<label for="margen">Margen (%)</label>
									<input type="text" class="form-control" id="margen_etapa_4" name="margen_etapa_4" value="<?php echo $margen_etapa_4 ?>" disabled="disabled"/>
								  </div>
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_4" name="bitacora_etapa_4" readonly><?php echo $bitacora_etapa_4 ?></textarea>
								  </div>
															  
								</div>
								</div>	
								</form>
								
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 5 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_5?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_5" name="formulario_etapa_5">
								
								<div class="row">
								
								<div class="col-md-6">
								  
								 <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="5" />
									<label for="fecha_de_inicio">Fecha de Inicio</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_inicio_etapa_5" value="<?php echo $fecha_de_inicio_etapa_5 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  						  
								  <div class="form-group">
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_5 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_5 ?></a></p>
								  </div>  
								  
								</div>
								
								
								
								<div class="col-md-6">
								
								  <div class="form-group">
									<label for="margen_propuesto">Margen Propuesto (%)</label>
									<input type="text" class="form-control" id="margen_propuesto_etapa_5" name="margen_propuesto_etapa_5" value="<?php echo $margen_propuesto_etapa_5 ?>" disabled="disabled"/>
								  </div>
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_5" name="bitacora_etapa_5" readonly><?php echo $bitacora_etapa_5 ?></textarea>
								  </div>
								
								  
								</div>
								</div>
								</form>
								
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 6 -->
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_6?></h3>
							</div>
							<div class="panel-body">
								
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_6" name="formulario_etapa_6">
								
								<div class="row">
								 
								<div class="col-md-6">
								
								 <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="6" />
									<label for="fecha_de_inicio">Fecha de Inicio</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_inicio_etapa_6" value="<?php echo $fecha_de_inicio_etapa_6 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  						  
								  <div class="form-group">
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_6 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_6 ?></a></p>
								  </div>  
								  
								 </div>

								 <div class="col-md-6">
								
								 
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_6" name="bitacora_etapa_6" readonly><?php echo $bitacora_etapa_6 ?></textarea>
								  </div>
								
								  
								  </div>
								</div>
								</div>
								</form>
								
							</div>	
							</div>
							</div>
							
							<!-- etapa 7 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_7?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_7" name="formulario_etapa_7">
								
								<div class="row">
								 
									<div class="col-md-6">								 
								  
										<div class="form-group">
											<input type="hidden" name="etapa_v2_id" value="7" />
											<label for="fecha_de_inicio">Fecha de Inicio</label>
											<div class="input-group input-append date" id="dateRangePicker">
												<input type="text" class="form-control" name="fecha_de_inicio_etapa_7" value="<?php echo $fecha_de_inicio_etapa_7 ?>" disabled="disabled"/>
											<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
										</div>
								  						  
										<div class="form-group">
											<label for="adjuntar_archivo">Archivo adjuntado</label>
											<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_7 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_7 ?></a></p>
										</div>

								  
									</div>
								
									<div class="col-md-6">									
								
										<div class="form-group">
											<label for="margen_cierre">Margen Cierre (%)</label>
											<input type="text" class="form-control" id="margen_cierre_etapa_7" name="margen_cierre_etapa_7" value="<?php echo $margen_cierre_etapa_7 ?>" disabled="disabled"/>
										</div>
								
										<div class="form-group">
											<label for="bitacora">Bitácora</label>
											<textarea class="form-control" rows="3" id="bitacora_etapa_7" name="bitacora_etapa_7" readonly><?php echo $bitacora_etapa_7 ?></textarea>
										</div>
										
										<div class="form-group">
												<label>
												<?php $check_orden_de_compra_etapa_7_checkeada = ""; ?>
												<?php if($check_orden_de_compra_etapa_7 == "1") {$check_orden_de_compra_etapa_7_checkeada = "checked";} ?>
													<input type="checkbox" name="check_orden_de_compra_etapa_7" <?php echo $check_orden_de_compra_etapa_7_checkeada ?> disabled="true"> Orden de Compra
												</label>
											
										</div>
									</div>  
									</div>
								</form>
							</div>	
							</div>
							</div>
							</div>
							
							<!-- etapa 8 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_8?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_8" name="formulario_etapa_8">
								
									<div class="row">
										<div class="col-md-6">		
								
											<div class="form-group">
												<input type="hidden" name="etapa_v2_id" value="8" />
												<label for="fecha_de_inicio">Fecha de Inicio</label>
												<input type="text" class="form-control" name="fecha_de_inicio_etapa_8" value="<?php echo $fecha_de_inicio_etapa_8 ?>" disabled="disabled"/>
											</div> 
								  						  
											<div class="form-group">
												<label for="adjuntar_archivo">Archivo adjuntado</label>
												<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_8 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_8 ?></a></p>
											</div>
								  
										</div>
								  
								  <div class="col-md-6">
								 
									<div class="form-group">
										<label for="fecha_de_acta_de_entrega">Fecha de Acta de Entrega</label>
										<input type="text" class="form-control" name="fecha_de_acta_de_entrega_etapa_8" value="<?php echo $fecha_de_acta_de_entrega_etapa_8 ?>" disabled="disabled"/>
									</div>
								
									<div class="form-group">
										<label for="bitacora">Bitacora</label>
										<textarea class="form-control" rows="3" id="bitacora_etapa_8" name="bitacora_etapa_8" readonly><?php echo $bitacora_etapa_8 ?></textarea>
									</div>
								 
									<div class="form-group">
											<label>
												<?php $check_se_adjunta_entrega_de_terreno_etapa_8_checkeada = ""; ?>
												<?php if($check_se_adjunta_entrega_de_terreno_etapa_8 == "1") {$check_se_adjunta_entrega_de_terreno_etapa_8_checkeada = "checked";} ?>
												<input type="checkbox" name="check_se_adjunta_entrega_de_terreno_etapa_8" <?php echo $check_se_adjunta_entrega_de_terreno_etapa_8_checkeada ?>  disabled="true"> Se Adjunta Entrega de Terreno
											</label>
									</div>
								 
									<div class="form-group">
											<label>
												<?php $check_boleta_garantia_ejecucion_contratista_etapa_8_checkeada = ""; ?>
												<?php if($check_boleta_garantia_ejecucion_contratista_etapa_8 == "1") {$check_boleta_garantia_ejecucion_contratista_etapa_8_checkeada = "checked";} ?>
												<input type="checkbox" name="check_boleta_garantia_ejecucion_contratista_etapa_8" <?php echo $check_boleta_garantia_ejecucion_contratista_etapa_8_checkeada ?>  disabled="true"> Boleta Garantía Ejecución Contratista
											</label>
									</div>
									</div>
								
								</div>
								</form>
								</div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 9 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_9?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_9" name="formulario_etapa_9">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_9 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_9 ?></a></p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo (Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias_etapa_9" name="ingreso_de_plazo_en_dias_etapa_9" value="<?php echo $ingreso_de_plazo_en_dias_etapa_9 ?>" disabled="disabled"/>
								  </div>
								  
								</div>
								 						 
								  <div class="col-md-6">
								
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_9" name="bitacora_etapa_9" readonly><?php echo $bitacora_etapa_9 ?></textarea>
								  </div>
								 
								  <div class="form-group">							  
								  <label for="email_adquisicion">E-mail Adquisición</label>
								  <br>
								  <label class="checkbox-inline">
								  
									<?php $email_adquisicion_checkeado_etapa_9_opcion_1 = ""; ?>
									<?php $email_adquisicion_checkeado_etapa_9_opcion_2 = ""; ?>
									<?php $email_adquisicion_checkeado_etapa_9_opcion_3 = ""; ?>
									<?php $array = explode(",", $email_adquisicion_etapa_9);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$email_adquisicion_checkeado_etapa_9_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$email_adquisicion_checkeado_etapa_9_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$email_adquisicion_checkeado_etapa_9_opcion_3 = "checked";} ?>
									<?php } ?>
									
										<input type="checkbox" name="email_adquisicion_etapa_9[]" <?php echo $email_adquisicion_checkeado_etapa_9_opcion_1 ?> disabled="true"> E-mail Adquisición 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="email_adquisicion_etapa_9[]" <?php echo $email_adquisicion_checkeado_etapa_9_opcion_2 ?> disabled="true"> E-mail Adquisición 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="email_adquisicion_etapa_9[]" <?php echo $email_adquisicion_checkeado_etapa_9_opcion_3 ?> disabled="true"> E-mail Adquisición 3
								  </label>
								  </div>
								  
								</div>
							</div>	
							</form>
							</div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 10 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_10?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_10" name="formulario_etapa_10">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="10" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_10 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_10 ?></a></p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo (Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias_etapa_10" name="ingreso_de_plazo_en_dias_etapa_10" value="<?php echo $ingreso_de_plazo_en_dias_etapa_10 ?>" disabled="disabled"/>
								  </div>
								  
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_10" name="bitacora_etapa_10" readonly><?php echo $bitacora_etapa_10 ?></textarea>
								  </div>
								  
								</div>
								 						 
								  <div class="col-md-6">
								
								  <div class="form-group">							  
								  <label for="ingenieria_de_detalle_aprobada">Ingeniería de Detalle Aprobada</label>
								  <br>
								  <label class="checkbox-inline">
								  
									<?php $ingenieria_de_detalle_aprobada_etapa_10_opcion_1 = ""; ?>
									<?php $ingenieria_de_detalle_aprobada_etapa_10_opcion_2 = ""; ?>
									<?php $ingenieria_de_detalle_aprobada_etapa_10_opcion_3 = ""; ?>
									<?php $array = explode(",", $ingenieria_de_detalle_aprobada_etapa_10);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$ingenieria_de_detalle_aprobada_etapa_10_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$ingenieria_de_detalle_aprobada_etapa_10_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$ingenieria_de_detalle_aprobada_etapa_10_opcion_3 = "checked";} ?>
									<?php } ?>
								  
										<input type="checkbox" name="ingenieria_de_detalle_aprobada_etapa_10[]" <?php echo $ingenieria_de_detalle_aprobada_etapa_10_opcion_1 ?> disabled="true">Ingeniería de Detalle Aprobada 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="ingenieria_de_detalle_aprobada_etapa_10[]" <?php echo $ingenieria_de_detalle_aprobada_etapa_10_opcion_2 ?> disabled="true">Ingeniería de Detalle Aprobada 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="ingenieria_de_detalle_aprobada_etapa_10[]" <?php echo $ingenieria_de_detalle_aprobada_etapa_10_opcion_3 ?> disabled="true">Ingeniería de Detalle Aprobada 3
								  </label>
								  </div>
						
								  
								  <div class="form-group">
								  <label for="memoria_de_calculo">Memoria de Cálculo</label>
								  <br>
								   <label class="checkbox-inline">
								   
									<?php $memoria_de_calculo_etapa_10_opcion_1 = ""; ?>
									<?php $memoria_de_calculo_etapa_10_opcion_2 = ""; ?>
									<?php $memoria_de_calculo_etapa_10_opcion_3 = ""; ?>
									<?php $array = explode(",", $memoria_de_calculo_etapa_10);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$memoria_de_calculo_etapa_10_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$memoria_de_calculo_etapa_10_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$memoria_de_calculo_etapa_10_opcion_3 = "checked";} ?>
									<?php } ?>
								   
										<input type="checkbox" name="memoria_de_calculo_etapa_10[]" <?php echo $memoria_de_calculo_etapa_10_opcion_1 ?> disabled="true">Memoria de Cálculo 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="memoria_de_calculo_etapa_10[]" <?php echo $memoria_de_calculo_etapa_10_opcion_2 ?> disabled="true">Memoria de Cálculo 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="memoria_de_calculo_etapa_10[]" <?php echo $memoria_de_calculo_etapa_10_opcion_3 ?> disabled="true">Memoria de Cálculo 3
								  </label>
								  </div>
								 
								 <div class="form-group">
								 	<?php $aprobacion_emplazamiento_etapa_10_checkeado = ""; ?>
									<?php if($aprobacion_emplazamiento_etapa_10 == "1") {$aprobacion_emplazamiento_etapa_10_checkeado = "checked";} ?>							 
								 <label>
										<input type="checkbox" name="aprobacion_emplazamiento_etapa_10" <?php echo $aprobacion_emplazamiento_etapa_10_checkeado ?> disabled="true"> Aprobación Emplazamiento
									</label>
								 </div>
								  
								</div>
								</div>
								
								</form>
							</div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 11 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_11?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_11" name="formulario_etapa_11">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="11" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_11 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_11 ?></a></p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo (Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias_etapa_11" name="ingreso_de_plazo_en_dias_etapa_11" value="<?php echo $ingreso_de_plazo_en_dias_etapa_11 ?>" disabled="disabled"/>
								  </div>
								 
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_11" name="bitacora_etapa_11" readonly><?php echo $bitacora_etapa_11 ?></textarea>
								  </div>
								 
								</div>
								  
								 <div class="col-md-6">
								 
								  <div class="form-group">								  
								  <label for="registro_fotografico">Registro Fotográfico</label>
								  <br>
									<label class="checkbox-inline">
									
									<?php $registro_fotografico_etapa_11_opcion_1 = ""; ?>
									<?php $registro_fotografico_etapa_11_opcion_2 = ""; ?>
									<?php $registro_fotografico_etapa_11_opcion_3 = ""; ?>
									<?php $array = explode(",", $registro_fotografico_etapa_11);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$registro_fotografico_etapa_11_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$registro_fotografico_etapa_11_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$registro_fotografico_etapa_11_opcion_3 = "checked";} ?>
									<?php } ?>
									
										<input type="checkbox" name="registro_fotografico_etapa_11[]" <?php echo $registro_fotografico_etapa_11_opcion_1 ?> disabled="true">Registro Fotográfico 1
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_11[]" <?php echo $registro_fotografico_etapa_11_opcion_2 ?> disabled="true">Registro Fotográfico 2
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_11[]" <?php echo $registro_fotografico_etapa_11_opcion_3 ?> disabled="true">Registro Fotográfico 3
									</label>
								  </div>
								  
								 <div class="form-group">
									<?php $ipal_etapa_11_checkeado = ""; ?>
									<?php if($ipal_etapa_11 == "1") {$ipal_etapa_11_checkeado = "checked";} ?>
										<label>
											<input type="checkbox" name="ipal_etapa_11" <?php echo $ipal_etapa_11_checkeado ?> disabled="true"> IPAL
										</label>
								 </div>
								  
								</div>
								</div>
								</form>
							  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 12 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_12?></h3>
							</div>
							<div class="panel-body">
					
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_12" name="formulario_etapa_12">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="12" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_12 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_12 ?></a></p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo(Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias_etapa_12" name="ingreso_de_plazo_en_dias_etapa_12" value="<?php echo $ingreso_de_plazo_en_dias_etapa_12 ?>" disabled="disabled"/>
								  </div>
								 
								 
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_12" name="bitacora_etapa_12" readonly><?php echo $bitacora_etapa_12 ?></textarea>
								  </div>
								  
								 </div>
								
								

								 <div class="col-md-6">
								 
								 <div class="form-group">
									<label for="itemizado_generico_nombre">Itemizado Genérico</label>
								  </div>
								 
								 <div class="form-group">
									<div class="col-md-4">
									<label for="itemizado_generico_nombre">Nombre</label>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre1_etapa_12" name="itemizado_generico_nombre1_etapa_12" value="<?php echo $itemizado_generico_nombre1_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre2_etapa_12" name="itemizado_generico_nombre2_etapa_12" value="<?php echo $itemizado_generico_nombre2_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre3_etapa_12" name="itemizado_generico_nombre3_etapa_12" value="<?php echo $itemizado_generico_nombre3_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre4_etapa_12" name="itemizado_generico_nombre4_etapa_12" value="<?php echo $itemizado_generico_nombre4_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre5_etapa_12" name="itemizado_generico_nombre5_etapa_12" value="<?php echo $itemizado_generico_nombre5_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre6_etapa_12" name="itemizado_generico_nombre6_etapa_12" value="<?php echo $itemizado_generico_nombre6_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre7_etapa_12" name="itemizado_generico_nombre7_etapa_12" value="<?php echo $itemizado_generico_nombre7_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre8_etapa_12" name="itemizado_generico_nombre8_etapa_12" value="<?php echo $itemizado_generico_nombre8_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre9_etapa_12" name="itemizado_generico_nombre9_etapa_12" value="<?php echo $itemizado_generico_nombre9_etapa_12 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre10_etapa_12" name="itemizado_generico_nombre10_etapa_12" value="<?php echo $itemizado_generico_nombre10_etapa_12 ?>" disabled="disabled"/>
									</div>
									</div>
								  </div>
								 
								 
								 <div class="form-group">
									<div class="col-md-4">
									<label for="Fecha_de_inicio">Fecha de Inicio</label>
										<div class="form-group">
											<input type="text" name="itemizado_generico1_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico1_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico2_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico2_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico3_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico3_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico4_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico4_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico5_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico5_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico6_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico6_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico7_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico7_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico8_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico8_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico9_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico9_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico10_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico10_etapa_12 ?>" disabled="disabled"/>
										</div>
									</div>
									<div class="col-md-4">
									<label for="Fecha_de_termino">Fecha de Término</label>

										<div class="form-group">
											<input type="text" name="itemizado_generico11_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico11_etapa_12 ?>" disabled="disabled"/>
										</div>	
										<div class="form-group">
											<input type="text" name="itemizado_generico12_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico12_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico13_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico13_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico14_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico14_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico15_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico15_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico16_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico16_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico17_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico17_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico18_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico18_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico19_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico19_etapa_12 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico20_etapa_12" class="form-control datepicker" value="<?php echo $itemizado_generico20_etapa_12 ?>" disabled="disabled"/>
										</div>
									<br>
								</div>
								 
								 
								 </div>
								
								 <div class="form-group">							  
								  <label for="registro_fotografico">Registro Fotográfico</label>
								  <br>
								  
									<?php $registro_fotografico_etapa_12_opcion_1 = ""; ?>
									<?php $registro_fotografico_etapa_12_opcion_2 = ""; ?>
									<?php $registro_fotografico_etapa_12_opcion_3 = ""; ?>
									<?php $array = explode(",", $registro_fotografico_etapa_12);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$registro_fotografico_etapa_12_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$registro_fotografico_etapa_12_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$registro_fotografico_etapa_12_opcion_3 = "checked";} ?>
									<?php } ?>
								  
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_12[]" <?php echo $registro_fotografico_etapa_12_opcion_1 ?> disabled="true"> Registro Fotográfico 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_12[]" <?php echo $registro_fotografico_etapa_12_opcion_2 ?> disabled="true"> Registro Fotográfico 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_12[]" <?php echo $registro_fotografico_etapa_12_opcion_3 ?> disabled="true"> Registro Fotográfico 3
								  </label>
								  </div>
								 
								<div class="form-group">
									<label>
									
									<?php $ipal_etapa_12_checkeado = ""; ?>
									<?php if($ipal_etapa_12 == "1") {$ipal_etapa_12_checkeado = "checked";} ?>
									
										<input type="checkbox" name="ipal_etapa_12" <?php echo $ipal_etapa_12_checkeado ?> disabled="true"> IPAL
									</label>
								 </div>
								  
								</div>
								</div>
								</form>
								
							</div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 13 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_13?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_13" name="formulario_etapa_13">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="13" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_13 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_13 ?></a></p>
								  </div>
								  
								<div class="form-group">
								
								<label for="anexo_SEC">Anexo SEC</label>
								<br>
								
									<?php $anexo_SEC_etapa_13_opcion_1 = ""; ?>
									<?php $anexo_SEC_etapa_13_opcion_2 = ""; ?>
									<?php $anexo_SEC_etapa_13_opcion_3 = ""; ?>
									<?php $array = explode(",", $anexo_SEC_etapa_13);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$anexo_SEC_etapa_13_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$anexo_SEC_etapa_13_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$anexo_SEC_etapa_13_opcion_3 = "checked";} ?>
									<?php } ?>
								
								  <label class="checkbox-inline">
										<input type="checkbox" name="anexo_SEC_etapa_13[]" <?php echo $anexo_SEC_etapa_13_opcion_1 ?> disabled="true">Anexo SEC 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="anexo_SEC_etapa_13[]" <?php echo $anexo_SEC_etapa_13_opcion_2 ?> disabled="true">Anexo SEC 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="anexo_SEC_etapa_13[]" <?php echo $anexo_SEC_etapa_13_opcion_3 ?> disabled="true">Anexo SEC 3
								  </label>
								</div>
								 
								 <div class="form-group">
								 <label for="pruebas_operaciones">Pruebas Operacionales</label>
								<br>
								
									<?php $pruebas_operaciones_etapa_13_opcion_1 = ""; ?>
									<?php $pruebas_operaciones_etapa_13_opcion_2 = ""; ?>
									<?php $pruebas_operaciones_etapa_13_opcion_3 = ""; ?>
									<?php $array = explode(",", $pruebas_operaciones_etapa_13);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$pruebas_operaciones_etapa_13_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$pruebas_operaciones_etapa_13_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$pruebas_operaciones_etapa_13_opcion_3 = "checked";} ?>
									<?php } ?>
								
								  <label class="checkbox-inline">
										<input type="checkbox" name="pruebas_operaciones_etapa_13[]" <?php echo $pruebas_operaciones_etapa_13_opcion_1 ?> disabled="true">Pruebas Operacionales 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="pruebas_operaciones_etapa_13[]" <?php echo $pruebas_operaciones_etapa_13_opcion_2 ?> disabled="true">Pruebas Operacionales 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="pruebas_operaciones_etapa_13[]" <?php echo $pruebas_operaciones_etapa_13_opcion_3 ?> disabled="true">Pruebas Operacionales 3
								  </label>
								</div>
								
								</div>
								
								<div class="col-md-6">
																							 								 							   							 
								 <div class="form-group">							  
								  <label for="registro_fotografico">Registro Fotográfico</label>
								  <br>
								  
									<?php $registro_fotografico_etapa_13_opcion_1 = ""; ?>
									<?php $registro_fotografico_etapa_13_opcion_2 = ""; ?>
									<?php $registro_fotografico_etapa_13_opcion_3 = ""; ?>
									<?php $array = explode(",", $registro_fotografico_etapa_13);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$registro_fotografico_etapa_13_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$registro_fotografico_etapa_13_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$registro_fotografico_etapa_13_opcion_3 = "checked";} ?>
									<?php } ?>
								  
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_13[]" <?php echo $registro_fotografico_etapa_13_opcion_1 ?> disabled="true"> Registro Fotográfico 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_13[]" <?php echo $registro_fotografico_etapa_13_opcion_2 ?> disabled="true"> Registro Fotográfico 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico_etapa_13[]" <?php echo $registro_fotografico_etapa_13_opcion_3 ?> disabled="true"> Registro Fotográfico 3
								  </label>
								  </div>
								 								 
								  <div class="form-group">
									<label for="fecha_de_puesta_en_marcha">Fecha de Puesta en Marcha</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_puesta_en_marcha_etapa_13" value="<?php echo $fecha_de_puesta_en_marcha_etapa_13 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  
								</div>
								</div>
								
								</form>
							
								
							  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 14 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_14?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_14" name="formulario_etapa_14">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="14" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_14 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_14 ?></a></p>
								  </div>
								  
								  <div class="form-group">
									<label for="plazo_de_correcciones_de_observaciones">Plazo de Corrección de Observaciones</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="plazo_de_correcciones_de_observaciones_etapa_14" value="<?php echo $plazo_de_correcciones_de_observaciones_etapa_14 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								 </div>
								
								</div>
								  
								<div class="col-md-6">
								
								 <div class="form-group">
								 <label for="observaciones">Observaciones</label>
								 <br>
								  <label class="checkbox-inline">
								  
									<?php $observaciones_etapa_14_opcion_1 = ""; ?>
									<?php $observaciones_etapa_14_opcion_2 = ""; ?>
									<?php $observaciones_etapa_14_opcion_3 = ""; ?>
									<?php $array = explode(",", $observaciones_etapa_14);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$observaciones_etapa_14_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$observaciones_etapa_14_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$observaciones_etapa_14_opcion_3 = "checked";} ?>
									<?php } ?>
								  
										<input type="checkbox" name="observaciones_etapa_14[]" <?php echo $observaciones_etapa_14_opcion_1 ?> disabled="true">Observaciones 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_etapa_14[]" <?php echo $observaciones_etapa_14_opcion_2 ?> disabled="true">Observaciones 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_etapa_14[]" <?php echo $observaciones_etapa_14_opcion_3 ?> disabled="true">Observaciones 3
								  </label>
								</div>
																							 								 							   							 
								 <div class="form-group">
								<label for="observaciones_corregidas">Observaciones Corregidas</label>
								 <br>
									<?php $observaciones_corregidas_etapa_14_opcion_1 = ""; ?>
									<?php $observaciones_corregidas_etapa_14_opcion_2 = ""; ?>
									<?php $observaciones_corregidas_etapa_14_opcion_3 = ""; ?>
									<?php $array = explode(",", $observaciones_corregidas_etapa_14);?>
									<?php for ($i=0;$i<count($array);$i++) { ?>
									<?php if($array[$i] == "1" ){$observaciones_corregidas_etapa_14_opcion_1 = "checked";} ?>
									<?php if($array[$i] == "2" ){$observaciones_corregidas_etapa_14_opcion_2 = "checked";} ?>
									<?php if($array[$i] == "3" ){$observaciones_corregidas_etapa_14_opcion_3 = "checked";} ?>
									<?php } ?>	
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_corregidas_etapa_14[]" <?php echo $observaciones_corregidas_etapa_14_opcion_1 ?> disabled="true">Observaciones Corregidas 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_corregidas_etapa_14[]" <?php echo $observaciones_corregidas_etapa_14_opcion_2 ?> disabled="true">Observaciones Corregidas 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_corregidas_etapa_14[]" <?php echo $observaciones_corregidas_etapa_14_opcion_3 ?> disabled="true">Observaciones Corregidas 3
								  </label>
								  </div>
								  
								</div>
								</div>
								
								</form>
								
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 15 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_15?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_15" name="formulario_etapa_15">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="15" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_15 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_15 ?></a></p>
								  </div>
								  
								   <div class="form-group">								 
								   	<label>
										<?php $recepcion_provisoria_etapa_15_checkeada = ""; ?>
										<?php if($recepcion_provisoria_etapa_15 == "1") {$recepcion_provisoria_etapa_15_checkeada = "checked";} ?>
										
											<input type="checkbox" name="recepcion_provisoria_etapa_15" <?php echo $recepcion_provisoria_etapa_15_checkeada ?> disabled="true"> Recepción Provisoria
									</label>
								  </div>
								  
								</div>

								<div class="col-md-6">								
								
								 <div class="form-group">
									<label for="fecha_de_recepcion_provisoria">Fecha de Recepción Provisoria</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_recepcion_provisoria_etapa_15"  value="<?php echo $fecha_de_recepcion_provisoria_etapa_15 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								 </div>
							  
								</div>
								</div>	
								
								</form>
								
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 16 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_16?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_16" name="formulario_etapa_16">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="16" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_16 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_16 ?></a></p>
								  </div>
								  						 
									 <div class="form-group">
									<label for="itemizado_generico_nombre">Itemizado Genérico</label>
								  </div>
								 
								  <div class="col-md-6">
								 <div class="form-group">
									<label for="itemizado_generico_nombre">Nombre</label>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre1_etapa_16" name="itemizado_generico_nombre1_etapa_16" value="<?php echo $itemizado_generico_nombre1_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre2_etapa_16" name="itemizado_generico_nombre2_etapa_16" value="<?php echo $itemizado_generico_nombre2_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre3_etapa_16" name="itemizado_generico_nombre3_etapa_16" value="<?php echo $itemizado_generico_nombre3_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre4_etapa_16" name="itemizado_generico_nombre4_etapa_16" value="<?php echo $itemizado_generico_nombre4_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre5_etapa_16" name="itemizado_generico_nombre5_etapa_16" value="<?php echo $itemizado_generico_nombre5_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre6_etapa_16" name="itemizado_generico_nombre6_etapa_16" value="<?php echo $itemizado_generico_nombre6_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre7_etapa_16" name="itemizado_generico_nombre7_etapa_16" value="<?php echo $itemizado_generico_nombre7_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre8_etapa_16" name="itemizado_generico_nombre8_etapa_16" value="<?php echo $itemizado_generico_nombre8_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre9_etapa_16" name="itemizado_generico_nombre9_etapa_16" value="<?php echo $itemizado_generico_nombre9_etapa_16 ?>" disabled="disabled"/>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre10_etapa_16" name="itemizado_generico_nombre10_etapa_16" value="<?php echo $itemizado_generico_nombre10_etapa_16 ?>" disabled="disabled"/>
									</div>
									</div>
								  </div>
								 
								 <div class="col-md-6">
								 <div class="form-group">
								 <label for="itemizado_generico_nombre">Fecha de Garantía</label>
										<div class="form-group">
											<input type="text" name="itemizado_generico1_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico1_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico2_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico2_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico3_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico3_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico4_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico4_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico5_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico5_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico6_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico6_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico7_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico7_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico8_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico8_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico9_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico9_etapa_16 ?>" disabled="disabled"/>
										</div>
										<div class="form-group">
											<input type="text" name="itemizado_generico10_etapa_16" class="form-control datepicker" value="<?php echo $itemizado_generico10_etapa_16 ?>" disabled="disabled"/>
										</div>
									</div>
								</div>
								</div>
								
								<div class="col-md-6">
								
								<div class="form-group">
									<label>
									<?php $boleta_periodo_garantia_contratista_etapa_16_checkeada = ""; ?>
									<?php if($boleta_periodo_garantia_contratista_etapa_16 == "1") {$boleta_periodo_garantia_contratista_etapa_16_checkeada = "checked";} ?>
									
										<input type="checkbox" name="boleta_periodo_garantia_contratista_etapa_16" <?php echo $boleta_periodo_garantia_contratista_etapa_16_checkeada ?> disabled="true"> Boleta Periodo Garantía Contratista
									</label>
								</div>
								</div>
								</div>	

								</form>
								
								  </div>
							</div>	
							</div>
							</div>
							
							<!-- etapa 17 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_17?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_17" name="formulario_etapa_17">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="17" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_17 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_17 ?></a></p>
								  </div>
								  								  								  						 
								 <div class="form-group">								 
									<label>									
									<?php $acta_de_capacitacion_etapa_17_checkeada = ""; ?>
									<?php if($acta_de_capacitacion_etapa_17 == "1") {$acta_de_capacitacion_etapa_17_checkeada = "checked";} ?>
									
										<input type="checkbox" name="acta_de_capacitacion_etapa_17" <?php echo $acta_de_capacitacion_etapa_17_checkeada ?> disabled="true"> Acta de Capacitación
									</label>
								 </div>
								 
								 </div>
								 
								 <div class="col-md-6">
								  <div class="form-group">
									<label for="fecha_de_capacitacion">Fecha de Capacitación</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="fecha_de_capacitacion_etapa_17" value="<?php echo $fecha_de_capacitacion_etapa_17 ?>" disabled="disabled"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								 </div>
								 
								</div>
							
								</div>
								</div>
								</form>
								
							  </div>
							</div>	
							</div>
							
							<!-- etapa 18 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_18?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_18" name="formulario_etapa_18">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="18" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_18 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_18 ?></a></p>
								  </div>
								 
								 <div class="form-group">								 
									<label>									
									<?php $entrega_manuales_equipos_etapa_18_checkeada = ""; ?>
									<?php if($entrega_manuales_equipos_etapa_18 == "1") {$entrega_manuales_equipos_etapa_18_checkeada = "checked";} ?>
									
										<input type="checkbox" id="entrega_manuales_equipos_etapa_18" name="entrega_manuales_equipos_etapa_18" <?php echo $entrega_manuales_equipos_etapa_18_checkeada ?> disabled="true"> Entrega Manuales Equipos
									</label>
								 </div>
								 
								 </div>
								 
								 <div class="col-md-6">
								 
								  <div class="form-group">
									<label>
									<?php $acta_de_garantia_y_postventa_etapa_18_checkeada = ""; ?>
									<?php if($acta_de_garantia_y_postventa_etapa_18 == "1") {$acta_de_garantia_y_postventa_etapa_18_checkeada = "checked";} ?>
									
										<input type="checkbox" id="acta_de_garantia_y_postventa_etapa_18" name="acta_de_garantia_y_postventa_etapa_18" <?php echo $acta_de_garantia_y_postventa_etapa_18_checkeada ?> disabled="true"> Acta de Garantía y Postventa
									</label>
								 </div>
								 
								</div>
								</div>
								</div>	
								</form>
								
							
								
								  </div>
							</div>	
							</div>
							
							<!-- etapa 19 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_19?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_19" name="formulario_etapa_19">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="19" />
									<label for="adjuntar_archivo">Archivo adjuntado</label>
									<p class="help-block"><a href="<?php echo base_url().'uploads/'.$adjuntar_archivo_etapa_19 ?>" target="_blank"><?php echo $adjuntar_archivo_etapa_19 ?></a></p>
								  </div>
								 
								 <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora_etapa_19" name="bitacora_etapa_19" readonly><?php echo $bitacora_etapa_19 ?></textarea>
								  </div>
								
								</div>
								
								 <div class="col-md-6">
								 
								 <div class="form-group">
									<label>
									<?php $archivos_fotograficos_etapa_19_checkeada = ""; ?>
									<?php if($archivos_fotograficos_etapa_19 == "1") {$archivos_fotograficos_etapa_19_checkeada = "checked";} ?>
									
										<input type="checkbox" name="archivos_fotograficos_etapa_19" <?php echo $archivos_fotograficos_etapa_19_checkeada ?>  disabled="true"> Archivos fotográficos
									</label>
								 </div>

								</div>
								</div>
								</div>
								</form>
								  </div>
							</div>	
							</div>
							
							<!-- etapa 20 -->
							
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?=$titulo_etapa_20?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_19" name="formulario_etapa_19">
								
								<div class="row">
								
								<div class="col-md-6">
								
								 
								 <div class="form-group">								 
									<label>
									<?php $cuadro_check_acta_recepcion_definitiva_etapa_20_checkeada = ""; ?>
									<?php if($cuadro_check_acta_recepcion_definitiva_etapa_20 == "1") {$cuadro_check_acta_recepcion_definitiva_etapa_20_checkeada = "checked";} ?>									
										<input type="checkbox" name="cuadro_check_acta_recepcion_definitiva_etapa_20" <?php echo $cuadro_check_acta_recepcion_definitiva_etapa_20_checkeada ?>  disabled="true"> Acta Recepción Definitiva
									</label>
								 </div>
	
								</div>
							 
								</div>
								</div>
								</form>
					
								  </div>
							</div>	
							</div>
							
							
						</div>
						</div>
					</div>
					</div>
					</div>
					</div>