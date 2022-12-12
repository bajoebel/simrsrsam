<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Users_model extends CI_Model{
        function cek_user($username=null,$userPass=null){
            if($username==null) {
                $response['error'] = false;
                $response['message'] = 'username tidak valid';
            }elseif($userPass==null) {
                $response['error'] = false;
                $response['message'] = 'password tidak valid';
            }else{
				$this->db->where('username',$username);
				$this->db->where('userPass',md5($userPass));
				$query = $this->db->get('tbl_users');
				if($query->num_rows() > 0){
                    $row = $query->row_array();
                    if($row['userStatus']=='1'){
                        $response['error'] = true;
                        $response['message'] = $row['username'];
                    }else{
                        $response['error'] = false;
                        $response['message'] = "User belum Aktif. Silahkan lapor kepada Administrator";
                    }
				}else{
					$response['error'] = false;
					$response['message'] = 'Username atau Password anda tidak valid. Silahkan coba kembali.';
				}				
			}
            return $response;
        }
        function update_login_info($uid=null,$sid=null,$lastLogin=null){
            if($uid==null) return false;
            if($sid==null) return false;
            if($lastLogin==null) return false;

            $params = array(
                'sessionID' => $sid,			
                'lastLogin' => $lastLogin
                );
            $this->db->where('username',$uid);
            $query = $this->db->update('tbl_users',$params);
            if($query){
                return true;
            }else{
                return false;
            }
        }

        function cekSessionID(){
            $this->db->where('sessionID',sessionID());
            $query = $this->db->get('tbl_users');
            if($query->num_rows() > 0){
                $res = $query->row_array();
                $this->db->where('username',$res['username']);
                $queUsersAdmin = $this->db->get('tbl_users');
                if($queUsersAdmin->num_rows() > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
    }

?>