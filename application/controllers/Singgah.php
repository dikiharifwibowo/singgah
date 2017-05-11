<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Singgah extends CI_Controller {

	function __construct()
	{
		parent::__construct();;
		$this->lang->load('auth');
		$this->load->model('m_singgah');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
	}
	public function index()
	{	
		$this->data['list'] =  $this->m_singgah->list();
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('admin/rumah',$this->data,'refresh');
		$this->load->view('admin/footer','refresh');
	}
	public function add() {
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('admin/rumah/add','refresh');
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
        $status = 'terima';	 	
	 	
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
            redirect('singgah', 'refresh');
        } else {
        	redirect('singgah/add');
        }
	}

	public function delete ($id) {
        $tangkap = $this->m_singgah->delete('rumah',"id = '$id'");
        if ($tangkap==1) {
            redirect('singgah', 'refresh');
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
		$this->load->view('admin/rumah/edit',$data,'refresh');
		$this->load->view('admin/footer','refresh');
    }

    public function doedit() {
    	$date = date('Y-m-d');
    	$id = $_POST['id'];
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

	 	$data_update = array (
	 		'id' => $id, 
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
            'rating' => $rating            
        );

        $where = array ('id' => $id);
        $tampung = $this->m_singgah->update('rumah',$data_update,$where);
        move_uploaded_file($_FILES['foto']['tmp_name'], "/singgah/assets/img/rumah/".$_FILES['foto']['name']);
        if ($tampung>=1) {
            redirect('singgah');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function pengajuan() {
        $this->data['datas'] =  $this->m_singgah->pengajuan();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('admin/rumah/pengajuan',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');       
    }

    public function acc($id) {
        $status = 'terima';
        $data_update = array (
            'id' => $id,  
            'status' => $status             
        );
        $where = array ('id' => $id);
        $tampung = $this->m_singgah->update('rumah',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Pengajuan Telah di terima, Data rumah singgah akan tampil di Production');</script>";
            redirect('singgah/pengajuan', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function reject($id) {
        $status = 'revisi';
        $data_update = array (
            'id' => $id,  
            'status' => $status             
        );
        $where = array ('id' => $id);
        $tampung = $this->m_singgah->update('rumah',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Pengajuan Rumah Singgah telah di TOLAK jadi Revisi');</script>";
            redirect('singgah/pengajuan', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }
}   
