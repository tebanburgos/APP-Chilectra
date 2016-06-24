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
								<form role="form" action="<?php echo site_url('etapa_v2/correccion_de_observaciones/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_14" name="formulario_etapa_14">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="14" />
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>
								  
								  <div class="form-group">
									<label for="plazo_de_correcciones_de_observaciones">Plazo de Corrección de Observaciones</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="date" required/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								 </div>
								
								</div>
								  
								<div class="col-md-6">
								
								 <div class="form-group">
								 <label for="observaciones">Observaciones</label>
								 <br>
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="observaciones[]" >
										<input type="checkbox" name="observaciones[]" value="1">Observaciones 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones[]" value="2">Observaciones 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones[]" value="3">Observaciones 3
								  </label>
								</div>
																							 								 							   							 
								 <div class="form-group">
								<label for="observaciones_corregidas">Observaciones Corregidas</label>
								 <br>								 
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="observaciones_corregidas[]" >
										<input type="checkbox" name="observaciones_corregidas[]" value="1">Observaciones Corregidas 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_corregidas[]" value="2">Observaciones Corregidas 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="observaciones_corregidas[]" value="3">Observaciones Corregidas 3
								  </label>
								  </div>
								 								 
								 								  
								<button type="submit" class="btn btn-primary">Enviar</button> 
								  
								</div>
								
								
								
								
								
								</form>
								
								
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