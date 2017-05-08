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
        $this->data['kode'] = $this->m_kegiatan->kodekegiatan();
		$this->load->view('admin/header','refresh');
		$this->load->view('admin/nav','refresh');
		$this->load->view('admin/sidebar','refresh');
		$this->load->view('kegiatan/add',$this->data,'refresh');
		$this->load->view('admin/footer','refresh');
	}

    public function doadd() {

        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];
        if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/kegiatan';
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
            'tanggal' => $tanggal, 
            'foto' => $fileName                          
        );
        $tampung = $this->m_kegiatan->insert('kegiatan',$data_insert); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            redirect('kegiatan', 'refresh');
            move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/kegiatan/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }


    public function delete ($id) {
        $tangkap = $this->m_kegiatan->delete('kegiatan',"id = '$id'");
        if ($tangkap==1) {
            redirect('kegiatan', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function edit($id) {
        $tampung = $this->m_kegiatan->edit('kegiatan',"where id = '$id' ");
        $data = array(       
            'id' => $tampung->id,  
            'users' =>$tampung->users,  
            'judul' => $tampung->judul,
            'deskripsi' => $tampung->deskripsi,
            'tanggal' => $tampung->tanggal,
            'foto' => $tampung->foto 
        );
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('kegiatan/edit',$data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doedit() {
        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];

        if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/kegiatan';
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
            'tanggal' => $tanggal,
            'foto' => $fileName                   
        );
        $where = array ('id' => $id);
        $tampung = $this->m_kegiatan->update('kegiatan',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            redirect('kegiatan', 'refresh');
             move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/kegiatan/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

}
