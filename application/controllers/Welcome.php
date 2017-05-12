<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_rumah');
		$this->load->model('m_artikel');
		$this->load->model('m_singgah');
		$this->load->model('m_donasi');
		$this->load->model('m_kegiatan');
			
	}
	public function index()
	{	
		$this->data['map'] = $this->m_singgah->listmap();
		$this->data['rec_rumah'] =  $this->m_rumah->rec_rumah();
		$this->data['donasi'] =  $this->m_donasi->rec_donasi();
		$this->data['kegiatan'] =  $this->m_kegiatan->rec_kegiatan();
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
		$this->data['map'] = $this->m_singgah->listmapfilter($city);
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

	public function donasidet($id) {
		$this->data['datas'] = $this->m_donasi->detail($id);
		$this->load->view('header');	
		$this->load->view('detaildonasi',$this->data,'refresh');	
		$this->load->view('footer');
	}

	public function kegiatandet($id) {
		$this->data['datas'] = $this->m_kegiatan->detail($id);
		$this->load->view('header');	
		$this->load->view('detailkegiatan',$this->data,'refresh');	
		$this->load->view('footer');
	}

	public function filterdonasi() {
		if (empty($_POST)) {
			$search = "";
		} else {
			$search = $_POST['search'];
		}

		$jumlah_data = $this->m_donasi->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/welcome/filterdonasi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 8;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		

		$data['filter'] = $this->m_donasi->filterdn($config['per_page'],$from,$search);
		$this->load->view('header');	
		$this->load->view('filterdonasi',$data,'refresh');	
		$this->load->view('footer');
	}

	public function filterkegiatan() {
		if (empty($_POST)) {
			$search = "";
		} else {
			$search = $_POST['search'];
		}

		$jumlah_data = $this->m_kegiatan->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/welcome/filterkegiatan/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 8;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		

		$data['filter'] = $this->m_kegiatan->filterkg($config['per_page'],$from,$search);
		$this->load->view('header');	
		$this->load->view('filterkegiatan',$data,'refresh');	
		$this->load->view('footer');
	}

	public function filterartikel() {
		if (empty($_POST)) {
			$search = "";
		} else {
			$search = $_POST['search'];
		}

		$jumlah_data = $this->m_artikel->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/welcome/filterartikel/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 8;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		

		$data['filter'] = $this->m_artikel->filterar($config['per_page'],$from,$search);
		$this->load->view('header');	
		$this->load->view('filterartikel',$data,'refresh');	
		$this->load->view('footer');
	}

	public function artikel($id) {
		$this->data['datas'] = $this->m_artikel->detail($id);
		$this->load->view('header');	
		$this->load->view('detailartikel',$this->data,'refresh');	
		$this->load->view('footer');
	}
}
