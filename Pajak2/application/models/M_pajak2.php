<?php

class M_pajak2 extends CI_Model{
	function get_id1($id){
		return $this->db->query("SELECT id FROM user where id=$id");
	}
	function get_id2($kode_akun2){
		return $this->db->query("SELECT id FROM data where kode_user='$kode_akun2'");
	}
	function tampil_user(){
		return $this->db->query("SELECT * FROM user");
	}
	function tampil_neraca(){
		return $this->db->query("SELECT * FROM neraca");
	}
	function tampil_data(){
		return $this->db->query("SELECT * FROM data");
	}
	function get_id($dates){
		return $this->db->query("SELECT id FROM user WHERE periode='{$dates}'");
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
		// $this->db->query("INSERT $data INTO $table");
	}
	function edit_data($data1,$table){
		return $this->db->get_where($table,$data1);
		// return $this->db->query("SELECT $data1 FROM $table");
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
		// $this->db->query("UPDATE $table SET $data WHERE id=$where");
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function get_by_id_general($table, $id, $val)
  {
    $query = $this->db->where($id, $val)->get($table);
    return $query->result();
  }
	function register($table,$data){
		$this->db->insert($table,$data);
	}
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
}
?>
