<?php 

class M_Kegiatan extends CI_Model {

	
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
		$this->db->from('kegiatan'); //8 utk limit
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 


	function kodekegiatan(){
		$this->db->select('RIGHT(kegiatan.id,3) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('kegiatan');
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
		$kodejadi = "KG".$kodemax;
		return $kodejadi;
	}

	public function rec_kegiatan($wher="terima") {
		$this->db->select('*');
		$this->db->from('kegiatan'); //8 utk limit
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
		$this->db->from('kegiatan');
		$this->db->where('id', $wher);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function listkegiatanuser($wher="") {
		$this->db->select('*');
		$this->db->from('kegiatan'); 
		$this->db->where('users', $wher);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function filter($stat="terima") {
		$this->db->select('*');
		$this->db->from('kegiatan',8);
		$this->db->where('status', $stat);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function pengajuan($stat="terima"){
		$this->db->select('kegiatan.*, users.first_name');
		$this->db->from('kegiatan');
		$this->db->where('status !=', $stat);
		$this->db->join('users','users.id = kegiatan.users','left');
		$this->db->order_by('kegiatan.id','desc');
		$query = $this->db->get();
		return $query->result_array();           	
	}

	function filterkg($number,$offset,$search=""){
		$this->db->where('status ', 'terima');
		$this->db->like('judul',$search);
		return $query = $this->db->get('kegiatan',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		$this->db->where('status ', 'terima');
		return $this->db->get('kegiatan')->num_rows();
	}

}