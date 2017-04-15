<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();;
		$this->lang->load('auth');
		$this->load->model('m_singgah');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }
	}
	public function index()
	{	
		// $this->data['rec_rumah'] =  $this->m_rumah->rec_rumah();
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebaruser','refresh');
		$this->load->view('admin/index','refresh');
		$this->load->view('admin/footer','refresh');
	}
	public function lihat()
	{	
		$user= $this->ion_auth->get_user_id();
		$this->data['list'] =  $this->m_singgah->listrumah($user);
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebaruser','refresh');
		$this->load->view('admin/rumah/rumah',$this->data,'refresh');
		$this->load->view('admin/footer','refresh');
	}
	public function add() {
		if (!$this->ion_auth->logged_in()){
			redirect ('auth/login');
		}
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebaruser','refresh');
		$this->load->view('admin/rumah/adduser','refresh');
		$this->load->view('admin/footer','refresh');
	}
	public function doadd() {
		$date = date('Y-m-d');
	 	$user= $this->ion_auth->get_user_id();
	 	$nama = $_POST['rumah'];
	 	$provinsi = $_POST['prov'];
	 	$kota = $_POST['city'];
	 	$alamat = $_POST['alamat'];
	 	$latitude = $_POST['latitude'];
	 	$longitude = $_POST['longitude'];
	 	$telepon = $_POST['telepon'];
	 	$isi = $_POST['isi'];
	 	$rating = $_POST['rat'];	
        $status = 'menunggu'; 	
	 	
	 	if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/rumah';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;
        $config['max_size']             = 1000;
        $config['max_width']            = 10024;
        $config['max_height']           = 7068;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');

	 	$data_insert = array (
	 		'id' => '', 
            'user' => $user,
            'nama' => $nama,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'alamat' => $alamat,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'telepon' => $telepon,
            'isi' => $isi,
            'foto' => $fileName,
            'tgl_update' => $date,
            'rating' => $rating,
            'status' => $status           
        );
        $tampung = $this->m_singgah->insert('rumah',$data_insert); //ingat prinsip insert/adddata
        move_uploaded_file($_FILES['foto']['tmp_name'], "/singgah/assets/img/rumah/".$_FILES['foto']['name']);
        if ($tampung>=1) {
            redirect('user', 'refresh');
        } else {
        	redirect('user/add');
        }
	}

	public function delete ($id) {
        $tangkap = $this->m_singgah->delete('rumah',"id = '$id'");
        if ($tangkap==1) {
            redirect('user', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function edit($id) {
    	$tampung = $this->m_singgah->edit("where id = '$id' ");
    	$data = array(
    		'id' =>$tampung->id,
    		'users' =>$tampung->user,
    		'nama' =>$tampung->nama,
    		'provinsi' =>$tampung->provinsi,
    		'kota' =>$tampung->kota,
    		'alamat' =>$tampung->alamat,
    		'latitude' =>$tampung->latitude,
    		'longitude' =>$tampung->longitude,
    		'telepon' =>$tampung->telepon,
    		'isi' =>$tampung->isi,
    		'foto' =>$tampung->foto,
    		'tgl_update' =>$tampung->tgl_update,
    		'rating' =>$tampung->rating   		  
    	);
    	$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('admin/rumah/edit','refresh');
		$this->load->view('admin/footer','refresh');
    }
}
