<?php 

class M_Singgah extends CI_Model {

	
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
	public function edit($id){
		$tampung = $this->db->query("select * from rumah ".$id);
		return $tampung->row(); 
	}

	public function delete($table,$primary){
		$tampung = $this->db->delete($table,$primary);
		return $tampung;
	}

	public function list() {
		$this->db->select('*');
		$this->db->from('rumah'); //8 utk limit
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function listmap($wher="terima") {
		$this->db->select('id,nama,latitude,longitude,alamat');
		$this->db->from('rumah'); 
		$this->db->where('status', $wher);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function listmapfilter($city) {
		$this->db->select('id,nama,latitude,longitude,alamat');
		$this->db->from('rumah'); 
		$this->db->where('status', 'terima');
		$this->db->where('kota', $city);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function listrumah($wher="") {
		$this->db->select('*');
		$this->db->from('rumah'); 
		$this->db->where('user', $wher);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
	} 

	public function selectchangefoto($table,$id){
		$tampung = $this->db->query("select * from $table ".$id);
		return $tampung->row(); 
	}

	public function pengajuan($stat="terima"){
		$this->db->select('rumah.*, users.first_name');
		$this->db->from('rumah');
		$this->db->where('status !=', $stat);
		$this->db->join('users','users.id = rumah.user','left');
		$this->db->order_by('rumah.id','desc');
		$query = $this->db->get();
		return $query->result_array();           	
	}

	//table booking, tapi load rumah singgah
    public function listbooking($user="") {
    	$this->db->select('rumah.*, booking.*');
		$this->db->from('rumah');
		$this->db->where('rumah.user', $user);
		$this->db->join('users','users.id = rumah.user','right');
		$this->db->join('booking','booking.rumah = rumah.id','right');
		$this->db->order_by('rumah.id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
    }

    public function editrumah($id) {
    	$this->db->select('rumah.*, users.phone');
		$this->db->from('rumah');
		$this->db->where('rumah.id', $id);
		$this->db->join('users','users.id = rumah.user','right');
		$tampung = $this->db->get();
		return $tampung->row(); 
    }

    public function getbooking($id) {
    	$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('id', $id);
		$tampung = $this->db->get();
		return $tampung->row(); 
    }
}