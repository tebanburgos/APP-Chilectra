<!DOCTYPE html>
<?php $id_html = ( ! $this->auth->check()) ? 'pagina-login' : ''; ?>
<html lang="es" id="<?php echo $id_html; ?>">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chilectra</title>
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/custom-theme/jquery-ui-1.10.0.custom.css'); ?>" rel="stylesheet">
	<!--[if IE]>
	  <link href="<?php echo base_url('assets/custom-theme/jquery.ui.1.10.0.ie.css'); ?>" rel="stylesheet">
	<![endif]-->
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/estilos.css'); ?>" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootbox.min.js'); ?>"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
<!--[if lt IE 8]><link rel="stylesheet" href="css/bootstrap-ie7buttonfix.css"><![endif]-->
<!--[if IE 8]><link rel="stylesheet" href="css/bootstrap-ie8buttonfix.css"><![endif]-->
  </head>
  <body>
	<div class="container">
		<div class="row">