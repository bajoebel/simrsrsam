<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users_model extends CI_Model
{
    function cek_user($NRP = null, $userPasw = null)
    {
        if ($NRP == null) {
            $response['error'] = false;
            $response['message'] = 'username tidak valid';
        } elseif ($userPasw == null) {
            $response['error'] = false;
            $response['message'] = 'password tidak valid';
        } else {
            $this->db->where('NRP', $NRP);
            $this->db->where('userPasw', md5($userPasw));
            $query = $this->db->get('tbl01_pegawai');
            if ($query->num_rows() > 0) {
                $this->db->where('NRP', $NRP);
                $this->db->where('tbl01_acc_level.id_modul', MODUL_ID);
                $this->db->join('tbl01_acc_level', 'tbl01_acc_level.idx=levelid');
                $queUsersAdmin = $this->db->get('tbl01_users_mr_registrasi');
                if ($queUsersAdmin->num_rows() > 0) {
                    $row = $query->row_array();
                    $level = $queUsersAdmin->row()->levelid;
                    if ($row['userStatus'] == '1') {
                        $response['error'] = true;
                        $response['message'] = $row['NRP'];
                        $response['level'] = $level;
                    } else {
                        $response['error'] = false;
                        $response['message'] = "User belum Aktif. Silahkan lapor kepada Administrator";
                        $response['level'] = 0;
                    }
                } else {
                    $response['error'] = false;
                    $response['message'] = "Ops. User anda tidak terdaftar sebagai operator di MR Registrasi App!\nForm ini hanya dapat di akses oleh operator MR Registrasi.\nUntuk informasi silahkan hubungi Administrator";
                }
            } else {
                $response['error'] = false;
                $response['message'] = 'User ID atau Password anda tidak valid. Silahkan coba kembali.';
            }
        }
        return $response;
    }
    function update_login_info($uid = null, $sid = null, $last_log = null)
    {
        if ($uid == null) return false;
        if ($sid == null) return false;
        if ($last_log == null) return false;

        $params = array(
            'session_id' => $sid,
            'last_login' => $last_log
        );
        $this->db->where('NRP', $uid);
        $query = $this->db->update('tbl01_pegawai', $params);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    function cek_session_id()
    {
        $this->db->where('session_id', session_id());
        $query = $this->db->get('tbl01_pegawai');
        if ($query->num_rows() > 0) {
            $res = $query->row_array();
            $this->db->where('NRP', $res['NRP']);
            $queUsersAdmin = $this->db->get('tbl01_users_mr_registrasi');
            if ($queUsersAdmin->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function generate_kode($idx, $sep, $tgl_masuk, $id_ruang)
    {
        $this->db->select('no_urut_unit');
        $kondisi = array("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')" => $tgl_masuk, 'id_ruang' => $id_ruang);
        $this->db->where($kondisi);
        $this->db->order_by('no_urut_unit', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get('tbl02_pendaftaran')->row();
        if (empty($data)) {
            $no_urut = 1;
            $nua = 0;
        } else {
            $no_urut = intval($data->no_urut_unit) + 1;
            $nua = $data->no_urut_unit;
        }
        $no_urut_unit = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
        $reg_unit = $sep . $no_urut_unit;

        $data = array('reg_unit' => $reg_unit, 'no_urut_unit' => $no_urut_unit);
        $this->db->where('idx', $idx);
        $this->db->update('tbl02_pendaftaran', $data);
        return $reg_unit;
    }
    function getImport($limit = 10)
    {
        return $this->db->query("SELECT *,DATE_FORMAT(tgl_masuk,'%y%m%d') as format_tgl_masuk 
        FROM db_rspp.tbl02_pendaftaran WHERE reg_unit = '' ORDER BY tgl_masuk ASC LIMIT $limit")->result();
    }

    function getRegUnit($jns_layanan, $tgl_masuk, $id_ruang)
    {
        $data = $this->db->query("SELECT reg_unit FROM `db_rspp`.`tbl02_pendaftaran` 
        WHERE jns_layanan = '$jns_layanan' AND DATE_FORMAT(tgl_masuk,'%y%m%d') = '$tgl_masuk' 
        AND id_ruang = '$id_ruang' AND reg_unit !='' ORDER BY reg_unit DESC LIMIT 1")->row();
        if (!empty($data)) {
            $reg_unit = $data->reg_unit;
            $exp_reg = explode('-', $reg_unit);
            $urut = intval($exp_reg[3]);
            $urut++;
            $nourut = str_pad($urut, 4, "0", STR_PAD_LEFT);
            $new_reg_unit = $jns_layanan . "-" . $tgl_masuk . "-" . str_pad($id_ruang, 2, "0", STR_PAD_LEFT) . "-" . str_pad($urut, 4, "0", STR_PAD_LEFT);
        } else {
            $nourut = '0001';
            $new_reg_unit = $jns_layanan . "-" . $tgl_masuk . "-" . str_pad($id_ruang, 2, "0", STR_PAD_LEFT) . "-0001";
        }
        return array('reg_unit' => $new_reg_unit, 'urut' => $nourut);
    }

    function getData($filter='lama',$tgl='',$q=''){
        $this->onlineDB = $this->load->database('online', true);
        if(empty($tgl)) $tgl=date('Y-m-d');
        if($filter=="lama"){
            $data = $this->onlineDB->join('m_pasien b','a.`nomr` = b.`nomr`')
                ->join('m_poli c','a.`grId` = c.`grId`','LEFT')
                ->where("DATE(a.`tgl_booking`)",$tgl)
                ->group_start()
                ->like('grNama',$q)
                ->or_like('a.kode_booking',$q)
                ->or_like('a.nomr',$q)
                ->or_like('b.nama',$q)
                ->group_end()
                ->order_by('a.tgl_daftar')
                ->get("t_online a")->result();
        }else{
            $data=$this->onlineDB->where("DATE(a.`tgl_booking`)",$tgl)
            ->join('m_poli b','a.`grId` = b.`grId`')
            ->group_start()
                ->like('no_ktp',$q)
                ->or_like('nama',$q)
                ->or_like('tempat_lahir',$q)
                ->or_like('tgl_lahir',$q)
                ->or_like('pekerjaan',$q)
                ->or_like('grNama',$q)
            ->group_end()
            ->order_by('a.tgl_daftar')
            ->get('m_pasien_baru a')->result();
        }
        return $data;
    }
}
