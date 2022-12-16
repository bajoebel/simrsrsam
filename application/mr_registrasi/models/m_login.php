<?php 
 
class M_login extends CI_Model{	
	function cek_login($where){		
            return $this->db->get_where('m_login_baru',$where);
	}
}