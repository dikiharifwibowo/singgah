<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function __construct()
	{
		parent::__construct();;
		$this->lang->load('auth');
		$this->load->model('m_artikel');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
	}
	public function index()
	{	
		$this->data['datas'] =  $this->m_artikel->pengajuan();
        $this->load->view('admin/header','refresh');
        $this->load->view('admin/nav','refresh');
        $this->load->view('admin/sidebar','refresh');
        $this->load->view('artikel/pengajuan',$this->data,'refresh');
        $this->load->view('admin/footer','refresh');  
	}
	    
    public function acc($id) {
        $status = 'terima';
        $data_update = array (
            'id' => $id,  
            'status' => $status             
        );
        $where = array ('id' => $id);
        $tampung = $this->m_artikel->update('berita',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Pengajuan Telah di terima, Berita akan tampil di Production');</script>";
            redirect('artikel', 'refresh');
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
        $tampung = $this->m_artikel->update('berita',$data_update,$where); //ingat prinsip insert/adddata
        if ($tampung>=1) {
            echo "<script>window.alert('Pengajuan Artikel telah di TOLAK');</script>";
            redirect('artikel', 'refresh');
        } else {
            $this->load->view('admin/500');
        }
    }
}
