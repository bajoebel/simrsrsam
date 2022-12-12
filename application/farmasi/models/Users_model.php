<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Users_model extends CI_Model{
        function cek_user($NRP=null,$userPasw=null){
            if($NRP==null) {
                $response['error'] = false;
                $response['message'] = 'username tidak valid';
            }elseif($userPasw==null) {
                $response['error'] = false;
                $response['message'] = 'password tidak valid';
            }else{
                $this->db->select('*,GROUP_CONCAT(ruang_akses) AS ruang_akses');
                $this->db->join('`tbl01_pegawai` b', 'a.`NRP`=b.`NRP`');
				$this->db->where('a.NRP',$NRP);
				$this->db->where('userPasw',md5($userPasw));
				$query = $this->db->get('`tbl01_users_farmasi` a');
				if($query->num_rows() > 0){

                /*$this->db->where('NRP',$NRP);
                    $this->db->where('tbl01_acc_level.id_modul',MODUL_ID);
                    $this->db->join('tbl01_acc_level','tbl01_acc_level.idx=levelid');
                    $queUsersAdmin = $this->db->get('tbl01_users_farmasi');*/
                //echo $this->db->last_query();
                //echo "<br>";
                //print_r($queUsersAdmin);exit;
                /*if($queUsersAdmin->num_rows() > 0){
                        $row = $query->row_array();
                        $level = $queUsersAdmin->row()->levelid;
                        
                    }else{
                        $response['error'] = false;
                        $response['message'] = "Ops. User anda tidak terdaftar sebagai operator Farmasi App!\nForm ini hanya dapat di akses oleh operator Farmasi.\nUntuk informasi silahkan hubungi Super Administrator";
                        $response['jmldata'] = "";
                        
                    }*/
                    $row=$query->row_array();
                if ($row['userStatus'] == '1') {
                    $response['error'] = true;
                    $response['message'] = $row['NRP'];
                    $response['level'] = $row["levelid"];
                    $response['ruang_akses']=$row["ruang_akses"];
                } else {
                    $response['error'] = false;
                    $response['message'] = "User belum Aktif. Silahkan lapor kepada Administrator";
                    $response['level'] = 0;
                    $response['ruang_akses'] = '';
                }
				}else{
					$response['error'] = false;
					$response['message'] = 'User ID atau Password anda tidak valid. Silahkan coba kembali.';
				}				
			}
            return $response;
        }
        function update_login_info($uid=null,$sid=null,$last_log=null){
            if($uid==null) return false;
            if($sid==null) return false;
            if($last_log==null) return false;

            $params = array(
                'session_id' => $sid,			
                'last_login' => $last_log
                );
            $this->db->where('NRP',$uid);
            $query = $this->db->update('tbl01_pegawai',$params);
            if($query){
                return true;
            }else{
                return false;
            }
        }

        function cek_session_id(){
            $this->db->where('session_id',session_id());
            $query = $this->db->get('tbl01_pegawai');
            if($query->num_rows() > 0){
                $res = $query->row_array();
                $this->db->where('NRP',$res['NRP']);
                $queUsersAdmin = $this->db->get('tbl01_users_farmasi');
                if($queUsersAdmin->num_rows() > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        function getLokasiakses($klok=""){
            $UID = $this->session->userdata('get_uid');
            if(empty($klok)){
                $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
                FROM tbl01_users_farmasi WHERE NRP = '$UID')";
            }else{
                $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
                FROM tbl01_users_farmasi WHERE NRP = '$UID') AND KDGRLOKASI='$klok'";
            }
            return $this->db->query("$SQL")->num_rows();
        }
    }

?>