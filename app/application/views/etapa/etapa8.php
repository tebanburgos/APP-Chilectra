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
								<form role="form" action="<?php echo site_url('etapa_v2/entrega_de_terreno/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_8" name="formulario_etapa_8">
								
									<div class="row">
										<div class="col-md-6">		
								
											<div class="form-group">
												<input type="hidden" name="etapa_v2_id" value="8" />
												<label for="fecha_de_inicio"><span class="glyphicon glyphicon-calendar"></span> Fecha de Inicio</label>
										<!--	<div class="input-group input-append date" id="dateRangePicker" name="fecha_de_inicio">
												<input type="text" class="form-control" id="dateRangePicker" name="date" />
												<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>  
												</div> -->
												<input type="text" name="date" id="date" class="form-control datepicker" required>
										<!--	<input type="date" class="form-control" name="date"> -->
											</div> 
								  						  
											<div class="form-group">
												<label for="adjuntar_archivo">Adjuntar un archivo</label>
												<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
												<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
											</div>
											
										</div>
								  
								  <div class="col-md-6">
								 
									<div class="form-group">
										<label for="fecha_de_acta_de_entrega"><span class="glyphicon glyphicon-calendar"></span> Fecha de Acta de Entrega</label>
								<!--	<div class="input-group input-append date" id="dateRangePicker1" name="fecha_de_acta_de_entrega">
										<input type="text" class="form-control" id="dateRangePicker1" name="date2" /> 
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span> 
										</div> -->
										<input type="text" name="date2" id="date2" class="form-control datepicker" required>
								<!--	<input type="date"  class="form-control" name="date2"> -->
									</div>
								
									<div class="form-group">
										<label for="bitacora">Bitácora</label>
										<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir Aquí..." onfocus="validar()" required></textarea>
									</div>
								 
									<div class="form-group">
											<label>
												<input type="hidden" value="0" name="check_se_adjunta_entrega_de_terreno" >
												<input type="checkbox" name="check_se_adjunta_entrega_de_terreno" value="1" required> Se Adjunta Entrega de Terreno
											</label>
									</div>
								 
									<div class="form-group">
											<label>
												<input type="hidden" value="0" name="check_boleta_garantia_ejecucion_contratista" >
												<input type="checkbox" name="check_boleta_garantia_ejecucion_contratista" value="1" required> Boleta Garantía Ejecución Contratista
											</label>
									</div>
								  
									<button type="submit" class="btn btn-primary">Enviar</button> 
								  
									</div>
								

								</form>
								<div>
							<!--	<button onclick="validar()">Validar</button> -->
								</div>
								<script>
								function validar() {
									var inicio = document.getElementById('date').value;
									var termino = document.getElementById('date2').value;
									if(inicio > termino)
									{  alert("La Fecha de Inicio no debe superar a la Fecha de Acta de Entrega. "); }
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
								
								<script>
									$(document).ready(function() {
										$('#dateRangePicker1')
											.datepicker({
												format: 'dd/mm/yyyy',
												startDate: '01/01/2010',
												endDate: '12/30/2020'
											})
											.on('changeDate', function(e) {
												// Revalidate the date field
												$('#dateRangeForm1').formValidation('revalidateField', 'date');
											});

										$('#dateRangeForm1').formValidation({
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
									
									<script>
									$(document).ready(function() {
										$('#dateRangePicker1')
											.datepicker({
												format: 'dd/mm/yyyy',
												startDate: '01/01/2010',
												endDate: '12/30/2020'
											})
											.on('changeDate', function(e) {
												// Revalidate the date field
												$('#dateRangeForm').formValidation('revalidateField', 'date');
											});

										$('#dateRangeForm1').formValidation({
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