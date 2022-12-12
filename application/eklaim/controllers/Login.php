<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->view('login');
    }
    function loginCek(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
        	if(
        		isset($_POST['username']) &&
        		isset($_POST['userPass'])
    		){
    			$username = $this->input->post('username',true);
    			$userPass = $this->input->post('userPass',true);
        		if ($username=="" || $userPass=="") {
	    			$x['error'] = true;
	    			$x['message'] = "Some varible empty";
        		}else{
        			$this->db->where('username',$username);
        			$this->db->where('userPass',md5($userPass));
        			$cekQuery = $this->db->get('tbl_users');
        			if ($cekQuery->num_rows() > 0) {
        				$resQuery = $cekQuery->row_array();
        				if ($resQuery['userStatus'] == 1) {
		    				$paramUpdate = array(
			    				'sessionID' => sessionID(),
			    				'lastLogin' => date('Y-m-d H:i:s')
		    				);
		        			$this->db->where('username',$username);
		        			$cekCommand = $this->db->update('tbl_users',$paramUpdate);
		    				if ($cekCommand) {
				    			$x['error'] = false;
				    			$x['message'] = $username;

				    			$params = array(
				    				'isLogin' => true,
				    				'isUserLogin' => $username
			    				);
			    				$this->session->set_userdata($params);
		    				}else{
				    			$x['error'] = true;
				    			$x['message'] = "Ops. Connection DB Error. Please try again.";
		    				}        					
        				}else{
			    			$x['error'] = true;
			    			$x['message'] = "Ops. User not active. Please call administrator";
        				}
        			}else{
		    			$x['error'] = true;
		    			$x['message'] = "Ops. Username or password not valid. Please try again.";
        			}
        		}
    		}else{
    			$x['error'] = true;
    			$x['message'] = "Some varible not found";
    		}
		}else{
			$x['error'] = true;
			$x['message'] = "Method not allowed";
		}
		echo json_encode($x);
    }

    function logout(){
        $this->session->unset_userdata('isLogin');
        $this->session->unset_userdata('isUserLogin');
        $this->load->view('login');
    }
}
?>