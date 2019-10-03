<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Roles extends CI_Model {
	var $tabel    = 'roles';
	function __construct()
	{
		parent::__construct();
	}

	function getAll(){
		return $this->db->query("select * from roles")->result();
	}

	function post($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	function getOneId($id){
		return $this->db->query("select * from roles where id='$id'")->result();
	}

	function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('roles', $data);
	}

	function destroy($id){
		$this->db->where('id', $id);
		$this->db->delete('roles');
	}


}

/* End of file M_entry.php */
/* Location: ./application/models/M_entry.php */