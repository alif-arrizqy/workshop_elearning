<?php
class Login_model extends CI_Model{
	
	function insert($data){
		$this->db->insert('tbl_login', $data);
		return $this->db->insert_id(); 
	}

	function select_biodata_admin($id_admin){
		$query=$this->db->query("SELECT * FROM tbl_biodata_admin WHERE id_admin='$id_admin'");
		return $query->result();
	}

	function auth_admin($username,$password){
		$query=$this->db->query("SELECT * FROM tbl_admin WHERE password=MD5('$password') AND status='1' AND username='$username' LIMIT 1");
		return $query;
	}

	function select_biodata_user($id_user){
		$query=$this->db->query("SELECT * FROM tbl_biodata_user WHERE id_user='$id_user'");
		return $query->result();
	}

	function auth_user($username,$password){
		$query=$this->db->query("SELECT * FROM tbl_user WHERE password=MD5('$password') AND status='1' AND username='$username' LIMIT 1");
		return $query;
	}

	function select_session($username,$level){
		$query=$this->db->query("SELECT * FROM tbl_session WHERE level='$level' AND username='$username' LIMIT 1");
		return $query;
	}

	function select_session1($username){
		$query=$this->db->query("SELECT * FROM tbl_session WHERE username='$username' LIMIT 1");
		return $query;
	}

	function insert_session($kirimdata){
        $query = $this->db->insert('tbl_session', $kirimdata);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    function hapus_session($username){
        $this->db->where('username', $username);
        $this->db->delete('tbl_session');
    }
}