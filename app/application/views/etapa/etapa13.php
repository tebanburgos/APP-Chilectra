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
								<form role="form" action="<?php echo site_url('etapa_v2/puesta_en_marcha_del_sistema/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_13" name="formulario_etapa_13">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="13" />
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>
								  
								<div class="form-group">
								
								<label for="anexo_SEC">Anexo SEC</label>
								<br>
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="anexo_SEC[]" >
										<input type="checkbox" name="anexo_SEC[]" value="1">Anexo SEC 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="anexo_SEC[]" value="2">Anexo SEC 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="anexo_SEC[]" value="3">Anexo SEC 3
								  </label>
								</div>
								 
								 <div class="form-group">
								 <label for="pruebas_operaciones">Pruebas Operacionales</label>
								<br>
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="pruebas_operaciones[]" >
										<input type="checkbox" name="pruebas_operaciones[]" value="1">Pruebas Operacionales 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="pruebas_operaciones[]" value="2">Pruebas Operacionales 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="pruebas_operaciones[]" value="3">Pruebas Operacionales 3
								  </label>
								</div>
								
								</div>
								
								<div class="col-md-6">
																							 								 							   							 
								 <div class="form-group">
								<label for="registro_fotografico">Registro Fotográfico</label>
								<br>								 
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="registro_fotografico[]" >
										<input type="checkbox" name="registro_fotografico[]" value="1">Registro Fotográfico 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico[]" value="2">Registro Fotográfico 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="registro_fotografico[]" value="3">Registro Fotográfico 3
								  </label>
								  </div>
								 								 
								  <div class="form-group">
									<label for="fecha_de_puesta_en_marcha">Fecha de Puesta en Marcha</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="date" required/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
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