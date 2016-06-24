					<div class="row">
						<div class="col-md-12">
							<img style="margin-top:-22px; margin-bottom: 15px;" src="<?php echo base_url('assets/img/banner.jpg'); ?>" class="img-responsive">
						</div>
						<?php if ( $mensaje): ?>
						<div class="col-md-12">
							<?php mostrar_mensaje($mensaje, $mensaje_clase); ?>
						</div>
						<?php endif; ?>
						<div class="col-md-12">
							<?php $this->load->view('widgets/mis_tareas'); ?>
						</div>						
						<!--<div class="col-md-12">
							<?php // $this->load->view('widgets/ultimos_proyectos'); ?>
						</div>					
						<div class="col-md-12">
							<?php // $this->load->view('widgets/actividad_reciente'); ?>
						</div>-->
					</div>
