<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
class Proyecto extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->auth->check()) redirect('usuario/entrar');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('proyecto_model', 'opcion_model'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}
	
	public function index()
	{
		// Nada por defecto
	}
	
	public function administrar()
	{
		$proyecto = $this->proyecto_model->obtener();
		$this->_view('proyecto/administrar_proyecto', array('proyecto' => $proyecto));
	}
	
	public function revisar()
	{
		if ( $this->auth->check('admin')):
		$proyecto = $this->proyecto_model->obtener();
		$this->_view('proyecto/revisar_proyecto', array('proyecto' => $proyecto));
		endif;
	}
	
	
	public function ingresar()
	{
		$data['proyecto_tipo'] = $this->opcion_model->obtener_por_tipo('TIPO_PROYECTO');
		$data['proyecto_linea'] = $this->opcion_model->obtener_por_tipo('LINEA_NEGOCIO');
		$data['proyecto_area'] = $this->opcion_model->obtener_por_tipo('AREA_COMERCIAL');
		if ( $this->form_validation->run('ingresar_proyecto') == FALSE)
		{
			$this->_view('proyecto/ingresar_proyecto', $data);
		}
		else
		{
			if ( $this->proyecto_model->ingresar())
			{
				$this->session->set_flashdata('mensaje', 'Su proyecto ha ingresado satisfactoriamente. <br>Favor de ingresar el resto de la información en el botón Agregar Info.');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar el proyecto');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			}
			redirect('proyecto/administrar');
		}
	}
	
	
	public function etapas_info()
	{
//		$this->output->enable_profiler(true);
			if ( is_numeric($this->uri->segment(3)))
		{
			if ( $this->proyecto_model->existe($this->uri->segment(3)))
			{
				$proyecto_id = $this->uri->segment(3);
				
				// obtención de datos de etapa 1
				
				$nombre_del_proyecto_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "1");
				$cliente_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "2");
				$tipo_de_proyecto_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "3");
				$linea_de_negocio_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "4");
				$adjuntar_archivo_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "5");
				$direccion_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "6");
				$telefono_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "7");
				$email_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "8");
				$bitacora_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "10");
				$rut_etapa_1 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "9");
				
				// obtención de datos de etapa 2
				
				$fecha_de_inicio_etapa_2 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "12");
				$adjuntar_archivo_etapa_2 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "13");
				$contratista_etapa_2 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "14");
				$propuesta_etapa_2 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "15");
				$bitacora_etapa_2 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "17");
				
				// obtención de datos de etapa 3
				
				$fecha_de_inicio_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "18");
				$garantia_equipo_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "23");
				$garantia_instalacion_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "24");
				$adjuntar_archivo_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "19");
				$itemizado_generico_nombre1_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "20");
				$itemizado_generico_nombre2_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "126");
				$itemizado_generico_nombre3_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "127");
				$itemizado_generico_nombre4_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "128");
				$itemizado_generico_nombre5_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "129");
				$itemizado_generico_nombre6_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "130");
				$itemizado_generico_nombre7_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "131");
				$itemizado_generico_nombre8_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "132");
				$itemizado_generico_nombre9_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "133");
				$itemizado_generico_nombre10_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "134");
				$itemizado_generico_costo_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "21");
				$plazo_construccion_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "22");
				$bitacora_etapa_3 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "25");
				
				// obtención de datos de etapa 4
				
				$fecha_de_inicio_etapa_4 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "27");
				$adjuntar_archivo_etapa_4 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "28");
				$margen_etapa_4 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "29");
				$bitacora_etapa_4 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "30");
				
				// obtención de datos de etapa 5
				
				$fecha_de_inicio_etapa_5 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "32");
				$adjuntar_archivo_etapa_5 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "33");
				$margen_propuesto_etapa_5 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "34");
				$bitacora_etapa_5 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "35");
				
				// obtención de datos de etapa 6
				
				$fecha_de_inicio_etapa_6 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "37");
				$adjuntar_archivo_etapa_6 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "38");
				$bitacora_etapa_6 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "39");
				
				// obtención de datos de etapa 7
				
				$fecha_de_inicio_etapa_7 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "41");
				$adjuntar_archivo_etapa_7 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "42");
				$margen_cierre_etapa_7 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "43");
				$bitacora_etapa_7 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "44");
				$check_orden_de_compra_etapa_7 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "45");
				
				// obtención de datos de etapa 8
				
				$fecha_de_inicio_etapa_8 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "46");
				$adjuntar_archivo_etapa_8 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "47");
				$fecha_de_acta_de_entrega_etapa_8 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "48");
				$bitacora_etapa_8 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "49");
				$check_se_adjunta_entrega_de_terreno_etapa_8 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "50");
				$check_boleta_garantia_ejecucion_contratista_etapa_8 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "51");
				
				// obtención de datos de etapa 9
				
				$adjuntar_archivo_etapa_9 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "52");
				$ingreso_de_plazo_en_dias_etapa_9 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "53");
				$bitacora_etapa_9 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "54");
				$email_adquisicion_etapa_9 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "55");
				
				// obtención de datos de etapa 10
				
				$adjuntar_archivo_etapa_10 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "56");
				$ingreso_de_plazo_en_dias_etapa_10 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "57");
				$bitacora_etapa_10 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "58");
				$ingenieria_de_detalle_aprobada_etapa_10 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "59");
				$memoria_de_calculo_etapa_10 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "60");
				$aprobacion_emplazamiento_etapa_10 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "61");
				
				// obtención de datos de etapa 11
				
				$adjuntar_archivo_etapa_11 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "62");
				$ingreso_de_plazo_en_dias_etapa_11 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "63");
				$bitacora_etapa_11 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "64");
				$registro_fotografico_etapa_11 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "65");
				$ipal_etapa_11 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "66");
				
				// obtención de datos de etapa 12
				
				$adjuntar_archivo_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "67");
				$ingreso_de_plazo_en_dias_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "68");
				$bitacora_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "69");
				$itemizado_generico_nombre1_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "135");
				$itemizado_generico_nombre2_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "136");
				$itemizado_generico_nombre3_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "137");
				$itemizado_generico_nombre4_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "138");
				$itemizado_generico_nombre5_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "139");
				$itemizado_generico_nombre6_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "140");
				$itemizado_generico_nombre7_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "141");
				$itemizado_generico_nombre8_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "142");
				$itemizado_generico_nombre9_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "143");
				$itemizado_generico_nombre10_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "144");
				$itemizado_generico1_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "70");
				$itemizado_generico2_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "97");
				$itemizado_generico3_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "98");
				$itemizado_generico4_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "99");
				$itemizado_generico5_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "100");
				$itemizado_generico6_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "101");
				$itemizado_generico7_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "102");
				$itemizado_generico8_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "103");
				$itemizado_generico9_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "104");
				$itemizado_generico10_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "105");
				$itemizado_generico11_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "106");
				$itemizado_generico12_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "107");
				$itemizado_generico13_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "108");
				$itemizado_generico14_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "109");
				$itemizado_generico15_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "110");
				$itemizado_generico16_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "111");
				$itemizado_generico17_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "112");
				$itemizado_generico18_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "113");
				$itemizado_generico19_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "114");
				$itemizado_generico20_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "115");
				$registro_fotografico_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "71");
				$ipal_etapa_12 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "72");
				
				// obtención de datos de etapa 13
				
				$adjuntar_archivo_etapa_13 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "73");
				$anexo_SEC_etapa_13 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "74");
				$pruebas_operaciones_etapa_13 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "75");
				$registro_fotografico_etapa_13 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "76");
				$fecha_de_puesta_en_marcha_etapa_13 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "77");
				
				// obtención de datos de etapa 14
				
				$adjuntar_archivo_etapa_14 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "78");
				$plazo_de_correcciones_de_observaciones_etapa_14 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "79");
				$observaciones_etapa_14 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "80");
				$observaciones_corregidas_etapa_14 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "81");
				
				// obtención de datos de etapa 15
				
				$adjuntar_archivo_etapa_15 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "82");
				$recepcion_provisoria_etapa_15 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "83");
				$fecha_de_recepcion_provisoria_etapa_15 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "84");
				
				// obtención de datos de etapa 16
				
				$adjuntar_archivo_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "85");
				$itemizado_generico_nombre1_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "145");
				$itemizado_generico_nombre2_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "146");
				$itemizado_generico_nombre3_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "147");
				$itemizado_generico_nombre4_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "148");
				$itemizado_generico_nombre5_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "149");
				$itemizado_generico_nombre6_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "150");
				$itemizado_generico_nombre7_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "151");
				$itemizado_generico_nombre8_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "152");
				$itemizado_generico_nombre9_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "153");
				$itemizado_generico_nombre10_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "154");
				$itemizado_generico1_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "86");
				$itemizado_generico2_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "116");
				$itemizado_generico3_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "117");
				$itemizado_generico4_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "118");
				$itemizado_generico5_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "119");
				$itemizado_generico6_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "120");
				$itemizado_generico7_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "121");
				$itemizado_generico8_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "122");
				$itemizado_generico9_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "123");
				$itemizado_generico10_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "124");
				$boleta_periodo_garantia_contratista_etapa_16 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "87");
				
				// obtención de datos de etapa 17
				
				$adjuntar_archivo_etapa_17 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "88");
				$acta_de_capacitacion_etapa_17 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "89");
				$fecha_de_capacitacion_etapa_17 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "90");
								
				// obtención de datos de etapa 18
				
				$adjuntar_archivo_etapa_18 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "91");
				$entrega_manuales_equipos_etapa_18 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "92");
				$acta_de_garantia_y_postventa_etapa_18 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "93");
				
				// obtención de datos de etapa 19
				
				$adjuntar_archivo_etapa_19 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "94");
				$bitacora_etapa_19 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "95");
				$archivos_fotograficos_etapa_19 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "96");
				
				// obtención de datos de etapa 20
				
				$cuadro_check_acta_recepcion_definitiva_etapa_20 = $this->proyecto_model->obtener_campos_de_las_etapas($proyecto_id, "125");

				
				if ( $this->form_validation->run('proyecto/etapas_info_proyecto') == FALSE)
				{
					// inclusión de datos en la vista - etapa 1
				 	$data['titulo_etapa_1'] = "Ingreso Proyecto";
					$data['nombre_del_proyecto_etapa_1'] = $nombre_del_proyecto_etapa_1;
					$data['cliente_etapa_1'] = $cliente_etapa_1;
					$data['tipo_de_proyecto_etapa_1'] = $tipo_de_proyecto_etapa_1;
					$data['linea_de_negocio_etapa_1'] = $linea_de_negocio_etapa_1;
					$data['adjuntar_archivo_etapa_1'] = $adjuntar_archivo_etapa_1;
					$data['direccion_etapa_1'] = $direccion_etapa_1;
					$data['telefono_etapa_1'] = $telefono_etapa_1;
					$data['email_etapa_1'] = $email_etapa_1;
					$data['bitacora_etapa_1'] = $bitacora_etapa_1;
					$data['rut_etapa_1'] = $rut_etapa_1;
					
					// inclusión de datos en la vista - etapa 2
				 	$data['titulo_etapa_2'] = "Envío Solicitud a Contratista";
					$data['fecha_de_inicio_etapa_2'] = $fecha_de_inicio_etapa_2;
					$data['adjuntar_archivo_etapa_2'] = $adjuntar_archivo_etapa_2;
					$data['contratista_etapa_2'] = $contratista_etapa_2;
					$data['propuesta_etapa_2'] = $propuesta_etapa_2;
					$data['bitacora_etapa_2'] = $bitacora_etapa_2;
					
					// inclusión de datos en la vista - etapa 3
				 	$data['titulo_etapa_3'] = "Desarrollo de Propuesta";
					$data['fecha_de_inicio_etapa_3'] = $fecha_de_inicio_etapa_3;
					$data['garantia_equipo_etapa_3'] = $garantia_equipo_etapa_3;
					$data['garantia_instalacion_etapa_3'] = $garantia_instalacion_etapa_3;
					$data['adjuntar_archivo_etapa_3'] = $adjuntar_archivo_etapa_3;
					$data['itemizado_generico_nombre1_etapa_3'] = $itemizado_generico_nombre1_etapa_3;
					$data['itemizado_generico_nombre2_etapa_3'] = $itemizado_generico_nombre2_etapa_3;
					$data['itemizado_generico_nombre3_etapa_3'] = $itemizado_generico_nombre3_etapa_3;
					$data['itemizado_generico_nombre4_etapa_3'] = $itemizado_generico_nombre4_etapa_3;
					$data['itemizado_generico_nombre5_etapa_3'] = $itemizado_generico_nombre5_etapa_3;
					$data['itemizado_generico_nombre6_etapa_3'] = $itemizado_generico_nombre6_etapa_3;
					$data['itemizado_generico_nombre7_etapa_3'] = $itemizado_generico_nombre7_etapa_3;
					$data['itemizado_generico_nombre8_etapa_3'] = $itemizado_generico_nombre8_etapa_3;
					$data['itemizado_generico_nombre9_etapa_3'] = $itemizado_generico_nombre9_etapa_3;
					$data['itemizado_generico_nombre10_etapa_3'] = $itemizado_generico_nombre10_etapa_3;
					$data['itemizado_generico_costo_etapa_3'] = $itemizado_generico_costo_etapa_3;
					$data['plazo_construccion_etapa_3'] = $plazo_construccion_etapa_3;
					$data['bitacora_etapa_3'] = $bitacora_etapa_3;
					
					// inclusión de datos en la vista - etapa 4
				 	$data['titulo_etapa_4'] = "Revisión de Propuesta";
					$data['fecha_de_inicio_etapa_4'] = $fecha_de_inicio_etapa_4;
					$data['adjuntar_archivo_etapa_4'] = $adjuntar_archivo_etapa_4;
					$data['margen_etapa_4'] = $margen_etapa_4;
					$data['bitacora_etapa_4'] = $bitacora_etapa_4;
					
					// inclusión de datos en la vista - etapa 5
				 	$data['titulo_etapa_5'] = "Envio Propuesta Cliente";
					$data['fecha_de_inicio_etapa_5'] = $fecha_de_inicio_etapa_5;
					$data['adjuntar_archivo_etapa_5'] = $adjuntar_archivo_etapa_5;
					$data['margen_propuesto_etapa_5'] = $margen_propuesto_etapa_5;
					$data['bitacora_etapa_5'] = $bitacora_etapa_5;
					
					// inclusión de datos en la vista - etapa 6
				 	$data['titulo_etapa_6'] = "Etapa de Negociación";
					$data['fecha_de_inicio_etapa_6'] = $fecha_de_inicio_etapa_6;
					$data['adjuntar_archivo_etapa_6'] = $adjuntar_archivo_etapa_6;
					$data['bitacora_etapa_6'] = $bitacora_etapa_6;
					
					// inclusión de datos en la vista - etapa 7
				 	$data['titulo_etapa_7'] = "Adjudicación";
					$data['fecha_de_inicio_etapa_7'] = $fecha_de_inicio_etapa_7;
					$data['adjuntar_archivo_etapa_7'] = $adjuntar_archivo_etapa_7;
					$data['margen_cierre_etapa_7'] = $margen_cierre_etapa_7;
					$data['bitacora_etapa_7'] = $bitacora_etapa_7;
					$data['check_orden_de_compra_etapa_7'] = $check_orden_de_compra_etapa_7;
					
					// inclusión de datos en la vista - etapa 8
				 	$data['titulo_etapa_8'] = "Entrega de Terreno";
					$data['fecha_de_inicio_etapa_8'] = $fecha_de_inicio_etapa_8;
					$data['adjuntar_archivo_etapa_8'] = $adjuntar_archivo_etapa_8;
					$data['fecha_de_acta_de_entrega_etapa_8'] = $fecha_de_acta_de_entrega_etapa_8;
					$data['bitacora_etapa_8'] = $bitacora_etapa_8;
					$data['check_se_adjunta_entrega_de_terreno_etapa_8'] = $check_se_adjunta_entrega_de_terreno_etapa_8;
					$data['check_boleta_garantia_ejecucion_contratista_etapa_8'] = $check_boleta_garantia_ejecucion_contratista_etapa_8;
					
					// inclusión de datos en la vista - etapa 9
				 	$data['titulo_etapa_9'] = "Adquisición de Equipos y Productos";
					$data['adjuntar_archivo_etapa_9'] = $adjuntar_archivo_etapa_9;
					$data['ingreso_de_plazo_en_dias_etapa_9'] = $ingreso_de_plazo_en_dias_etapa_9;
					$data['bitacora_etapa_9'] = $bitacora_etapa_9;
					$data['email_adquisicion_etapa_9'] = $email_adquisicion_etapa_9;
					
					// inclusión de datos en la vista - etapa 10
				 	$data['titulo_etapa_10'] = "Ingeniería de Detalle";
					$data['adjuntar_archivo_etapa_10'] = $adjuntar_archivo_etapa_10 ;
					$data['ingreso_de_plazo_en_dias_etapa_10'] = $ingreso_de_plazo_en_dias_etapa_10;
					$data['bitacora_etapa_10'] = $bitacora_etapa_10;
					$data['ingenieria_de_detalle_aprobada_etapa_10'] = $ingenieria_de_detalle_aprobada_etapa_10;
					$data['memoria_de_calculo_etapa_10'] = $memoria_de_calculo_etapa_10;
					$data['aprobacion_emplazamiento_etapa_10'] = $aprobacion_emplazamiento_etapa_10;
					
					// inclusión de datos en la vista - etapa 11
				 	$data['titulo_etapa_11'] = "Obras Civiles u Otras";
					$data['adjuntar_archivo_etapa_11'] = $adjuntar_archivo_etapa_11;
					$data['ingreso_de_plazo_en_dias_etapa_11'] = $ingreso_de_plazo_en_dias_etapa_11;
					$data['bitacora_etapa_11'] = $bitacora_etapa_11;
					$data['registro_fotografico_etapa_11'] = $registro_fotografico_etapa_11;
					$data['ipal_etapa_11'] = $ipal_etapa_11;
					
					// inclusión de datos en la vista - etapa 12
				 	$data['titulo_etapa_12'] = "Instalación de Equipos";
					$data['adjuntar_archivo_etapa_12'] = $adjuntar_archivo_etapa_12;
					$data['ingreso_de_plazo_en_dias_etapa_12'] = $ingreso_de_plazo_en_dias_etapa_12;
					$data['bitacora_etapa_12'] = $bitacora_etapa_12;
					$data['itemizado_generico_nombre1_etapa_12'] = $itemizado_generico_nombre1_etapa_12;
					$data['itemizado_generico_nombre2_etapa_12'] = $itemizado_generico_nombre2_etapa_12;
					$data['itemizado_generico_nombre3_etapa_12'] = $itemizado_generico_nombre3_etapa_12;
					$data['itemizado_generico_nombre4_etapa_12'] = $itemizado_generico_nombre4_etapa_12;
					$data['itemizado_generico_nombre5_etapa_12'] = $itemizado_generico_nombre5_etapa_12;
					$data['itemizado_generico_nombre6_etapa_12'] = $itemizado_generico_nombre6_etapa_12;
					$data['itemizado_generico_nombre7_etapa_12'] = $itemizado_generico_nombre7_etapa_12;
					$data['itemizado_generico_nombre8_etapa_12'] = $itemizado_generico_nombre8_etapa_12;
					$data['itemizado_generico_nombre9_etapa_12'] = $itemizado_generico_nombre9_etapa_12;
					$data['itemizado_generico_nombre10_etapa_12'] = $itemizado_generico_nombre10_etapa_12;
					$data['itemizado_generico1_etapa_12'] = $itemizado_generico1_etapa_12;
					$data['itemizado_generico2_etapa_12'] = $itemizado_generico2_etapa_12;
					$data['itemizado_generico3_etapa_12'] = $itemizado_generico3_etapa_12;
					$data['itemizado_generico4_etapa_12'] = $itemizado_generico4_etapa_12;
					$data['itemizado_generico5_etapa_12'] = $itemizado_generico5_etapa_12;
					$data['itemizado_generico6_etapa_12'] = $itemizado_generico6_etapa_12;
					$data['itemizado_generico7_etapa_12'] = $itemizado_generico7_etapa_12;
					$data['itemizado_generico8_etapa_12'] = $itemizado_generico8_etapa_12;
					$data['itemizado_generico9_etapa_12'] = $itemizado_generico9_etapa_12;
					$data['itemizado_generico10_etapa_12'] = $itemizado_generico10_etapa_12;
					$data['itemizado_generico11_etapa_12'] = $itemizado_generico11_etapa_12;
					$data['itemizado_generico12_etapa_12'] = $itemizado_generico12_etapa_12;
					$data['itemizado_generico13_etapa_12'] = $itemizado_generico13_etapa_12;
					$data['itemizado_generico14_etapa_12'] = $itemizado_generico14_etapa_12;
					$data['itemizado_generico15_etapa_12'] = $itemizado_generico15_etapa_12;
					$data['itemizado_generico16_etapa_12'] = $itemizado_generico16_etapa_12;
					$data['itemizado_generico17_etapa_12'] = $itemizado_generico17_etapa_12;
					$data['itemizado_generico18_etapa_12'] = $itemizado_generico18_etapa_12;
					$data['itemizado_generico19_etapa_12'] = $itemizado_generico19_etapa_12;
					$data['itemizado_generico20_etapa_12'] = $itemizado_generico20_etapa_12;
					$data['registro_fotografico_etapa_12'] = $registro_fotografico_etapa_12;
					$data['ipal_etapa_12'] = $ipal_etapa_12;
					
					// inclusión de datos en la vista - etapa 13
				 	$data['titulo_etapa_13'] = "Puesta en Marcha del Sistema";
					$data['adjuntar_archivo_etapa_13'] = $adjuntar_archivo_etapa_13;
					$data['anexo_SEC_etapa_13'] = $anexo_SEC_etapa_13;
					$data['pruebas_operaciones_etapa_13'] = $pruebas_operaciones_etapa_13;
					$data['registro_fotografico_etapa_13'] = $registro_fotografico_etapa_13;
					$data['fecha_de_puesta_en_marcha_etapa_13'] = $fecha_de_puesta_en_marcha_etapa_13;
					
					// inclusión de datos en la vista - etapa 14
				 	$data['titulo_etapa_14'] = "Corrección de Observaciones";
					$data['adjuntar_archivo_etapa_14'] = $adjuntar_archivo_etapa_14;
					$data['plazo_de_correcciones_de_observaciones_etapa_14'] = $plazo_de_correcciones_de_observaciones_etapa_14;
					$data['observaciones_etapa_14'] = $observaciones_etapa_14;
					$data['observaciones_corregidas_etapa_14'] = $observaciones_corregidas_etapa_14;
					
					// inclusión de datos en la vista - etapa 15
				 	$data['titulo_etapa_15'] = "Recepción Provisoria";
					$data['adjuntar_archivo_etapa_15'] = $adjuntar_archivo_etapa_15;
					$data['recepcion_provisoria_etapa_15'] = $recepcion_provisoria_etapa_15;
					$data['fecha_de_recepcion_provisoria_etapa_15'] = $fecha_de_recepcion_provisoria_etapa_15;
					
					// inclusión de datos en la vista - etapa 16
				 	$data['titulo_etapa_16'] = "Inicio de la Etapa de Garantía";
					$data['adjuntar_archivo_etapa_16'] = $adjuntar_archivo_etapa_16;
					$data['itemizado_generico_nombre1_etapa_16'] = $itemizado_generico_nombre1_etapa_16;
					$data['itemizado_generico_nombre2_etapa_16'] = $itemizado_generico_nombre2_etapa_16;
					$data['itemizado_generico_nombre3_etapa_16'] = $itemizado_generico_nombre3_etapa_16;
					$data['itemizado_generico_nombre4_etapa_16'] = $itemizado_generico_nombre4_etapa_16;
					$data['itemizado_generico_nombre5_etapa_16'] = $itemizado_generico_nombre5_etapa_16;
					$data['itemizado_generico_nombre6_etapa_16'] = $itemizado_generico_nombre6_etapa_16;
					$data['itemizado_generico_nombre7_etapa_16'] = $itemizado_generico_nombre7_etapa_16;
					$data['itemizado_generico_nombre8_etapa_16'] = $itemizado_generico_nombre8_etapa_16;
					$data['itemizado_generico_nombre9_etapa_16'] = $itemizado_generico_nombre9_etapa_16;
					$data['itemizado_generico_nombre10_etapa_16'] = $itemizado_generico_nombre10_etapa_16;
					$data['itemizado_generico1_etapa_16'] = $itemizado_generico1_etapa_16;
					$data['itemizado_generico2_etapa_16'] = $itemizado_generico2_etapa_16;
					$data['itemizado_generico3_etapa_16'] = $itemizado_generico3_etapa_16;
					$data['itemizado_generico4_etapa_16'] = $itemizado_generico4_etapa_16;
					$data['itemizado_generico5_etapa_16'] = $itemizado_generico5_etapa_16;
					$data['itemizado_generico6_etapa_16'] = $itemizado_generico6_etapa_16;
					$data['itemizado_generico7_etapa_16'] = $itemizado_generico7_etapa_16;
					$data['itemizado_generico8_etapa_16'] = $itemizado_generico8_etapa_16;
					$data['itemizado_generico9_etapa_16'] = $itemizado_generico9_etapa_16;
					$data['itemizado_generico10_etapa_16'] = $itemizado_generico10_etapa_16;
					$data['boleta_periodo_garantia_contratista_etapa_16'] = $boleta_periodo_garantia_contratista_etapa_16;
					
					// inclusión de datos en la vista - etapa 17
				 	$data['titulo_etapa_17'] = "Capacitación";
					$data['adjuntar_archivo_etapa_17'] = $adjuntar_archivo_etapa_17;
					$data['acta_de_capacitacion_etapa_17'] = $acta_de_capacitacion_etapa_17;
					$data['fecha_de_capacitacion_etapa_17'] = $fecha_de_capacitacion_etapa_17;
					
					// inclusión de datos en la vista - etapa 18
				 	$data['titulo_etapa_18'] = "Entrega de Manuales e Información de Postventa y Garantía";
					$data['adjuntar_archivo_etapa_18'] = $adjuntar_archivo_etapa_18;
					$data['entrega_manuales_equipos_etapa_18'] = $entrega_manuales_equipos_etapa_18;
					$data['acta_de_garantia_y_postventa_etapa_18'] = $acta_de_garantia_y_postventa_etapa_18;
					
					// inclusión de datos en la vista - etapa 19
				 	$data['titulo_etapa_19'] = "Atención Postventa";
					$data['adjuntar_archivo_etapa_19'] = $adjuntar_archivo_etapa_19;
					$data['bitacora_etapa_19'] = $bitacora_etapa_19;
					$data['archivos_fotograficos_etapa_19'] = $archivos_fotograficos_etapa_19;
					
					// inclusión de datos en la vista - etapa 20
				 	$data['titulo_etapa_20'] = "Recepción Definitiva";
					$data['cuadro_check_acta_recepcion_definitiva_etapa_20'] = $cuadro_check_acta_recepcion_definitiva_etapa_20;
					
					$this->load->view('header_app');
					$this->load->view('proyecto/etapas_info_proyecto', $data);
					$this->load->view('footer_app');
				}
				else
				{
					redirect ('proyecto/revisar');
				}
			}
			else redirect ('proyecto/revisar');
		}
	}
	
	
	
	public function ingresar_info()
	{
		$proyecto_id = $this->uri->segment(3);
		if ( is_numeric($proyecto_id))
		{
			if ( $this->proyecto_model->existe($proyecto_id))
			{
				$this->load->model('usuario_model');
				$proyecto = $this->proyecto_model->obtener($proyecto_id);
				$area_comercial = $this->opcion_model->obtener_por_tipo('AREA_COMERCIAL');
				$ejecutivo_servicios = $this->usuario_model->obtener($proyecto->ejecutivo_servicios_id);
				$ejecutivo_negocios = $this->usuario_model->obtener($proyecto->ejecutivo_negocios_id);
				$es = $this->db->get_where('usuarios', array('rol' => 'ES'));
				$en = $this->db->get_where('usuarios', array('rol' => 'EN'));
				if ( $this->form_validation->run('ingresar_info_proyecto') == FALSE)
				{
					$this->_view('proyecto/ingresar_info_proyecto', array(
						'proyecto' => $proyecto,
						'ejecutivo_servicios' => $ejecutivo_servicios,
						'ejecutivo_negocios' => $ejecutivo_negocios,
						'es' => $es,
						'en' => $en,
						'area_comercial' => $area_comercial
					));
				}
				else
				{
					if ( $this->proyecto_model->ingresar_info())
					{
						$this->session->set_flashdata('mensaje', 'La información fue ingresada satisfactoriamente. <br>La gestión de cada etapa del proyecto ahora será administrada por su Ejecutivo de Servicio y su Ejecutivo de Negocios respectivamente.');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					}
					else
					{
						$this->session->set_flashdata('mensaje_clase', 'Ocurrió un error al ingresar la información');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
					}
					redirect ('proyecto/administrar');
				}								
			}
			else redirect('proyecto/administrar');
		}
		else redirect('proyecto/administrar');
	}
	
	public function editar()
	{
		$proyecto_id = $this->uri->segment(3);
		if ( is_numeric($proyecto_id))
		{
			if ( $this->proyecto_model->existe($proyecto_id))
			{
				if ( $this->form_validation->run('editar_proyecto') == FALSE)
				{
					$data['proyecto'] = $this->proyecto_model->obtener($proyecto_id);
					$data['proyecto_tipo'] = $this->opcion_model->obtener_por_tipo('TIPO_PROYECTO');
					$data['proyecto_linea'] = $this->opcion_model->obtener_por_tipo('LINEA_NEGOCIO');
					$data['proyecto_area'] = $this->opcion_model->obtener_por_tipo('AREA_COMERCIAL');
					$this->_view('proyecto/editar_proyecto', $data);					
				}
				else
				{
					if ( $this->proyecto_model->editar())
					{
						$this->session->set_flashdata('mensaje', 'Información actualizada satisfactoriamente');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					}
					else
					{
						$this->session->set_flashdata('mensaje_clase', 'Ocurrió un error al actualizar la información');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
					}
					redirect ('proyecto/administrar');					
				}
			}
			else echo 'proyecto no existe';
		}
		else echo 'error';		
	}
	
	public function gantt()
	{
		// hay que modificar esta función ya que toma como referencia la tabla etapas y no la tabla etapas_v2
		$proyecto_id = $this->uri->segment(3);
		$proyecto = $this->proyecto_model->obtener($proyecto_id);
		
		//$etapas_v2 = $this->db->order_by('etapa_v2_id', 'asc')->get('etapas_v2');
				
		$ft_proyectada = $proyecto->proyecto_ft_proyectada;
		
		if ( ! is_null($ft_proyectada))
		{
			$ft_proyectada = DateTime::createFromFormat('Y-m-d', $ft_proyectada);
			$fecha_ingreso = $proyecto->proyecto_fecha_ingreso;
			
			if ( $ft_proyectada->getTimestamp() > 0 && $fecha_ingreso < $ft_proyectada)
			{
				$datos = array(
					'fecha_inicio_proyectada' => (int)$fecha_ingreso*1000,
					'fecha_termino_proyectada' => $ft_proyectada->getTimestamp()*1000,
					//'etapas_v2' => $etapas_v2,
					'nombre' => $proyecto->proyecto_nombre
				);
				$this->load->view('proyecto/gantt', $datos);
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Existe un problema con las fechas de ingreso y término del proyecto. <br>Puede ser debido a que no se ha ingresado o se ha borrado la fecha proyectada de este mismo.');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-warning');
				redirect('proyecto/administrar');
			}
		}		
		else
		{
				$this->session->set_flashdata('mensaje', 'Con la información disponible no puede construirse una carta gantt. Asegúrese de ingresar por lo menos las fechas proyectadas');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-warning');
				redirect('proyecto/administrar');			
		}
	}
	
	public function eliminar()
	{
		if ( $this->input->is_ajax_request())
		{
			$proyecto_id = $this->uri->segment(3);
			if ( is_numeric($proyecto_id))
			{
				if ( $this->proyecto_model->eliminar($proyecto_id))
				{
					$this->session->set_flashdata('mensaje', 'El Proyecto se eliminó exitosamente.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');					
					echo json_encode(array('success' => true));
				}
				else echo json_encode(array('success' => false));
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al eliminar el Proyecto.');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				echo json_encode(array('success' => false));
			}
		}		
	}
	
	private function _view($view = 'usuario/administrar', $data = NULL, $layout = TRUE)
	{
		$data['mensaje'] = $this->session->flashdata('mensaje');
		$data['mensaje_clase'] = $this->session->flashdata('mensaje_clase');
		if ( $layout)
		{
			$this->load->view('header_app');
			$this->load->view($view, $data);
			$this->load->view('footer_app');
		}
		else
		{
			$this->load->view($view, $data);
		}		
	}
}	