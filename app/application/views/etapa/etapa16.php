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
								<form role="form" action="<?php echo site_url('etapa_v2/inicio_de_la_etapa_de_garantia/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_16" name="formulario_etapa_16">
								
								<div class="row">
								
								<div class="col-md-6">
								 
															  						  
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="16" />
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>
								  						 
									 <div class="form-group">
									<label for="itemizado_generico_nombre">Itemizado Genérico</label>
								  </div>
								 
								 <div class="col-md-6">
								 <div class="form-group">
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
								  
								  <div class="col-md-6">
								   <div class="form-group">
									<label for="itemizado_generico_nombre"><span class="glyphicon glyphicon-calendar"></span> Garantía</label>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico1" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico1"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico1" class="form-control datepicker" required>	
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico2" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico2"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico2" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico3" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico3"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico3" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico4" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico4"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico4" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico5" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico5"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico5" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico6" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico6"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico6" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico7" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico7"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico7" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico8" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico8"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico8" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico9" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico9"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico9" class="form-control datepicker">
										</div>
							<!--		<div class="input-group input-append date" id="dateRangePicker">
											<input type="text" class="form-control" name="itemizado_generico10" />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> -->
							<!--		<input type="date" class="form-control" name="itemizado_generico10"> -->
										<div class="form-group">
											<input type="text" name="itemizado_generico10" class="form-control datepicker">
										</div>
								</div>		
								</div>
								</div>
								
								<div class="col-md-6">
								
								<div class="form-group">
								  <label>
										<input type="hidden" value="0" name="boleta_periodo_garantia_contratista" >
										<input type="checkbox" name="boleta_periodo_garantia_contratista" value="1" > Boleta Periodo Garantía Contratista
									</label>
								 </div>
								 
								 <button type="submit" class="btn btn-primary">Enviar</button> 
									
								</div>
							 
												  
							  
								</div>
								
								
								
								
								
								</form>
								
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