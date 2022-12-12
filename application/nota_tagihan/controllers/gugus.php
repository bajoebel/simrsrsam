<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gugus extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('gugusmodel');
		$cont=$this->uri->segment(1);
		//$cekakses=$this->usermodel->getakses($cont);
		$cekakses=true;
		if($this->session->userdata('sireg_unp_login')==false || $cekakses==false)
			redirect('login/denied');
	}

	public function index()
	{
		$x['judul']="Home";
		$x['content']=$this->load->view('admin/home','',true);
		$this->load->view('admin/utama',$x);
	}
	public function data_fak()
	{
		if(isset($_POST['tahun'])){
			$tahun=$_POST['tahun'];
			$this->session->set_userdata('sireg_unp_tahun',$tahun);
		}
		else
			$tahun='';
		$tahun=$this->session->userdata('sireg_unp_tahun');
		$xx['tahun']=$tahun;
		$xx['angkatan']=$this->gugusmodel->getangkatan();
		$xx['sk']=$this->gugusmodel->getfakgugus($tahun);
		$x['judul']="Data Induk gugus";
		$x['content']=$this->load->view('gugus/data_fak',$xx,true);
		$this->load->view('admin/utama',$x);
	}
	public function simpan_ver_jalur()
	{
		if(!empty($_POST['idjalur'])){
//			$nosk=$_POST['nosk'];
			$ket=$_POST['keterangan'];
			$idjalur=$_POST['idjalur'];
//			$tanggalsk=$_POST['tanggalsk'];
			$tahun=$this->session->userdata('sireg_unp_tahun');
			$userid=$this->session->userdata('sireg_unp_userid');
			$this->session->set_userdata('jalur',$idjalur);
			$this->gugusmodel->simpanverjalur($ket,$idjalur,$tahun,$userid);
		}
		redirect('gugus/data_ver_jalur');
	}
	public function lihatdata()
	{
		$ps='';
		$fak=$this->uri->segment(3);
		$tahun=$this->session->userdata('sireg_unp_tahun');
		$dsk=$this->gugusmodel->getfakwhere($fak);
		$xsk=$dsk->row();
		$xx['faknama']=$xsk->faknamaresmi;
		$xx['tahun']=$tahun;
		$xx['mhs']=$this->gugusmodel->getmhsasli($fak,$tahun);
		$x['judul']="Data Gugus";
		$x['content']=$this->load->view('gugus/data_gugus',$xx,true);
		$this->load->view('admin/utama',$x);
	}
	public function simpanvalidnilai(){
		$jml=$_POST['jmldata'];
		$valid=$_POST['valid'];
		$vnjid=$_POST['vnjid'];
		$vndid=$_POST['vndid'];
		$user=$this->session->userdata('sireg_unp_userid');
		$i=0;
		$id='';
		$v='';
		for($i=1;$i<=$jml;$i++){

			if(isset($valid[$i])){
				$id=$vndid[$i];
				$v=$valid[$i];
				$this->db->query("update ver_nilai_data set vndvalid='$v',vndtanggalvalid=now(),vnduservalid='$user' where vndvnjid='$vnjid' and vndid='$id'");
			}
		}
		redirect('gugus/lihatdata/'.$vnjid.'/lihat data.html');
	}
	public function data_program_studi()
	{
		$xx['mhs']=$this->gugusmodel->get_data_prodi();
		$x['judul']="Program Studi";
		$x['content']=$this->load->view('admin/data_program_studi',$xx,true);
		$this->load->view('admin/utama',$x);
	}
	public function data_jalur_masuk()
	{
		$xx['mhs']=$this->gugusmodel->get_data_jalur();
		$x['judul']="Jalur Masuk";
		$x['content']=$this->load->view('admin/data_jalur_masuk',$xx,true);
		$this->load->view('admin/utama',$x);
	}
	public function lihatcontoh()
	{
		$x['content']=$this->load->view('admin/data_tables','',true);
		$this->load->view('admin/utama',$x);
	}

	public function uploadcalon()
	{
		$c['judul']="Upload Data Calon";
		$userid=$this->session->userdata('sireg_unp_admin');
		$idsk=$this->uri->segment(3);
		$x['valid']=false;
		if(!empty($idsk)){
			$jml=0;
			$jumlah=0;
		//	$idsk=$_POST['idsk'];
			$sk=$this->gugusmodel->getskwhere($idsk);
			if($sk->num_rows()>0)
			{
				$xsk=$sk->row();
				$x['nosk']=$xsk->nosk;
				$x['tanggalsk']=$xsk->tanggalsk;
			}
			if(isset($_FILES['f'])){
				$file=$_FILES['f']['tmp_name'];
				$this->load->library('excel');
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
				$i=0;
				foreach ($cell_collection as $cell) {
					
					$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
					$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
					$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				 
					//header will/should be in row 1 only. of course this can be modified to suit your need.
					if($column=='B' && $row==1){
						$nosk=mysql_real_escape_string($data_value);
						//echo $notest.'<br>';
					}
					if($column=='A' && $row>2){
						$i++;
						$notest[$i]=mysql_real_escape_string($data_value);
						//echo $notest.'<br>';
					}
					if($column=='B' && $row>2){
						$nama[$i]=mysql_real_escape_string($data_value);
						//echo $notest.'<br>';
					}
					if($column=='C' && $row>2){
						$ps[$i]=$data_value;			
						//echo $i.'|'.$notest.'|'.$nama.'|'.$ps.'<br/>';
					}
				}
//				echo 'No. SK :'.$nosk;
//				echo '<br/>';
		
			$jml=$i;
			$userid=$this->session->userdata('sireg_unp_userid');
			if($x['nosk']==$nosk){
				$y=0;
				$this->db->trans_start();
				$this->db->query("delete from upload_calon_xls where idsk='$idsk'");
				for($y=1;$y<=$i;$y++){
					//echo $y.'|'.$notest[$y].'|'.$nama[$y].'|'.$ps[$y].'<br/>';
					if(!empty($notest[$y])){
						$this->db->query("insert into upload_calon_xls(idsk,notest,nama,idprogramstudi,tanggalinsert,userid) values('$idsk','".$notest[$y]."','".$nama[$y]."','".$ps[$y]."',now(),'$userid')");
					}
				}
				$this->db->trans_complete();
				$x['valid']=true;
			}else
				$x['valid']=false;
			$x['rows'] = $this->db->query("select * from upload_calon_xls where idsk='$idsk'");
		}
			$x['row_count']=$jml;
			$x['idsk']=$idsk;			
			$c['content']=$this->load->view('admin/upload_calon_x',$x,true);
		}else
			$c['content']='Maaf';
			$this->load->view('admin/utama',$c);
	}

	function uploadcalonx()
	{
	//if($this->session->userdata('aminjnplogin') && $this->session->userdata('aminjnpakses')==2){
		$c['judul']="Upload Data Calon";
		$userid=$this->session->userdata('sireg_unp_admin');
		$idsk=$this->uri->segment(3);
		$x['valid']=false;
		if(!empty($idsk)){
			$jml=0;
			$jumlah=0;
		//	$idsk=$_POST['idsk'];
			$sk=$this->gugusmodel->getskwhere($idsk);
			if($sk->num_rows()>0)
			{
				$xsk=$sk->row();
				$x['nosk']=$xsk->nosk;
				$x['tanggalsk']=$xsk->tanggalsk;
			}
			if(isset($_FILES['f'])){
			$this->excelreader->read($_FILES['f']['tmp_name']);
			$rows = $this->excelreader->worksheets[0];
			$x['rows'] = $this->excelreader->worksheets[0];
			$jml = count($this->excelreader->worksheets[0]);
			$jml=$jml-1;
			$nosk=$rows[0][2];
//			$angkatan=$rows[1][2];
//			$idjalur=$rows[2][2];
//------------- ceking data
//				$jumlah;
			if($x['nosk']==$nosk){
				 $i=0;
				 $userid=$this->session->userdata('sireg_unp_userid');
				 $this->db->trans_start();
				 $this->db->query("delete from upload_calon_xls where idsk='$idsk'");
				 for($i=3;$i<=$jml;$i++){
					 if(isset($rows[$i][1]))
						 $notest=$rows[$i][1];
					 else
						 $notest=0;
					 if(isset($rows[$i][2]))
						 $nama=$rows[$i][2];
					 else
						 $nama=0;
					if(isset($rows[$i][3]))
						 $idps=$rows[$i][3];
					 else
						 $idps=0; 
					$this->db->query("insert into upload_calon_xls(idsk,notest,nama,idprogramstudi,tanggalinsert,userid) values('$idsk','$notest','$nama','$idps',now(),'$userid')");
				 }
				 $this->db->trans_complete();
				$x['valid']=true;
			}else
				$x['valid']=false;
			}
			$x['row_count']=$jml;
			$x['idsk']=$idsk;			
			$c['content']=$this->load->view('admin/upload_calon',$x,true);
		}else
			$c['content']='Maaf';
			$this->load->view('admin/utama',$c);
	//	}else
	//		redirect('login/denied');
	}

	public function downloadcalon()
	{
		$idsk=$this->uri->segment(3);
		$dsk=$this->gugusmodel->getskwhere($idsk);
		$xsk=$dsk->row();
		$tahun=$xsk->tahunsk;
		$tahun2=$tahun+1;
		$xx['nosk']=$xsk->nosk;
		$xx['tanggalsk']=$xsk->tanggalsk;
		$xx['tahunsk']=$tahun.'/'.$tahun2;
		$xx['namajalur']=$xsk->namajalur;
		$xx['idsk']=$idsk;

		$xx['mhs']=$this->gugusmodel->getmhs($idsk);
//		$x['judul']="Data Calon";
		$this->load->view('admin/data_calon_download',$xx);
//		$this->load->view('admin/utama',$x);
	}
	public function cetakdaftar()
	{
		$tahun=$this->session->userdata('sireg_unp_tahun');
		$fakid=$this->uri->segment(3);
		$dsk=$this->gugusmodel->getfakwhere($fakid);
		$xsk=$dsk->row();
		$namafak=$xsk->faknamaresmi;
		$namapendek=$xsk->faknamasingkat;
		$tahun2=$tahun+1;

		$xx['tahun']=$tahun.'/'.$tahun2;
		$xx['namafak']=$namafak;
		$xx['namapendek']=$namapendek;

		$xx['mhs']=$this->gugusmodel->getmhs($fakid,$tahun);
//		$x['judul']="Data Calon";
//		echo $namafak;
		$this->load->view('gugus/data_report',$xx);
//		$this->load->view('admin/utama',$x);
	}

	public function cetakdaftarasli()
	{
		$tahun=$this->session->userdata('sireg_unp_tahun');
		$fakid=$this->uri->segment(3);
		$dsk=$this->gugusmodel->getfakwhere($fakid);
		$xsk=$dsk->row();
		$namafak=$xsk->faknamaresmi;
		$namapendek=$xsk->faknamasingkat;
		$tahun2=$tahun+1;

		$xx['tahun']=$tahun.'/'.$tahun2;
		$xx['namafak']=$namafak;
		$xx['namapendek']=$namapendek;

		$xx['mhs']=$this->gugusmodel->getmhsasli($fakid,$tahun);
//		$x['judul']="Data Calon";
//		echo $namafak;
		$this->load->view('gugus/data_report_asli',$xx);
//		$this->load->view('admin/utama',$x);
	}

	public function cetakrekapprodi()
	{
		$vnjid=$this->uri->segment(3);
		$dsk=$this->gugusmodel->getvnjwhere($vnjid);
		$xsk=$dsk->row();
		$tahun=$xsk->vnjtahun;
		$tahun2=$tahun+1;

		$xx['vnjtahun']=$tahun.'/'.$tahun2;
		$xx['namajalur']=$xsk->namajalur;
		$xx['vnjid']=$vnjid;
		$xx['mhs']=$this->gugusmodel->getrekapprodi($vnjid);
		$this->load->view('gugus/rekap_prodi',$xx);
	}
	function simpancalonupload(){
		$idsk=$_POST['idsk'];
		$data=$this->gugusmodel->getjumlahcalon($idsk);
		if($data>0){
			$this->gugusmodel->simpancalonupload($idsk);
		}
		redirect(base_url().'admin/lihatcalon/'.$idsk);
	}
	function hapus_sk_calon(){
		$idsk=$_POST['idsk'];
		$this->gugusmodel->hapusskcalon($idsk);
		redirect(base_url().'admin/data_sk_calon/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */