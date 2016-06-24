<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
class Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->auth->check()) redirect('usuario/entrar');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('tarea_model'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}
	
	public function index()
	{
		// Nada por defecto
	}
	
	public function ingresar()
	{
		$etapa_id = $this->uri->segment(3);
		if ( $this->form_validation->run('ingresar_tarea') == FALSE)
		{
			$this->_view('tarea/ingresar_tarea');
		}
		else
		{
			if ( $this->tarea_model->ingresar())
			{
				$this->session->set_flashdata('mensaje', 'Se agregó exitosamente la tarea');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar la tarea');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');				
			}
			redirect('etapa/administrar/#etapa_'.$etapa_id);
		}		
	}
	
	public function editar()
	{
		$tarea_id = $this->uri->segment(3);
		if ( is_numeric($tarea_id))
		{
			if ( $this->tarea_model->existe($tarea_id))
			{
				$tarea = $this->tarea_model->obtener($tarea_id);
				if ( $this->form_validation->run('editar_tarea') == FALSE)
				{
					$this->_view('tarea/editar_tarea', array('tarea' => $tarea));
				}
				else
				{
					if ( $this->tarea_model->editar())
					{
						$this->session->set_flashdata('mensaje', 'Se editó exitosamente la tarea');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					}
					else
					{
						$this->session->set_flashdata('mensaje', 'Ocurrió un error al editar la tarea');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');				
					}
					redirect('etapa/administrar');					
				}							
			}
		}
	}
	
	public function proceso()
	{
		//$this->output->enable_profiler(true);
		$proceso_id = $this->uri->segment(3);
		if ( is_numeric($proceso_id))
		{
				$tarea = $this->tarea_model->obtener_proceso($proceso_id);
				$tarea = $tarea->row();
				$bitacora = $this->tarea_model->obtener_bitacora_por_proceso($proceso_id);
				$adjunto = $this->tarea_model->obtener_adjuntos_por_proceso($proceso_id);
				if ( empty($tarea->ejecutivo_servicios_id) || empty($tarea->ejecutivo_negocios_id))
				{
					
					$this->session->set_flashdata('mensaje', 'Antes de completar cualquier tarea, debes asignar un Ejecutivo de Servicios y un Ejecutivo de Negocios a este proyecto');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-warning');	
					redirect('escritorio');				
				}				
				if ( $tarea)
				{
					if ( $this->input->post('guardar_tarea'))
					{
						if ($this->tarea_model->finalizar_proceso($proceso_id))
						{
							$this->session->set_flashdata('mensaje', 'Cambios guardados');
							$this->session->set_flashdata('mensaje_clase', 'alert alert-success');	
							redirect('escritorio');							
						}						
					}
					else
					{
						$this->_view('tarea/administrar_proceso', array('adjunto' => $adjunto, 'tarea' => $tarea, 'bitacora' => $bitacora));
					}
				}
				else redirect('escritorio');
		}
		else redirect('escritorio');
	}
	
	public function eliminar()
	{
		if ( $this->input->is_ajax_request())
		{
			$tarea_id = $this->uri->segment(3);
			if ( is_numeric($tarea_id))
			{
				if ( $this->tarea_model->eliminar($tarea_id))
				{
					$this->session->set_flashdata('mensaje', 'El registro se eliminó exitosamente');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');					
					echo json_encode(array('success' => true));
				}
				else echo json_encode(array('success' => false));
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al eliminar el registro');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				echo json_encode(array('success' => false));
			}
		}
	}
	
	public function subir_adjunto()
	{
		$proceso_id = $this->uri->segment(3);
		if ( is_numeric($proceso_id))
		{
			$tarea = $this->tarea_model->obtener_proceso($proceso_id);
			if ( $tarea)
			{
				if ( $this->form_validation->run('subir_adjunto') == FALSE)
				{
					$this->proceso();					
				}
				else
				{
					$tarea = $tarea->row();
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|rtf|txt';
					$config['max_size'] = '8196';
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('adjunto'))
					{
						$errores = $this->upload->display_errors();
						$this->session->set_flashdata('mensaje', 'Error al subir el archivo: '.$errores);
						$this->session->set_flashdata('mensaje_clase', 'alert alert-warning');
						redirect('tarea/proceso/'.$proceso_id);
					}
					else
					{
						$archivo = $this->upload->data();
						$datos = array(
							'adjunto_titulo'	=> $this->input->post('titulo'),
							'adjunto_archivo'	=> $archivo['file_name'],
							'proceso_id'		=> $proceso_id,
							'proyecto_id'		=> $tarea->proyecto_id,
							'usuario_id'		=> $this->auth->get_id(),
							'etapa_id'			=> $tarea->etapa_id,
							'tarea_id'			=> $tarea->tarea_id
						);
						$this->db->insert('adjuntos', $datos);
						//funcion para grabar en la bbdd o funcion del modelo
						$this->session->set_flashdata('mensaje', 'Se adjuntó correctamente el archivo');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
						redirect('tarea/proceso/'.$proceso_id);
					}					
				}					
			}
			else redirect('escritorio');
		}
		else redirect('escritorio');				
	}
	
	private function _view($view = 'tarea/administrar', $data = NULL, $layout = TRUE)
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
	
	function Upload()
	{
		parent::Controller();
		$this->load->helper(array('form', 'url'));
	}
	
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
	
		if ( ! $this->tarea->do_upload())
		{	
			$this->load->view('tarea/administrar', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
		}
	}
}