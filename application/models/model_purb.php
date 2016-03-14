<?php if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

class Model_Purb extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	function get_data($table){
		return $this->db->get($table);
	}
	
	function get_data_where($pk,$id,$table){
		$this->db->where($pk,$id);
		return $this->db->get($table);
	} 
	
	function get_data_limit($table, $limit, $offset){
		return $this->db->get($table, $limit , $offset);
	}
	
	function get_login($username,$password){
		return $this->db->query("select * from purb_user where user_username='".$username."' and user_password='".$password."'");
	}
	
	function get_update($table,$data,$pk,$id){
		$this->db->where($pk,$id);
		return $this->db->update($table,$data);
	}
	
	function get_insert($table,$data){
		return $this->db->insert($table,$data);
	}
	
	function get_delete($table,$pk,$id){
		$this->db->where($pk,$id);
		return $this->db->delete($table);
	}
	
	function getMaxKode($table, $pk, $kode)
	{
		$q = $this->db->query("select MAX(RIGHT(".$pk.",4)) as kd_max from ".$table."");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%04s", $tmp);
			}
		}
		else
		{
			$kd = "0001";
		}	
		return $kode.$kd;
	}
}

/*End of file model_purb.php*/
/*Location:.application/models/model_purb.php*/