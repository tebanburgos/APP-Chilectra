<?php $this->load->view('header'); ?>
			<div class="panel panel-default" style="margin-top: 10px;">
			<div class="panel-body" style="min-height: 600px;">		
			<div class="row">
				<div class="col-md-12">
					<div class="">
						
					</div>
					<nav class="navbar navbar-default menu-principal">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="<?php echo site_url('escritorio'); ?>">
									<img alt="Chilectra" style="margin-top:-10px; margin-right:15px; float:left;" src="<?php echo base_url('assets/img/logo-app.png'); ?>">
									Control de Proyectos
								</a>								
							</div>
							<ul class="nav navbar-nav">
								<li><a href="<?php echo site_url('escritorio'); ?>">Escritorio</a></li>
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Proyectos <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url('proyecto/ingresar'); ?>">Ingresar</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url('proyecto/administrar'); ?>">Administrar</a></li>
							<!--	<?php if ( $this->auth->check('admin')): ?>
									<li class="divider"></li>
									<li><a href="<?php echo site_url('proyecto/revisar'); ?>">Revisar</a></li>
									<?php endif; ?> -->
								</ul>
								</li>
								<?php if ( $this->auth->check('admin')): ?>
								<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administración</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url('opcion/administrar'); ?>">Opciones</a></li>
									<li><a href="<?php echo site_url('usuario/administrar'); ?>">Usuarios</a></li>
									<!--li><a href="<?php echo site_url('etapa/administrar'); ?>">Etapas</a></li>-->
								</ul>
								</li>
								<?php endif; ?>
							</ul>
							<div class="pull-right">
							<form class="navbar-form navbar-left" role="search" style="display: none;">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Buscar proyecto">
								</div>
								<button type="submit" class="btn btn-default">Enviar</button>
							</form>
							<ul class="nav navbar-nav">
								<li><a href="<?php echo site_url('usuario/salir'); ?>">Cerrar sesión <i class="fa fa-sign-out"></i></a></li>
							</ul>
							</div>
						</div>
					</nav>