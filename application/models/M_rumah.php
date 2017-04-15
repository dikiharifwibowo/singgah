<?php 

class M_rumah extends CI_Model {

	
	/*public function index_model($wher="") {
	$tampung = $this->db->query("select * from contact ".$wher);
	return $tampung->result_array();
	}
*/
	/*public function insert($namatable,$data){
		$tampung = $this->db->insert($namatable,$data);
		return $tampung;
	}*/
	/*
	public function update($table,$data,$acuan){
		$tampung = $this->db->update($table,$data,$acuan);
		return $tampung;
	}
	public function delete($table,$primary){
		$tampung = $this->db->delete($table,$primary);
		return $tampung;
	}*/

	public function rec_rumah($wher="terima") {
		$this->db->select('*');
		$this->db->from('rumah'); //8 utk limit
		$this->db->limit(4);
		$this->db->where('status', $wher);
		$this->db->order_by('id','desc');
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
		$query = $this->db->get();
		return $query->result_array(); 
	} 
	public function user($wher="") {
		$this->db->select('*');
		$this->db->from('users'); //8 utk limit
		$this->db->where('id', $wher);
		$query = $this->db->get();
		return $query->row(); 
	} 
	public function detail($wher="") {
		$this->db->select('*');
		$this->db->from('rumah');
		$this->db->where('id', $wher);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function search($like="",$wher="terima") {
		$this->db->select('*');
		$this->db->from('rumah');
		$this->db->where('status', $wher);
		$this->db->like('nama', $like);
		$query = $this->db->get();
		return $query->result_array();  
	}

	public function filter($wher="",$stat="terima") {
		$this->db->select('*');
		$this->db->from('rumah',8);
		$this->db->where('kota', $wher);
		$this->db->where('status', $stat);
		$query = $this->db->get();
		return $query->result_array(); 
	}



/*	function kode(){
		$this->db->select('RIGHT(post.idpost,4) as kode', FALSE);
		$this->db->order_by('idpost','DESC');
		$this->db->limit(1);
		$query = $this->db->get('post');
		//cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() <> 0){
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "P".$kodemax;
		return $kodejadi;
	}*/
	/*
	public function editpinjam($id){
		$tampung = $this->db->query("select * from peminjaman ".$id);
	return $tampung->result_array();
	}

	public function ambil_details($wher="") {
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('idpinjam', $wher);
		$this->db->order_by('idpinjam','desc');
		$query = $this->db->get();  
		return $query->result_array();
	}
*/
}