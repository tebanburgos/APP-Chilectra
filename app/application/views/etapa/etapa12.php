<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>


<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<style type="text/css">
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#dateRangeForm .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-building-o"></i> <?=$titulo?></h3>
							</div>
							<div class="panel-body">
								
								
													
							<div class="row">
							  <div class="col-md-12">	
								<form role="form" action="<?php echo site_url('etapa_v2/instalacion_de_equipos/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_12" name="formulario_etapa_12">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="12" />
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo(Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias" name="ingreso_de_plazo_en_dias" placeholder="1"  onkeypress="javascript:return validarNro(event)" required>
								  </div>
								 
								 
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir aquí..." required></textarea>
								  </div>
								  
								 </div>
								
								

								 <div class="col-md-6">
								 
								 <div class="form-group">
									<label for="itemizado_generico_nombre">Itemizado Genérico</label>
									<p>Nota: asegúrese que de la Fecha de Inicio no sea superior a la Fecha de Término. </p>
								  </div>
								 
									<div class="form-group">
									<div class="col-md-4">
									<label for="itemizado_generico_nombre">Nombre</label>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre1" name="itemizado_generico_nombre1" placeholder="Escribir aquí..." required>
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre2" name="itemizado_generico_nombre2" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre3" name="itemizado_generico_nombre3" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre4" name="itemizado_generico_nombre4" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre5" name="itemizado_generico_nombre5" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre6" name="itemizado_generico_nombre6" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre7" name="itemizado_generico_nombre7" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre8" name="itemizado_generico_nombre8" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre9" name="itemizado_generico_nombre9" placeholder="Escribir aquí...">
									</div>
									<div class="form-group">
									<input type="text" class="form-control" id="itemizado_generico_nombre10" name="itemizado_generico_nombre10" placeholder="Escribir aquí...">
									</div>
									</div>
								  </div>
								 
								 <div class="form-group">
									<div class="col-md-4">
									<label for="Fecha_de_inicio"><span class="glyphicon glyphicon-calendar"></span> Fecha de Inicio</label>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico1" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico1"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico1" id ="itemizado_generico1" class="form-control datepicker" required>	
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico2" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico2"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico2" id="itemizado_generico2" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico3" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico3"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico3" id="itemizado_generico3" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico4" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico4"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico4" id="itemizado_generico4" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico5" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico5"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico5" id="itemizado_generico5" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico6" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico6"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico6" id="itemizado_generico6" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico7" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico7"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico7" id="itemizado_generico7" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico8" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico8"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico8" id="itemizado_generico8" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico9" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico9"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico9" id="itemizado_generico9" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico10" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico10"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico10" id="itemizado_generico10" class="form-control datepicker">
										</div>
									</div>
									<div class="col-md-4">
									<label for="Fecha_de_termino"><span class="glyphicon glyphicon-calendar"></span> Fecha de Término</label>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico11" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico11"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico11" id="itemizado_generico11" class="form-control datepicker" onblur="validarFila1()" required>
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico12" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico12"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico12" id="itemizado_generico12" class="form-control datepicker" onblur="validarFila2()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico13" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico13"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico13" id="itemizado_generico13" class="form-control datepicker"onblur="validarFila3()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico14" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico14"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico14" id="itemizado_generico14" class="form-control datepicker" onblur="validarFila4()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico15" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico15"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico15" id="itemizado_generico15" class="form-control datepicker" onblur="validarFila5()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico16" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico16"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico16" id="itemizado_generico16" class="form-control datepicker" onblur="validarFila6()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico17" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico17"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico17" id="itemizado_generico17" class="form-control datepicker" onblur="validarFila7()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker"> 
											<input type="text" class="form-control" name="itemizado_generico18" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico18"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico18" id="itemizado_generico18" class="form-control datepicker" onblur="validarFila8()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico19" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico19"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico19" id="itemizado_generico19" class="form-control datepicker" onblur="validarFila9()">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico20" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico20"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico20" id="itemizado_generico20" class="form-control datepicker" onblur="validarFila10()">
										</div>
									<br>
								</div>
								 
								 
								 </div>
								
								 <div class="form-group">							  
								  <label for="registro_fotografico">Registro Fotográfico</label>
								  <br>
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="registro_fotografico[]" >
										<input type="checkbox" name="registro_fotografico[]" value="1"> Registro Fotográfico 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico[]" value="2"> Registro Fotográfico 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico[]" value="3"> Registro Fotográfico 3
								  </label>
								  </div>
								 
								<div class="form-group">
									<label>
										<input type="hidden" value="0" name="ipal" >
										<input type="checkbox" id="ipal" value="1" name="ipal" > IPAL
									</label>
								 </div>
								  
								<button type="submit" class="btn btn-primary">Enviar</button> 
								  
								</div>
								
								
								
								
								
								</form>
								
								<script>
								function validarFila1() {
									var inicio = document.getElementById('itemizado_generico1').value;
									var termino = document.getElementById('itemizado_generico11').value;
									if(inicio > termino)
										{  alert("En la 1ra fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila2() {
									var inicio = document.getElementById('itemizado_generico2').value;
									var termino = document.getElementById('itemizado_generico12').value;
									if(inicio > termino)
										{  alert("En la 2da fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila3() {
									var inicio = document.getElementById('itemizado_generico3').value;
									var termino = document.getElementById('itemizado_generico13').value;
									if(inicio > termino)
										{  alert("En la 3ra fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila4() {
									var inicio = document.getElementById('itemizado_generico4').value;
									var termino = document.getElementById('itemizado_generico14').value;
									if(inicio > termino)
										{  alert("En la 4ta fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila5() {
									var inicio = document.getElementById('itemizado_generico5').value;
									var termino = document.getElementById('itemizado_generico15').value;
									if(inicio > termino)
										{  alert("En la 5ta fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila6() {
									var inicio = document.getElementById('itemizado_generico6').value;
									var termino = document.getElementById('itemizado_generico16').value;
									if(inicio > termino)
										{  alert("En la 6ta fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila7() {
									var inicio = document.getElementById('itemizado_generico7').value;
									var termino = document.getElementById('itemizado_generico17').value;
									if(inicio > termino)
										{  alert("En la 7ma fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila8() {
									var inicio = document.getElementById('itemizado_generico8').value;
									var termino = document.getElementById('itemizado_generico18').value;
									if(inicio > termino)
										{  alert("En la 8va fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila9() {
									var inicio = document.getElementById('itemizado_generico9').value;
									var termino = document.getElementById('itemizado_generico19').value;
									if(inicio > termino)
										{  alert("En la 9va fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								function validarFila10() {
									var inicio = document.getElementById('itemizado_generico10').value;
									var termino = document.getElementById('itemizado_generico20').value;
									if(inicio > termino)
										{  alert("En la 10ma fila, la Fecha de Inicio no debe superar a la Fecha de Término."); }
								}
								
								
								</script>

								
									<script language="javascript">

									function validarNro(e) {
									var key;
									if(window.event) // IE
									{
										key = e.keyCode;
									}
									else if(e.which) // Netscape/Firefox/Opera
									{
										key = e.which;
									}
									if (key < 48 || key > 57)
									{
										if(key == 46 || key == 8 || key == 44 ) // Detectar . (punto) y backspace (retroceso) y , (coma)
										{ return true; }
									else 
									{ return false; }
									}
									return true;

					}

					</script>
								
								<script>
									jQuery.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
									jQuery(document).ready(function(){
									jQuery('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
									});
								</script>
								
								<script>
									$(document).ready(function() {
										$('#dateRangePicker')
											.datepicker({
												format: 'dd/mm/yyyy',
												startDate: '01/01/2010',
												endDate: '12/30/2020'
											})
											.on('changeDate', function(e) {
												// Revalidate the date field
												$('#dateRangeForm').formValidation('revalidateField', 'date');
											});

										$('#dateRangeForm').formValidation({
											framework: 'bootstrap',
											icon: {
												valid: 'glyphicon glyphicon-ok',
												invalid: 'glyphicon glyphicon-remove',
												validating: 'glyphicon glyphicon-refresh'
											},
											fields: {
												date: {
													validators: {
														notEmpty: {
															message: 'The date is required'
														},
														date: {
															format: 'MM/DD/YYYY',
															min: '01/01/2010',
															max: '12/30/2020',
															message: 'The date is not a valid'
														}
													}
												}
											}
										});
									});
									</script>
								
							</div>
								
								  </div>
							</div>	
							</div>
							</div>
						</div>
					</div>