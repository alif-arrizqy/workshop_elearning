<?php
class Dashboard_model extends CI_Model{
	//Admin or Reseller
    function get_all_pengguna(){
    	// $this->db->where('id_role' !=, '1');
    	$query = $this->db->get('tbl_reselleradmin');
    	return $query;
    }
}
?>