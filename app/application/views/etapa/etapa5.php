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
								<form role="form" action="<?php echo site_url('etapa_v2/envio_propuesta_cliente/'.$this->uri->segment(3)); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_5" name="formulario_etapa_5">
								
								<div class="row">
								
								<div class="col-md-6">
								  
								 <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="5" />
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
									<label for="margen_propuesto">Margen Propuesto (%)</label>
									<input type="text" class="form-control" id="margen_propuesto" name="margen_propuesto" placeholder="Ej: 10,01" onkeypress="javascript:return validarNro(event)" required>
								  </div>
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir aquí..." required></textarea>
								  </div>
								  
								  <?php $proyecto_id = $this->uri->segment(3); ?>
								  <input name="rechazar" type="hidden" id="rechazar" value="boton_rechazar" />
								  <button type="submit" class="btn btn-primary">Enviar</button>
								  
								</div>
								
								</form>
								
									<script>
						function rechazar(proyecto_id)
						{
							bootbox.confirm('¿Está seguro de rechazar esta etapa? <br> Al hacerlo, el proyecto volverá a la etapa anterior. ', function(result){
								if ( result)
								{
									jQuery.ajax({
										dataType: 'json',
										type: 'post',
										url: '<?php echo site_url("etapa_v2/rechazar_proyecto/"); ?>/'+proyecto_id
									});
									window.location.href = '<?php echo site_url("/escritorio/index/"); ?>';
									window.location.href = '<?php echo site_url("etapa_v2/mensaje_etapa_rechazada"); ?>';
								}
								else return;
							});
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
								
								<input name="boton_rechazar" type="hidden" id="boton_rechazar" value="boton_rechazar" />
								  <button type="submit" class="btn btn-default pull-right" id="boton_rechazar" onclick="rechazar(<?php echo $proyecto_id ?>);" >Rechazar</button>
								  
								</div>
								
								</div>
								
							  </div>
							</div>	
							</div>
							</div>
						</div>
						
					</div>