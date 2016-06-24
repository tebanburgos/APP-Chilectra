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
								<form role="form" action="<?php echo site_url('etapa_v2/adquisicion_de_equipos_y_productos/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_9" name="formulario_etapa_9">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="hidden" name="etapa_v2_id" value="9" />
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>
								  
								   <div class="form-group">
									<label for="ingreso_de_plazo_en_dias">Ingreso de Plazo (Días)</label>
									<input type="number" min="0" class="form-control" id="ingreso_de_plazo_en_dias" name="ingreso_de_plazo_en_dias" placeholder="1" onkeypress="javascript:return validarNro(event)" required>
								  </div>
								  
								</div>
								 						 
								  <div class="col-md-6">
								
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir aquí..." required></textarea>
								  </div>
								 
								  <div class="form-group">							  
								  <label for="email_adquisicion">E-mail Adquisición</label>
								  <br>
								  <label class="checkbox-inline">
										<input type="hidden" value="0" name="email_adquisicion[]" >
										<input type="checkbox" name="email_adquisicion[]" value="1"> E-mail Adquisición 1
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="email_adquisicion[]" value="2"> E-mail Adquisición 2
								  </label>
								  <label class="checkbox-inline">
										<input type="checkbox" name="email_adquisicion[]" value="3"> E-mail Adquisición 3
								  </label>
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
								
								<script type="text/javascript">
								function valores(f, cual) {
									todos = new Array();
									for (var i = 0, total = f[cual].length; i < total; i++)
										if (f[cual][i].checked) todos[todos.length] = f[cual][i].value;
									return todos.join(".");
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