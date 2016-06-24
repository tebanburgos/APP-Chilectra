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
								<form role="form" action="<?php echo site_url('etapa_v2/ingenieria_de_detalle/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_10" name="formulario_etapa_10">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="10" />
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo (Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias" name="ingreso_de_plazo_en_dias" placeholder="1" onkeypress="javascript:return validarNro(event)" required>
								  </div>
								  
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir aquí..." required></textarea>
								  </div>
								  
								</div>
								 						 
								  <div class="col-md-6">
								
								  <div class="form-group">							  
								  <label for="ingenieria_de_detalle_aprobada">Ingeniería de Detalle Aprobada</label>
								  <br>
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="ingenieria_de_detalle_aprobada[]" >
										<input type="checkbox" name="ingenieria_de_detalle_aprobada[]" value="1">Ingeniería de Detalle Aprobada 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="ingenieria_de_detalle_aprobada[]" value="2">Ingeniería de Detalle Aprobada 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="ingenieria_de_detalle_aprobada[]" value="3">Ingeniería de Detalle Aprobada 3
								  </label>
								  </div>
						
								  
								  <div class="form-group">
								  <label for="memoria_de_calculo">Memoria de Cálculo</label>
								  <br>
								   <label class="checkbox-inline">
										<input type="hidden" value="0" name="memoria_de_calculo[]" >
										<input type="checkbox" name="memoria_de_calculo[]" value="1">Memoria de Cálculo 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="memoria_de_calculo[]" value="2">Memoria de Cálculo 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="memoria_de_calculo[]" value="3">Memoria de Cálculo 3
								  </label>
								  </div>
								 
								 <div class="form-group">
								 <label for="aprobacion_emplazamiento">Aprobación Emplazamiento</label>
								  <br>
								  <div class="checkbox">
									<label>
										<input type="hidden" value="0" name="aprobacion_emplazamiento" >
										<input type="checkbox" name="aprobacion_emplazamiento" value="1" > Aprobación Emplazamiento
									</label>
								  </div>
								 </div>
								  
								<button type="submit" class="btn btn-primary">Enviar</button> 
								  
								</div>
								
								
								
								
								
								</form>
								
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