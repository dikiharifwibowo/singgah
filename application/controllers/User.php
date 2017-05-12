<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();;
		$this->lang->load('auth');
		$this->load->model('m_singgah');
        $this->load->model('m_artikel');     
        $this->load->model('m_kegiatan');
        $this->load->model('m_donasi');
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
        if ($tampung>=1) {
            redirect('user', 'refresh');
            move_uploaded_file($_FILES['foto']['tmp_name'], "/singgah/assets/img/rumah/".$_FILES['foto']['name']);

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
		$this->load->view('admin/rumah/edituser',$data,'refresh');
		$this->load->view('admin/footer','refresh');
    }

    public function doeditrumah() {
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
        $config['overwrite']            = true;
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
        if ($tampung>=1) {
            redirect('user/lihatkegiatan');
            move_uploaded_file($_FILES['foto']['tmp_name'], "/singgah/assets/img/rumah/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function lihatkegiatan() {
        $user= $this->ion_auth->get_user_id();
        $this->data['datas'] =  $this->m_kegiatan->listkegiatanuser($user);
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('kegiatan/indexkegiatanuser',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function addkegiatan() {
        $this->data['kode'] = $this->m_kegiatan->kodekegiatan();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('kegiatan/adduser',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doaddkegiatan() {
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
            'foto' => $fileName                
        );
        $tampung = $this->m_kegiatan->insert('kegiatan',$data_insert); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            redirect('user/lihatkegiatan', 'refresh');
            move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/kegiatan/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function kirimdonasi($id) {
        $this->data['kode'] = $this->m_donasi->kodetrxdonasi();
        $this->data['donasi'] = $id;
        $this->load->view('header');    
        $this->load->view('kirimdonasi',$this->data,'refresh');  
        $this->load->view('footer');
    }

    public function doaddkirimdonasi() {
        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $donasi = $_POST['donasi'];
        $jumlah =  $_POST['jumlah'];
        $via =  $_POST['via'];
        $bank =  $_POST['bank'];
        $rekening = $_POST['rekening'];  
        $data_insert = array (
            'id' => $id,  
            'users' => $users,
            'donasi' => $donasi,
            'jumlah' => $jumlah,
            'via' => $via,
            'bank' => $bank,
            'rekening' => $rekening          
        );
        $tampung = $this->m_donasi->insert('trxdonasi',$data_insert); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Terima Kasih Atas Donasi Anda, Kami akan segera proses.');</script>";
            redirect('welcome', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function lihattrxdonasi() {
        $user= $this->ion_auth->get_user_id();
        $this->data['datas'] =  $this->m_donasi->listtrxdonasi($user);
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('donasi/historytrxdonasi',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function lihatdatadonasi() {
        $user= $this->ion_auth->get_user_id();
        $this->data['datas'] =  $this->m_donasi->datadonasiuser($user);
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('donasi/indexdonasiuser',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function adddonasi() {
        $this->data['kode'] = $this->m_donasi->kodedonasi();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('donasi/adduser',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doadddonasi() {

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
            redirect('user/lihatdatadonasi', 'refresh');   
            move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/donasi/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function delkegiatan($id) {
        $tangkap = $this->m_kegiatan->delete('kegiatan',"id = '$id'");
        if ($tangkap==1) {
            redirect('user/lihatkegiatan', 'refresh');
        } else {
            $this->load->view('admin/500');
        }        
    }

    public function editkegiatan($id) {
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
        $this->load->view('kegiatan/edituser',$data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doeditkegiatan() {
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
            redirect('user/lihatkegiatan', 'refresh');
             move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/kegiatan/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function deldonasi($id) {
        $tangkap = $this->m_donasi->delete('donasi',"id = '$id'");
        if ($tangkap==1) {
            redirect('user/lihatdatadonasi', 'refresh');
        } else {
            $this->load->view('admin/500');
        }        
    }

    public function editdonasi($id) {
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
        $this->load->view('donasi/edituser',$data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doeditdonasi() {
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
            redirect('user/lihatdatadonasi', 'refresh');
             move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/assets/img/donasi/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function lihatdataartikel() {
        $this->data['datas'] =  $this->m_artikel->list();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('artikel/indexartikel',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function addartikel() {
        $this->data['berita'] =  $this->m_artikel->kodeberita();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('artikel/add',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doaddberita() {
        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tglbuat = date('Y-m-d');
        $tglupdate = date('Y-m-d'); 
        $status = 'menunggu';

        if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/artikel';
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
            'isi' => $isi,
            'foto' => $fileName,              
            'tglbuat' => $tglbuat,
            'tglupdate' => $tglupdate,
            'status' => $status
                                   
        );
        $tampung = $this->m_artikel->insert('berita',$data_insert); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            redirect('user/lihatdataartikel', 'refresh');
            move_uploaded_file($_FILES['foto']['tmp_name'], "/singgah/img/artikel/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function delartikel($id) {
        $tangkap = $this->m_artikel->delete('berita',"id = '$id'");
        if ($tangkap==1) {
            redirect('user/lihatdataartikel', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }

    public function editartikel($id) {
        $tampung = $this->m_artikel->edit('berita',"where id = '$id' ");
        $data = array(       
            'id' => $tampung->id,  
            'users' =>$tampung->users,  
            'judul' => $tampung->judul,
            'foto' => $tampung->foto,
            'isi' => $tampung->isi,
            'tglbuat' => $tampung->tglbuat,
            'tglupdate' => $tampung->tglupdate   
        );
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('artikel/edit',$data,'refresh');
        $this->load->view('admin/footer','refresh');
    }

    public function doeditberita() {
        $id = $_POST['id'];
        $users = $this->ion_auth->get_user_id();
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tglbuat = date('Y-m-d');
        $tglupdate = date('Y-m-d');

        if (isset($_POST['simpan'])){
            $fileName = $_FILES['foto']['name'];
        }

        $this->load->library('upload');
        $config['upload_path']          = 'assets/img/artikel';
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
            'foto' => $fileName,
            'isi' => $isi,
            'tglbuat' => $tglbuat,
            'tglupdate' => $tglupdate                           
        );
        $where = array ('id' => $id);
        $tampung = $this->m_artikel->update('berita',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            redirect('user/lihatdataartikel', 'refresh');
            move_uploaded_file($_FILES['foto']['tmp_name'], "singgah/img/artikel/".$_FILES['foto']['name']);
        } else {
            $this->load->view('admin/500');
        }
    }

    public function lihatbooking() {
        $users = $this->ion_auth->get_user_id();
        $this->data['datas'] =  $this->m_singgah->listbooking($users);
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebaruser','refresh');
        $this->load->view('admin/rumah/booking',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');
    }
   
     public function sms($id) {
        $this->data['data'] = $this->m_singgah->getbooking($id);
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('admin/rumah/sms',$this->data,'refresh');
        $this->load->view('admin/footer','refresh'); 
    }

    public function dosms() {
        $this->load->library('Minta');
        $nohp = $_POST['nohp'];
        $pesan = $_POST['pesan'];
        echo "<script>window.alert('SMS Berhasil Terkirim!!!');</script>";
            $response = Requests::post("https://reguler.zenziva.net/apps/smsapi.php?userkey=inyq2l&passkey=dikiharif&nohp={$nohp}&pesan={$pesan}");
            var_dump($response->body);
            redirect('user/lihatbooking', 'refresh');
    }
}