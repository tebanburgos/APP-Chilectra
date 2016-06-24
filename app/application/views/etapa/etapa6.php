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
								<form role="form" action="<?php echo site_url('etapa_v2/etapa_de_negociacion/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_6" name="formulario_etapa_6">
								
								<div class="row">
								 
								<div class="col-md-6">
								
								 <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="6" />
									<label for="fecha_de_inicio">Fecha de Inicio</label>
									<div class="input-group input-append date" id="dateRangePicker">
										<input type="text" class="form-control" name="date" required/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								  </div>
								  						  
								  <div class="form-group">
									<label for="adjuntar_archivo">Adjuntar un archivo</label>
									<input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									<p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								  </div>  
								  
								 </div>

								 <div class="col-md-6">
								
								 
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir aquí..." required></textarea>
								  </div>
								  
								  
								<input name="terminar_proyecto" type="hidden" id="terminar_proyecto" value="terminar_proyecto" />
								<?php $proyecto_id = $this->uri->segment(3); ?>
								<button type="submit" class="btn btn-primary">Enviar</button> 
								  
								  </div>
								
							
								</form>
								
								<script>
								function terminar(proyecto_id)
								{
									
									bootbox.confirm('¿Está seguro de terminar el proyecto? <br>Al hacerlo, no podrá volver atrás. ', function(result){
								if ( result)
								{
									jQuery.ajax({
										dataType: 'json',
										type: 'post',
										url: '<?php echo site_url("etapa_v2/terminar_proyecto/"); ?>/'+proyecto_id
									});
									window.location.href = '<?php echo site_url("/escritorio/index/"); ?>';
									window.location.href = '<?php echo site_url("etapa_v2/mensaje_fin_de_proyecto"); ?>/'+proyecto_id;

								}
								else return;
								});
								
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
						
						
						
						
						
						<div class="col-md-12">
							<div class="panel panel-default colorfondo">

							<div class="panel-body">
													
							<div class="row">
							  <div class="col-md-12">	
																
								<div class="row">
								 
								 <div class="col-md-12">
								 
								<input name="terminar_proyecto" type="hidden" id="terminar_proyecto" value="terminar_proyecto" />
								  <button type="submit" class="btn btn-success" id="boton_terminar_proyecto" onclick="terminar(<?php echo $proyecto_id ?>);" >Terminar Proyecto</button>
								
								  </div>
								
							</div>
								
								  </div>
							</div>	
							</div>
							</div>
						</div>
					</div>