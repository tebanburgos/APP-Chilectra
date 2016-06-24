<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
class Escritorio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->auth->check()) redirect('usuario/entrar');
	}
	
	public function index()
	{
		$this->_view();
	}

	private function _view($view = 'inicio', $data = NULL, $layout = TRUE)
	{
//		$this->output->enable_profiler(true);
		$data['mensaje'] = $this->session->flashdata('mensaje');
		$data['mensaje_clase'] = $this->session->flashdata('mensaje_clase');
		if ( $layout)
		{
			$this->load->view('header_app');
			$this->load->view('escritorio/escritorio', $data);
			$this->load->view('footer_app');
		}
		else
		{
			$this->load->view($view, $data);
		}		
	}
}