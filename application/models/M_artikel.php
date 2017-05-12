<?php 

class M_artikel extends CI_Model {

	
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
		$this->db->from('berita'); //8 utk limit
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 


	function kodeberita(){
		$this->db->select('RIGHT(berita.id,3) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('berita');
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
		$kodejadi = "BR".$kodemax;
		return $kodejadi;
	}

	public function rec_berita($wher="terima") {
		$this->db->select('*');
		$this->db->from('berita'); //8 utk limit
		$this->db->limit(4);
		$this->db->where('status', $wher);
		$this->db->order_by('id','desc');
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function detail($wher="") {
		$this->db->select('berita.*, users.first_name, users.last_name, ');
		$this->db->from('berita');
		$this->db->where('berita.id', $wher);
		$this->db->join('users','users.id = berita.users','left');
		$query = $this->db->get();
		return $query->row(); 
	}

	//tabel trxberita
	public function kodetrxberita(){
		$this->db->select('RIGHT(trxberita.id,3) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('trxberita');
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

	//tabel trxberita
	public function listtrxberita($wher="") {
		$this->db->select('*');
		$this->db->from('trxberita'); //8 utk limit
		$this->db->limit(4);
		$this->db->where('users', $wher);
		$this->db->order_by('id','desc');
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function databeritauser($wher="") {
		$this->db->select('*');
		$this->db->from('berita'); //8 utk limit
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
		$this->db->from('berita',8);
		$this->db->where('status', $stat);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function pengajuan($stat="terima"){
		$this->db->select('berita.*, users.first_name');
		$this->db->from('berita');
		$this->db->where('status !=', $stat);
		$this->db->join('users','users.id = berita.users','left');
		$this->db->order_by('berita.id','desc');
		$query = $this->db->get();
		return $query->result_array();           	
	}

	function filterar($number,$offset,$search=""){
		$this->db->where('status ', 'terima');
		$this->db->like('judul',$search);
		return $query = $this->db->get('berita',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		$this->db->where('status ', 'terima');
		return $this->db->get('berita')->num_rows();
	}
}