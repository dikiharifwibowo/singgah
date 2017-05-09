<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();;
		$this->lang->load('auth');
		$this->load->model('m_donasi');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
	}
	public function index()
	{	
		$this->data['datas'] =  $this->m_donasi->list();
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('donasi/indexdonasi',$this->data,'refresh');
		$this->load->view('admin/footer','refresh');
	}
	
    public function add() {
        $this->data['kode'] = $this->m_donasi->kodedonasi();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('donasi/add',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

     public function doadd() {

        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = date('Y-m-d');
        $dateline = $_POST['dateline'];
        $targetdana = $_POST['targetdana'];
        $youtube = $_POST['youtube'];  
        if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/donasi';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1000;
        $config['max_width']            = 10024;
        $config['max_height']           = 7068;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');

        $data_insert = array (
            'id' => $id,  
            'users' => $users,  
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'targetdana' => $targetdana,
            'tanggal' => $tanggal, 
            'dateline' => $dateline,
            'foto' => $fileName,
            'youtube' => $youtube,
            'status' => 'terima'                        
        );
        $tampung = $this->m_donasi->insert('donasi',$data_insert); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/donasi/".$_FILES['foto']['name']);
            redirect('donasi', 'refresh');   
        } else {
            $this->load->view('admin/500');
        }
    }


    public function delete ($id) {
        $tangkap = $this->m_donasi->delete('donasi',"id = '$id'");
        if ($tangkap==1) {
            redirect('donasi', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function edit($id) {
        $tampung = $this->m_donasi->edit('donasi',"where id = '$id' ");
        $data = array(       
            'id' => $tampung->id,  
            'users' =>$tampung->users,  
            'judul' => $tampung->judul,
            'deskripsi' => $tampung->deskripsi,
            'foto' => $tampung->foto,
            'targetdana' => $tampung->targetdana,
            'dateline' => $tampung->dateline,
            'targetdana' => $tampung->targetdana,
            'youtube' => $tampung->youtube  
        );
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('donasi/edit',$data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doedit() {
        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = date('Y-m-d');
        $dateline = $_POST['dateline'];
        $targetdana = $_POST['targetdana'];
        $youtube = $_POST['youtube'];

        if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/donasi';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1000;
        $config['max_width']            = 10024;
        $config['max_height']           = 7068;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');

        $data_update = array (
            'id' => $id,  
            'users' => $users,  
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'targetdana' => $targetdana,
            'tanggal' => $tanggal, 
            'dateline' => $dateline,
            'foto' => $fileName,
            'youtube' => $youtube,
            'status' => 'terima'                   
        );
        $where = array ('id' => $id);
        $tampung = $this->m_donasi->update('donasi',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            redirect('donasi', 'refresh');
             move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/donasi/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }
}
