<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kwitansi_model extends CI_Model
{

    function getRiwayatKunjungan($limit, $start, $q, $jns_layanan = 'RJ', $status = "0")
    {
        //$this->db->select('id_daftar,nomr,no_ktp,nama_pasien, tempat_lahir, tgl_lahir,jns_kelamin,no_bpjs');
        $this->db->select('*');
        $this->db->where('jns_layanan', $jns_layanan);
        $this->db->where('status_transaksi', $status);
        $this->db->group_start();
        $this->db->like('no_bpjs', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('no_ktp', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('jns_kelamin', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        if ($jns_layanan == "RJ" || $jns_layanan == "GD") $this->db->where("id_daftar NOT IN (SELECT id_daftar FROM tbl02_pendaftaran WHERE jns_layanan='RI')");
        //elseif($jns_layanan=="RI") 
        //$this->db->where("jns_layanan", $jns_layanan);
        //$this->db->group_by('id_daftar');
        $this->db->order_by('idx', 'desc');
        return $this->db->get('tbl02_pendaftaran')->result();
    }
    function countRiwayatKunjungan($q, $jns_layanan = 'RJ', $status = "0")
    {
        $this->db->where('jns_layanan', $jns_layanan);
        $this->db->where('status_transaksi', $status);
        $this->db->group_start();
        $this->db->like('no_bpjs', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('no_ktp', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('jns_kelamin', $q);
        //$this->db->group_by('id_daftar');
        $this->db->group_end();
        if ($jns_layanan == "RJ" || $jns_layanan == "GD") $this->db->where("id_daftar NOT IN (SELECT id_daftar FROM tbl02_pendaftaran WHERE jns_layanan='RI')");
        return $this->db->get('tbl02_pendaftaran')->num_rows();
    }
    function getKunjungan($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl02_pendaftaran')->row();
    }

    /*function getNota($id_daftar){
        $this->db->where('id_daftar', $id_daftar);
        $this->db->order_by('reg_unit');
        return $this->db->get('tbl03_nota_tagihan')->result();
    }*/

    function getNota($id_daftar)
    {
        $this->db->select('a.date_created,a.id_daftar,a.reg_unit,a.nomr,a.id_tarif,a.layanan,a.jasa_sarana,
            a.jasa_pelayanan,a.tarif_layanan,a.kategori_id,a.kelas_id,a.jml,a.sub_total_tarif,a.id_dokter,
            a.user_exec,SUM(a.jml) AS jmltindakan,SUM(a.sub_total_tarif) AS sub_total_tarif,b.id_ruang,b.nama_ruang,b.status_transaksi');
        //$this->db->select('*, SUM(a.jml) AS jmltindakan,SUM(a.sub_total_tarif) AS sub_total_tarif')
        $this->db->join('tbl02_pendaftaran b', 'b.reg_unit=a.reg_unit');
        $this->db->where('a.id_daftar', $id_daftar);
        $this->db->where("a.reg_unit NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)");
        $this->db->group_by('b.id_ruang,a.id_tarif');
        $this->db->order_by('b.tgl_masuk,a.reg_unit');
        return $this->db->get("tbl03_nota_detail a")->result();
    }
    function cekNota($id_daftar)
    {
        $this->db->join('tbl02_pendaftaran b', 'b.reg_unit=a.reg_unit');
        $this->db->where('a.id_daftar', $id_daftar);
        $this->db->where("a.reg_unit NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)");
        $this->db->group_by('b.id_ruang,a.id_tarif');
        $this->db->order_by('b.tgl_masuk,a.reg_unit');
        $nota   = $this->db->get("tbl03_nota_detail a")->num_rows();
        $farmasi = $this->countFarmasi($id_daftar);
        $total_nota = $nota + $farmasi;
        return $total_nota;
    }
    function countFarmasi($id_daftar)
    {
        $this->db->where('id_daftar', $id_daftar);
        $this->db->select('tbl04_penjualan.KDJL,tbl04_penjualan.TGLJUAL,KDBRG,NMBRG,HJUAL,JMLJUAL,SUBTOTAL');
        $this->db->join('tbl04_penjualan_detail', 'tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL');
        $this->db->where("tbl04_penjualan_detail.KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)");
        return $this->db->get('tbl04_penjualan')->num_rows();
    }
    function getFarmasi($id_daftar)
    {
        $this->db->where('id_daftar', $id_daftar);
        $this->db->select('tbl04_penjualan.KDJL,tbl04_penjualan.TGLJUAL,KDBRG,NMBRG,HJUAL,JMLJUAL,SUBTOTAL');
        $this->db->join('tbl04_penjualan_detail', 'tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL');
        $this->db->where("tbl04_penjualan_detail.KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail)");
        return $this->db->get('tbl04_penjualan')->result();
    }
    function getTglMasuk($id_daftar, $jns_layanan)
    {
        $this->db->select('tgl_masuk');
        $this->db->where('id_daftar', $id_daftar);
        $this->db->where('jns_layanan', $jns_layanan);
        $this->db->order_by('tgl_masuk');
        $this->db->limit(1);
        $data = $this->db->get('tbl02_pendaftaran');
        if ($data->num_rows() > 0) {
            return $data->row()->tgl_masuk;
        } else {
            return "";
        }
    }

    function getDokter()
    {
        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
        return $this->db->get('tbl01_dokter')->result();
    }
    function getCarabayar()
    {
        return $this->db->get('tbl01_cara_bayar')->result();
    }
    function rowCarabayar($id_cara_bayar)
    {
        $this->db->where('idx', $id_cara_bayar);
        return $this->db->get('tbl01_cara_bayar')->row();
    }

    function insertKwitansi($data)
    {
        $this->db->insert('tbl05_kwitansi', $data);
        $insert_id = $this->db->insert_id();
        $this->db->where('idx', $insert_id);
        return $this->db->get('tbl05_kwitansi')->row()->no_kwitansi;
    }
    function insertDetail($data)
    {
        $this->db->insert_batch('tbl05_kwitansi_detail', $data);
    }
    function insertDetailItem($data)
    {

        $this->db->insert_batch('tbl05_kwitansi_detail_item', $data);
    }
    function cekTransaksi($id_daftar)
    {
        $this->db->where('id_daftar', $id_daftar);
        //$this->db->select('SUM(status_transaksi) as finish_transaksi');
        $this->db->select("
            SUM((CASE WHEN (`status_transaksi` = '0') THEN 1 ELSE 0 END)) AS `unfinish_transaksi`,
            SUM((CASE WHEN (`status_transaksi` = '1') THEN 1 ELSE 0 END)) AS `finish_transaksi`,
            SUM((CASE WHEN (`ada_resep` = '1') THEN 1 ELSE 0 END)) AS `pakai_resep`,
            SUM((CASE WHEN (`ada_resep` = '0') THEN 1 ELSE 0 END)) AS `tanpa_resep`
        ");
        $row = $this->db->get('tbl02_pendaftaran');
        if ($row->num_rows() > 0) {
            return $row->row();
        } else {
            return 0;
        }
    }
    function insertNotaDetail($id_daftar, $no_kwitansi)
    {
        return $this->db->query("INSERT INTO tbl05_kwitansi_detail (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item) 
            (SELECT '$no_kwitansi' AS no_kwitansi, tbl03_nota_detail.reg_unit AS kode_item, 
            id_ruang AS kode_unit, nama_ruang AS nama_unit,SUM(sub_total_tarif) AS total_item,
            '1' AS jenis_item FROM tbl03_nota_detail 
            JOIN tbl02_pendaftaran ON tbl03_nota_detail.reg_unit = tbl02_pendaftaran.reg_unit 
            WHERE tbl03_nota_detail.id_daftar = '$id_daftar' AND 
            tbl03_nota_detail.reg_unit NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail) GROUP BY tbl03_nota_detail.reg_unit)");
    }

    function insertFarmasiDetail($id_daftar, $no_kwitansi)
    {
        return $this->db->query("INSERT INTO tbl05_kwitansi_detail (no_kwitansi,kode_item,kode_unit,nama_unit,total_item,jenis_item)
            SELECT '$no_kwitansi' AS no_kwitansi, tbl04_penjualan.KDJL AS kode_item, 
            '0' AS kode_unit,'Pemakaian Obat' AS nama_unit, SUM(SUBTOTAL) AS total_item, 
            '2' AS jenis_item FROM tbl04_penjualan 
            JOIN tbl04_penjualan_detail ON tbl04_penjualan.KDJL=tbl04_penjualan_detail.KDJL  
            WHERE ID_DAFTAR='$id_daftar' AND tbl04_penjualan_detail.KDJL NOT IN (SELECT kode_item FROM tbl05_kwitansi_detail) 
            GROUP BY tbl04_penjualan_detail.KDJL");
    }
    function getDoker($nrp)
    {
        $this->db->where('NRP', $nrp);
        return $this->db->get('tbl01_pegawai')->row();
    }
    function getTransaksi($id_daftar)
    {
        $this->db->where('tbl02_pendaftaran.id_daftar', $id_daftar);
        //$this->db->join('tbl04_penjualan','tbl04_penjualan.reg_unit=tbl02_pendaftaran.reg_unit');
        return $this->db->get('tbl02_pendaftaran')->result();
    }
    function getDiagnosaAkhir($id_daftar)
    {
        $this->db->where('id_daftar', $id_daftar);
        return $this->db->get('tbl03_diagnosa_akhir')->row();
    }
    function getDiagnisa($reg_unit)
    {
        $this->db->join('tbl02_pendaftaran', 'tbl02_pendaftaran.idx=tbl03_diagnosa.idx_pendaftaran');
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl03_diagnosa')->row();
    }
    function getKwitansi($id_daftar)
    {
        $this->db->where('id_daftar', $id_daftar);
        return $this->db->get('tbl05_kwitansi')->row();
    }
    function cekfarmasi($reg_unit)
    {
        $this->db->where('tbl04_penjualan.reg_unit', $reg_unit);
        return $this->db->get('tbl04_penjualan')->num_rows();
    }
    function cekTransaksiFarmasi($id_daftar)
    {
        $this->db->where('id_daftar', $id_daftar);
        return $this->db->get('tbl04_penjualan')->num_rows();
    }

    //Bridging INACBG
    function ws_inacbg($ws_query)
    {
        $key = ENCRYPT_KEY;
        $payload = $this->inacbg_encrypt($ws_query, $key);

        $header = array("Content-Type: application/x-www-form-urlencoded");
        $url = HOST_EC;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($ch);

        // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
        // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
        $first  = strpos($response, "\n") + 1;
        $last   = strrpos($response, "\n") - 1;
        $response  = substr($response, $first, strlen($response) - $first - $last);
        // decrypt dengan fungsi inacbg_decrypt
        $response = $this->inacbg_decrypt($response, $key);
        return $response;
    }

    // Encryption Function
    function inacbg_encrypt($data, $key)
    {
        /// make binary representasion of $key
        $key = hex2bin($key);
        /// check key length, must be 256 bit or 32 bytes
        if (mb_strlen($key, "8bit") !== 32) {
            throw new Exception("Needs a 256-bit key!");
        }
        /// create initialization vector
        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        $iv = openssl_random_pseudo_bytes($iv_size); // dengan catatan dibawah
        /// encrypt
        $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
        /// create signature, against padding oracle attacks
        $signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
        /// combine all, encode, and format
        $encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
        return $encoded;
    }
    // Decryption Function
    function inacbg_decrypt($str, $strkey)
    {
        /// make binary representation of $key
        $key = hex2bin($strkey);
        /// check key length, must be 256 bit or 32 bytes
        if (mb_strlen($key, "8bit") !== 32) {
            throw new Exception("Needs a 256-bit key!");
        }
        /// calculate iv size
        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        /// breakdown parts
        $decoded = base64_decode($str);
        $signature = mb_substr($decoded, 0, 10, "8bit");
        $iv = mb_substr($decoded, 10, $iv_size, "8bit");
        $encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
        /// check signature, against padding oracle attack
        $calc_signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
        if (!inacbg_compare($signature, $calc_signature)) {
            return "SIGNATURE_NOT_MATCH"; /// signature doesn't match
        }
        $decrypted = openssl_decrypt($encrypted, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }
}
