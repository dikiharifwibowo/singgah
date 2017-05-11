<?php 

class M_donasi extends CI_Model {

	
	/*public function index_model($wher="") {
	$tampung = $this->db->query("select * from contact ".$wher);
	return $tampung->result_array();
	}
*/
	public function insert($namatable,$data){
		$tampung = $this->db->insert($namatable,$data);
		return $tampung;
	}
	
	public function update($table,$data,$acuan){
		$tampung = $this->db->update($table,$data,$acuan);
		return $tampung;
	} 
	public function edit($table,$id){
		$tampung = $this->db->query("select * from $table ".$id);
		return $tampung->row(); 
	}

	public function delete($table,$primary){
		$tampung = $this->db->delete($table,$primary);
		return $tampung;
	}

	public function list() {
		$this->db->select('*');
		$this->db->from('donasi'); //8 utk limit
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 


	function kodedonasi(){
		$this->db->select('RIGHT(donasi.id,3) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('donasi');
		//cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() <> 0){
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "DN".$kodemax;
		return $kodejadi;
	}

	public function rec_donasi($wher="terima") {
		$this->db->select('*');
		$this->db->from('donasi'); //8 utk limit
		$this->db->limit(4);
		$this->db->where('status', $wher);
		$this->db->order_by('id','desc');
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function detail($wher="") {
		$this->db->select('*');
		$this->db->from('donasi');
		$this->db->where('id', $wher);
		$query = $this->db->get();
		return $query->row(); 
	}

	//tabel trxdonasi
	public function kodetrxdonasi(){
		$this->db->select('RIGHT(trxdonasi.id,3) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('trxdonasi');
		//cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() <> 0){
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "TR".$kodemax;
		return $kodejadi;
	}

	//tabel trxdonasi
	public function listtrxdonasi($wher="") {
		$this->db->select('*');
		$this->db->from('trxdonasi'); //8 utk limit
		$this->db->limit(4);
		$this->db->where('users', $wher);
		$this->db->order_by('id','desc');
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function datadonasiuser($wher="") {
		$this->db->select('*');
		$this->db->from('donasi'); //8 utk limit
		$this->db->limit(4);
		$this->db->where('users', $wher);
		$this->db->order_by('id','desc');
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	
	public function filter($stat="terima") {
		$this->db->select('*');
		$this->db->from('donasi',8);
		$this->db->where('status', $stat);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function pengajuan($stat="terima"){
		$this->db->select('donasi.*, users.first_name');
		$this->db->from('donasi');
		$this->db->where('status !=', $stat);
		$this->db->join('users','users.id = donasi.users','left');
		$this->db->order_by('donasi.id','desc');
		$query = $this->db->get();
		return $query->result_array();           	
	}

	function filterdn($number,$offset){
		$this->db->where('status ', 'terima');
		return $query = $this->db->get('donasi',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		$this->db->where('status ', 'terima');
		return $this->db->get('donasi')->num_rows();
	}
}