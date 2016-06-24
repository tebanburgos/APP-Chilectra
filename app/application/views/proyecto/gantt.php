<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Carta Gantt</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">
		<link href="<?php echo base_url('assets/gantt.css'); ?>" rel="stylesheet">
		<style type="text/css">
			body {
				font-family: Helvetica, Arial, sans-serif;
				font-size: 13px;
				padding: 0 0 50px 0;
			}
			.contain {
				width: 800px;
				margin: 0 auto;
			}
			h1 {
				margin: 40px 0 20px 0;
			}
			h2 {
				font-size: 1.5em;
				padding-bottom: 3px;
				border-bottom: 1px solid #DDD;
				margin-top: 50px;
				margin-bottom: 25px;
			}
			table th:first-child {
				width: 150px;
			}
      /* Bootstrap 3.x re-reset */
      .fn-gantt *,
      .fn-gantt *:after,
      .fn-gantt *:before {
        -webkit-box-sizing: content-box;
           -moz-box-sizing: content-box;
                box-sizing: content-box;
      }

.fn-gantt .leftPanel {
	width: 405px;
}
.fn-gantt .leftPanel .fn-wide, .fn-gantt .leftPanel .fn-wide .fn-label {
    width: 405px;
}
.fn-gantt .leftPanel .fn-label {
	width: 200px;
}
.fn-gantt .leftPanel .desc, .fn-gantt .leftPanel .name {
	width: 202px;
}
     
		</style>

<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery.fn.gantt.js'); ?>"></script>


    </head>
    <body>
    	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><img src="<?php echo base_url('assets/img/logo-app.png'); ?>"> Carta Gantt: <strong><?php echo $nombre; ?></strong></h2>
				<div id="gantt" class="gantt"></div>
			</div>
		</div>
		</div>

								
<script>
	datos = [{
	name: "PROYECCIÓN",
	desc: " ",
	values: [{
		to: "/Date(<?php echo $fecha_termino_proyectada; ?>)/",
		from: "/Date(<?php echo $fecha_inicio_proyectada; ?>)/",
		desc: "Tiempo esperado según proyección",
		label: "Tiempo proyectado",
		customClass: "ganttGreen"
		}]
	},
	<?php // $this->output->enable_profiler(true); ?>
	<?php $procesos = $this->db->join('etapas_v2', 'procesos_v2.etapa_v2_id = etapas_v2.etapa_v2_id', 'inner')->join('proyectos', 'procesos_v2.proyecto_id = proyectos.proyecto_id', 'inner')->order_by('etapas_v2.etapa_v2_id', 'asc')->get_where('procesos_v2', array('procesos_v2.proyecto_id' => $this->uri->segment(3))); ?>
	<?php if ( $procesos->num_rows() > 0): ?>
	<?php foreach($procesos->result() as $t): ?>	
	{
	name: "<?php echo $t->etapa_v2_nombre; ?>",
	desc: " <?php // echo $t->etapa_v2_nombre; ?>",
	values: [{
			to: "/Date(<?php echo $t->fecha_de_inicio*1000; ?>)/",
			from: "/Date(<?php echo $t->fecha_de_termino*1000; ?>)/",
			desc: "<?php echo $t->etapa_v2_nombre; ?>",
			label: "<?php echo $t->etapa_v2_nombre; ?>",
			customClass: "ganttRed"			
		}]
	},
	<?php endforeach; ?>
	<?php endif; ?>	
	
	
	];
	$("#gantt").gantt({
		source: datos,
		scale: "days",
		minScale: "days",
		maxScale: "months",
		itemsPerPage: 50,
		waitText: 'Por favor espere un momento...'
	});
</script>			
</body>
</html>		