<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
class Etapa_v2 extends CI_Controller
{
	private $es_correcto;
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->auth->check()) redirect('usuario/entrar');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('etapa_v2_model', 'tarea_model'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}
	
		public function subir_adjunto()
	{
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|rtf|txt';
					$config['max_size'] = '8196';
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload("adjuntar_archivo"))
					{
						$errores = $this->upload->display_errors();
						$this->session->set_flashdata('titulo', 'Error al subir el archivo: '.$errores);
					}
					else
					{
						$archivo = $this->upload->data();
						$this->es_correcto = TRUE;
					}					
	}
	
			public function mensaje_por_pantalla($insert_data)
	{
					if (! $insert_data)
					{
					$this->session->set_flashdata('mensaje', 'Etapa ingresada satisfactoriamente.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					}
					else
					{
					$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar la etapa.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
					}
					redirect('/escritorio');
	}
	
	
		public function quitaAcentos($cadena)
	{
			$p = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ');
			$r = array('a','e','i','o','u','A','E','I','O','U','n','N');
			return str_replace($p, $r, $cadena);
	}

	
	//etapa 1
	public function ingreso_proyecto()
	{
		$this->output->enable_profiler(true);
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
			//	$this->load->helper('inflector');
			//	$file_name = underscore($_FILES['adjuntar_archivo']['name']);
			//	$fichero = $this->quitaAcentos($file_name);
			
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_1('1',$proyecto_id,$this->auth->get_id(),$_POST['nombre_del_proyecto'],$_POST['cliente'],$_POST['tipo_de_proyecto'],$_POST['linea_de_negocio'],$_FILES['adjuntar_archivo']['name'],$_POST['direccion'],$_POST['telefono'],$_POST['email'],$_POST['bitacora'],$_POST['rut']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}

		$data['titulo'] = "Ingreso Proyecto";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa1', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 2
	public function envio_solicitud_a_contratista()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_2('2',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['contratista'],$_POST['propuesta'],$_POST['bitacora'],'rechazar');															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Envio Solicitud a Contratista";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa2', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 3
	public function desarrollo_de_propuesta()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_3('3',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['itemizado_generico_nombre'],$_POST['itemizado_generico_costo'],$_POST['plazo_construccion'],$_POST['garantia_equipo'],$_POST['garantia_instalacion'],$_POST['bitacora'],$_POST['rechazar']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Desarrollo de Propuesta";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa3', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 4
	public function revision_de_propuesta()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_4('4',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['margen'],$_POST['bitacora'],$_POST['rechazar']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Revisión de Propuesta";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa4', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 5
	public function envio_propuesta_cliente()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_5('5',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['margen_propuesto'],$_POST['bitacora'],$_POST['rechazar']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Envio Propuesta Cliente";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa5', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 6
	public function etapa_de_negociacion()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_6('6',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['bitacora'],$_POST['terminar_proyecto']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Etapa de Negociación";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa6', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 7
	public function adjudicacion()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_7('7',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['margen_cierre'],$_POST['bitacora'],$_POST['check_orden_de_compra']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Adjudicación";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa7', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 8
	public function entrega_de_terreno()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_8('8',$proyecto_id,$this->auth->get_id(),$_POST['date'],$_FILES['adjuntar_archivo']['name'],$_POST['date2'],$_POST['bitacora'],$_POST['check_se_adjunta_entrega_de_terreno'],$_POST['check_boleta_garantia_ejecucion_contratista']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Entrega de Terreno";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa8', $data);
		$this->load->view('footer_app');
		
	}

	//etapa 9
	public function adquisicion_de_equipos_y_productos()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				// captura de los check list en un arreglo y separarlos con una coma. Este proceso está en las etapas de la 9 hasta la 14
				$email_adquisicion = "";
				for($i = 0; $i< count($_POST['email_adquisicion']); $i++){
				$email_adquisicion = $email_adquisicion.$_POST['email_adquisicion'][$i] . ",";
					}
				// se borra la última coma
				$email_adquisicion = rtrim($email_adquisicion, ',');
				
				$insert_data = $this->etapa_v2_model->insert_etapa_9('9',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['ingreso_de_plazo_en_dias'],$_POST['bitacora'],$email_adquisicion);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Adquisición de Equipos y Productos";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa9', $data);
		$this->load->view('footer_app');
		
	}
	
		
	//etapa 10
	public function ingenieria_de_detalle()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$ingenieria_de_detalle_aprobada = "";
				for($i = 0; $i< count($_POST['ingenieria_de_detalle_aprobada']); $i++){
				$ingenieria_de_detalle_aprobada = $ingenieria_de_detalle_aprobada.$_POST['ingenieria_de_detalle_aprobada'][$i] . ",";
					}
				$ingenieria_de_detalle_aprobada = rtrim($ingenieria_de_detalle_aprobada, ',');
				
				$insert_data = $this->etapa_v2_model->insert_etapa_10('10',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['ingreso_de_plazo_en_dias'],$_POST['bitacora'],$ingenieria_de_detalle_aprobada,$_POST['memoria_de_calculo'],$_POST['aprobacion_emplazamiento']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Ingeniería de Detalle";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa10', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 11
	public function obras_civiles_u_otras()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$registro_fotografico = "";
				for($i = 0; $i< count($_POST['registro_fotografico']); $i++){
				$registro_fotografico = $registro_fotografico.$_POST['registro_fotografico'][$i] . ",";
				}
				$registro_fotografico = rtrim($registro_fotografico, ',');
				
				$insert_data = $this->etapa_v2_model->insert_etapa_11('11',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['ingreso_de_plazo_en_dias'],$_POST['bitacora'],$registro_fotografico,$_POST['ipal']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Obras Civiles u Otras";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa11', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 12
	public function instalacion_de_equipos()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$registro_fotografico = "";
				for($i = 0; $i< count($_POST['registro_fotografico']); $i++){
				$registro_fotografico = $registro_fotografico.$_POST['registro_fotografico'][$i] . ",";
				}
				$registro_fotografico = rtrim($registro_fotografico, ',');
				
				$insert_data = $this->etapa_v2_model->insert_etapa_12('12',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['ingreso_de_plazo_en_dias'],$_POST['bitacora'],$_POST['itemizado_generico1'],$_POST['itemizado_generico2'],$_POST['itemizado_generico3'],$_POST['itemizado_generico4'],$_POST['itemizado_generico5'],$_POST['itemizado_generico6'],$_POST['itemizado_generico7'],$_POST['itemizado_generico8'],$_POST['itemizado_generico9'],$_POST['itemizado_generico10'],$_POST['itemizado_generico11'],$_POST['itemizado_generico12'],$_POST['itemizado_generico13'],$_POST['itemizado_generico14'],$_POST['itemizado_generico15'],$_POST['itemizado_generico16'],$_POST['itemizado_generico17'],$_POST['itemizado_generico18'],$_POST['itemizado_generico19'],$_POST['itemizado_generico20'],$registro_fotografico,$_POST['ipal']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Instalación de Equipos";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa12', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 13
	public function puesta_en_marcha_del_sistema()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$anexo_SEC = "";
				for($i = 0; $i< count($_POST['anexo_SEC']); $i++){
				$anexo_SEC = $anexo_SEC.$_POST['anexo_SEC'][$i] . ",";
				}
				$anexo_SEC = rtrim($anexo_SEC, ',');
				
				$pruebas_operaciones = "";
				for($i = 0; $i< count($_POST['pruebas_operaciones']); $i++){
				$pruebas_operaciones = $pruebas_operaciones.$_POST['pruebas_operaciones'][$i] . ",";
				}
				$pruebas_operaciones = rtrim($pruebas_operaciones, ',');
				
				$registro_fotografico = "";
				for($i = 0; $i< count($_POST['registro_fotografico']); $i++){
				$registro_fotografico = $registro_fotografico.$_POST['registro_fotografico'][$i] . ",";
				}
				$registro_fotografico = rtrim($registro_fotografico, ',');
				
				$insert_data = $this->etapa_v2_model->insert_etapa_13('13',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$anexo_SEC,$pruebas_operaciones,$registro_fotografico,$_POST['date']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Puesta en Marcha del Sistema";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa13', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 14
	public function correccion_de_observaciones()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$observaciones = "";
				for($i = 0; $i< count($_POST['observaciones']); $i++){
				$observaciones = $observaciones.$_POST['observaciones'][$i] . ",";
				}
				$observaciones = rtrim($observaciones, ',');
				
				$observaciones_corregidas = "";
				for($i = 0; $i< count($_POST['observaciones_corregidas']); $i++){
				$observaciones_corregidas = $observaciones_corregidas.$_POST['observaciones_corregidas'][$i] . ",";
				}
				$observaciones_corregidas = rtrim($observaciones_corregidas, ',');
				
				$insert_data = $this->etapa_v2_model->insert_etapa_14('14',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['date'],$observaciones,$observaciones_corregidas);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Corrección de Observaciones";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa14', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 15
	public function recepcion_provisoria()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_15('15',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['recepcion_provisoria'],$_POST['date']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Recepción Provisoria";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa15', $data);
		$this->load->view('footer_app');
		
	}

	//etapa 16
	public function inicio_de_la_etapa_de_garantia()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_16('16',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['itemizado_generico1'],$_POST['itemizado_generico2'],$_POST['itemizado_generico3'],$_POST['itemizado_generico4'],$_POST['itemizado_generico5'],$_POST['itemizado_generico6'],$_POST['itemizado_generico7'],$_POST['itemizado_generico8'],$_POST['itemizado_generico9'],$_POST['itemizado_generico10'],$_POST['boleta_periodo_garantia_contratista']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Inicio de la Etapa de Garantía";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa16', $data);
		$this->load->view('footer_app');
		
	}
		
	//etapa 17
	public function capacitacion()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_17('17',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['acta_de_capacitacion'],$_POST['date']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Capacitación";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa17', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 18
	public function entrega_de_manuales_e_informacion_de_postventa_y_garantia()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_18('18',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['entrega_manuales_equipos'],$_POST['acta_de_garantia_y_postventa']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		
		$data['titulo'] = "Entrega de Manuales e Información de Postventa y Garantía";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa18', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 19
	public function atencion_postventa()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
 			$this->subir_adjunto();
			$proyecto_id = $this->uri->segment(3);
			if($this->es_correcto == true)
			{
				$insert_data = $this->etapa_v2_model->insert_etapa_19('19',$proyecto_id,$this->auth->get_id(),$_FILES['adjuntar_archivo']['name'],$_POST['bitacora'],$_POST['archivos_fotograficos']);															
				$etapa_actual = $this->etapa_v2_model->obtener_mi_etapa_actual($proyecto_id);
				$this->etapa_v2_model->actualizar_proyecto($etapa_actual, $proyecto_id);
				$this->mensaje_por_pantalla($insert_data);
			} 
		}
		$data['titulo'] = "Atención Postventa";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa19', $data);
		$this->load->view('footer_app');
		
	}
	
		//etapa 20
	public function recepcion_definitiva()
	{
		$etapa_v2_id = $this->uri->segment(2);
		if ($_POST)
		{
			$proyecto_id = $this->uri->segment(3);
			$insert_data = $this->etapa_v2_model->insert_etapa_20('20',$proyecto_id,$this->auth->get_id(),$_POST['cuadro_check_acta_recepcion_definitiva']);															
			$this->mensaje_por_pantalla($insert_data);
			
		}
		$data['titulo'] = "Recepción Definitiva";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa20', $data);
		$this->load->view('footer_app');
		
	}
	
/*	
	//etapa 20
	public function ingreso_proyecto()
	{
		$data['titulo'] = "Ingreso Proyecto";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa1', $data);
		$this->load->view('footer_app');
		
	}
	
	//etapa 21
	public function ingreso_proyecto()
	{
		$data['titulo'] = "Ingreso Proyecto";

		$this->load->view('header_app');
		$this->load->view('etapa/etapa1', $data);
		$this->load->view('footer_app');
		
	}
	
*/
	
	public function terminar_proyecto()
	{
		if ($_POST){
			$proyecto_id = $this->uri->segment(3);
			$this->model->terminar_proyecto($proyecto_id);
			$this->mensaje_por_pantalla($insert_data);
		
		$data['titulo'] = "Recepción Definitiva";

		redirect('/escritorio/index/', $data');
		
		}
		
		
	}
}