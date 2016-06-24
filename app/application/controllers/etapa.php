<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
class Etapa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->auth->check()) redirect('usuario/entrar');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('etapa_model', 'tarea_model'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}
	
	public function index()
	{
		// Nada por defecto
	}
	
	public function administrar()
	{
		$etapa = $this->etapa_model->obtener();
		$this->_view('etapa/administrar_etapa', array('etapa' => $etapa));
	}
	
	public function ingresar()
	{
		if ( $this->form_validation->run('ingresar_etapa') == FALSE)
		{
			$this->_view('etapa/ingresar_etapa');
		}
		else
		{
			if ( $this->etapa_model->ingresar())
			{
				$this->session->set_flashdata('mensaje', 'Se agregó exitosamente la etapa');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar la etapa');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');				
			}
			redirect('etapa/administrar');
		}		
	}
	
	public function editar()
	{
		$etapa_id = $this->uri->segment(3);
		if ( is_numeric($etapa_id))
		{
			if ( $this->etapa_model->existe($etapa_id))
			{
				$etapa = $this->etapa_model->obtener($etapa_id);
				if ( $this->form_validation->run('editar_etapa') == FALSE)
				{
					$this->_view('etapa/editar_etapa', array('etapa' => $etapa));
				}
				else
				{
					if ( $this->etapa_model->editar())
					{
						$this->session->set_flashdata('mensaje', 'Se editó exitosamente la etapa');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					}
					else
					{
						$this->session->set_flashdata('mensaje', 'Ocurrió un error al editar la etapa');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');				
					}
					redirect('etapa/administrar');					
				}							
			}
		}
	}
	
	public function eliminar()
	{
		if ( $this->input->is_ajax_request())
		{
			$etapa_id = $this->uri->segment(3);
			if ( is_numeric($etapa_id))
			{
				if ( $this->etapa_model->eliminar($etapa_id))
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
	
	private function _view($view = 'etapa/administrar', $data = NULL, $layout = TRUE)
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
	
	public function proceso1()
	{
		$data['mensaje'] = $this->session->flashdata('mensaje');
		$data['mensaje_clase'] = $this->session->flashdata('mensaje_clase');
		$this->load->view('header_app');
		$this->load->view('etapa/proceso1', $data);
		$this->load->view('footer_app');
	}
}