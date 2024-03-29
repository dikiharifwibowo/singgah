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
        $lokasi = $_POST['lokasi'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
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
            'lokasi' => $lokasi,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'tanggal' => $tanggal, 
            'foto' => $fileName,
            'status' => 'terima'                        
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
            'foto' => $tampung->foto,
            'lokasi' => $tampung->lokasi,
            'latitude' => $tampung->latitude,
            'longitude' => $tampung->longitude
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
        $lokasi = $_POST['lokasi'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

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
            'lokasi' => $lokasi,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'tanggal' => $tanggal,
            'foto' => $fileName,
            'status' => 'terima'                  
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

    public function pengajuan() {
        $this->data['datas'] =  $this->m_kegiatan->pengajuan();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('kegiatan/pengajuans',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');       
    }

    public function acc($id) {
        $this->load->library('Minta');
        // $data = $this->m_kegiatan->users();
        $auth = ['auth' => array('api', 'key-3f1a21ca259edfe8b2cc969707e559d5')];
        $data = [
            'from' => 'Excited User <dikiharifwibowo@gmail.com>',
            'to' => 'dikih.wibowo@students.amikom.ac.id',
            'subject' => 'Kegiatan Baru',
            'text' => 'Telah ada kegiatan baru untuk penderita kanker, kunjungi singgah.sourcetika.com',
        ];
        $response = Requests::post('https://api.mailgun.net/v3/singgah.sourcetika.com/messages', [], $data, $auth);
        
        $status = 'terima';
        $data_update = array (
            'id' => $id,  
            'status' => $status             
        );
        $where = array ('id' => $id);
        $tampung = $this->m_kegiatan->update('kegiatan',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Pengajuan Telah di terima, Kegiatan akan tampil di Production');</script>";
            redirect('kegiatan/pengajuan', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function reject($id) {
        $status = 'tolak';
        $data_update = array (
            'id' => $id,  
            'status' => $status             
        );
        $where = array ('id' => $id);
        $tampung = $this->m_kegiatan->update('kegiatan',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Pengajuan Kegiatan telah di TOLAK jadi Revisi');</script>";
            redirect('kegiatan/pengajuan', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }
}
