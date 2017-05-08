<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();;
		$this->lang->load('auth');
		$this->load->model('m_kegiatan');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
	}
	public function index()
	{	
		$this->data['datas'] =  $this->m_kegiatan->list();
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('kegiatan/indexkegiatan',$this->data,'refresh');
		$this->load->view('admin/footer','refresh');
	}
	public function add() {
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('admin/rumah/add','refresh');
		$this->load->view('admin/footer','refresh');
	}

}
