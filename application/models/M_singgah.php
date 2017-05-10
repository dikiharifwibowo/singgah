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
		//$query = $this->db->get('contact');
		//$tampung = $this->db->query('SELECT * FROM contact ORDER BY No_masuk DESC');
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
}