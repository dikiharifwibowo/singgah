<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_rumah');
	}
	public function index()
	{	
		$this->data['rec_rumah'] =  $this->m_rumah->rec_rumah();
		$this->load->view('index',$this->data,'refresh');
	}
	public function detail($id) {
		$this->data['details'] = $this->m_rumah->detail($id);
		$this->load->view('header');	
		$this->load->view('detail',$this->data,'refresh');	
		$this->load->view('footer');
	}
	public function filter($kota) {
		$city = $kota;
		if ($city=='semarang') {
			$this->data['lat'] = -6.966667;
			$this->data['long'] = 110.416664;
		} elseif ($city=='surabaya') {
			$this->data['lat'] = -7.257471;
			$this->data['long'] = 112.752088;
		} elseif ($city=='bali') {
			$this->data['lat'] = -8.409517;
			$this->data['long'] = 115.188916;
		} elseif ($city=='bandung') {
			$this->data['lat'] = -6.917463;
			$this->data['long'] = 107.619122;
		} elseif ($city=='jakarta') {
			$this->data['lat'] = -6.186486;
			$this->data['long'] = 106.834091;
		} else {
			$this->data['lat'] = -7.797457;
			$this->data['long'] = 110.370697;
		}
		$this->data['filter'] = $this->m_rumah->filter($city);
		$this->load->view('header');	
		$this->load->view('filter',$this->data,'refresh');	
		$this->load->view('footer');
	}

	public function search() {
		$nama = $_POST['nama'];
		$this->data['search'] = $this->m_rumah->search($nama);
		$this->load->view('header');	
		$this->load->view('search',$this->data,'refresh');	
		$this->load->view('footer');
	}
}
