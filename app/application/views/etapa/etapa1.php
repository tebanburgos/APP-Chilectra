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
								<form role="form" action="<?php echo site_url('etapa_v2/ingreso_proyecto').'/'.$this->uri->segment(3); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="formulario_etapa_1" name="formulario_etapa_1">
								<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
									<input type="hidden" name="etapa_v2_id" value="1" />
								    <label for="nombre_del_proyecto">Nombre del Proyecto</label>
									<input type="text" class="form-control" id="nombre_del_proyecto" name="nombre_del_proyecto" placeholder="Escribir aquí..." required>
								  </div>
								  <div class="form-group">
									<label for="cliente">Cliente</label>
									<input type="text" class="form-control" id="cliente" name="cliente" placeholder="Escribir aquí..." required>
								  </div>
								  <div class="form-group">
									<label for="tipo_de_proyecto">Tipo de Proyecto</label>
									<input type="text" class="form-control" id="tipo_de_proyecto" name="tipo_de_proyecto" placeholder="Escribir aquí..." required>
								  </div>
								  <div class="form-group">
									<label for="linea_de_negocio">Linea de Negocio</label>
									<input type="text" class="form-control" id="linea_de_negocio" name="linea_de_negocio" placeholder="Escribir aquí..."required>
								  </div>
								  
								  <div class="form-group">
									 <label for="adjuntar_archivo">Adjuntar un archivo</label>
									 <input type="file" id="adjuntar_archivo" name="adjuntar_archivo" required>
									 <p class="help-block">Documentos PNG, JPG, DOC, PDF.</p>
								 </div>       
						  	</div>
								
								
								
								<div class="col-md-6">
								
								  <div class="form-group">
									<label for="direccion">Dirección</label>
									<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escribir aquí..." required>
								  </div>
								  <div class="form-group">
									<label for="telefono">Teléfono</label>
									<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ej: 2- 2255 3344" onkeypress="javascript:return validarNro(event)" required>
								  </div>
								  <div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Ej: usuario@chilectra.cl" required>
								  </div>
								  <div class="form-group">
									<label for="bitacora">Bitácora</label>
									<textarea class="form-control" rows="3" id="bitacora" name="bitacora" placeholder="Escribir aquí..." required></textarea>
								  </div>
								  <div class="form-group">
									<label for="rut">Rut</label>
									<input type="text" class="form-control" id="rut" name="rut" placeholder="Ej: 12.345.678-K" required>
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
								if(key == 32 || key == 8 || key == 45 ) // Detectar espacio, y backspace (retroceso) y - (guión)
									{ return true; }
								else 
									{ return false; }
							}
						return true;

					}

					</script>
								
								
							</div>
								
								  </div>
							</div>	
							</div>
							</div>
						</div>
					</div>