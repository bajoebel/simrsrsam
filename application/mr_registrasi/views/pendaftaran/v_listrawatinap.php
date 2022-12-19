
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/list_rawatinap');?>">Home</a>
                </li>

                <li class="active">List Pasien Rawat Inap</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST PASIEN RAWAT INAP
                            </h1>
                    </div><!-- /.page-header -->

                <div class="row">
                    <form class="form-horizontal" name="kunjungan" id="kunjungan" action="<?php echo site_url('pendaftaran/list_rawatinap'); ?>" method="GET">
                     <div class="col-sm-6">
							<div class="form-group">
								<div class="col-xs-12 col-sm-5">
									<div class="input-group">
										<input type="text" name="tgl" id="tgl" class="date-picker" data-date-format="yyyy-mm-dd" value="<?php echo (!empty($_GET['tgl'])) ? $_GET['tgl'] : date("Y-m-d"); ?>" style='color:#000000;' readonly/>
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-xs-12 col-sm-6">
									<div class="clearfix">
										<select class="select2" id="ruang" name="ruang" data-placeholder="Klik untuk memilih ruang..." style='color:#000000;' onchange="this.form.submit()">
										<option value="">-- Pilih Ruang --</option>
											<?php
											foreach($ruang as $ru){
											?>
											<option value="<?php echo $ru->grId ?>" <?php error_reporting(0); if($_GET['ruang']==$ru->grId) echo "selected"; ?>><?php echo $ru->grNama ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
					</div>
					<div class="col-sm-6 center">
					<div class="col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<input type="text" name="nomr" id="nomr" class="limited col-sm-offset-6 col-xs-12 col-sm-6" maxlength="10" onkeypress="return hanyaAngka(event)" placeholder="Pencarian NoMR" value="<?php echo (!empty($_GET['nomr'])) ? $_GET['nomr'] : ''; ?>" style='color:#000000;' />
								<span class="input-group-btn">
									<button class="btn btn-primary btn-sm">
											<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
											Search
									</button>
								</span>
							</div>
						</div>
					</div>
					</div>
                    </form>
                    
                    <div class="col-xs-12">
						<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:400px;border:1px solid grey" class="col-xs-12">
                                    <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
                                        <thead>
											<tr>
                                                <th class="center">NO</th>
                                                <th class="center" >NO REG</th>
                                                <th class="center" >TGL MASUK</th>
                                                <th class="center" >NOMR</th>
                                                <th class="center" >NAMA PASIEN</th>
												<th class="center">GENDER</th>
												<th class="center" >TGL LAHIR</th>
												<th class="center">UMUR</th>
                                                <th class="center" >ALAMAT</th>
												<th class="center" >NO HP</th>
                                                <th class="center">RUANG</th>
												<th class="center" >DIAG AWAL</th>
                                                <th class="center">DPJP</th>
												<th class="center">JNS DATANG</th>
                                                <th class="center" width="100px">#</th>
											</tr>
                                        </thead>

                                        <tbody>
                                            <?php
											if(!empty($_GET['tgl']) || !empty($_GET['nomr']) || !empty($_GET['ruang'])){
                                            $no = ($this->uri->segment('3') + 1) - 1;
                                            foreach ($pasien as $p){
											$data = $this->db->select('nama,tgl_lahir,jns_kelamin,alamat,no_telpon')
															 ->from('m_pasien')
															 ->where('nomr',$p->nomr)
															 ->get()->row_array();
															 
											$lahir=new DateTime($data['tgl_lahir']);
											$today =new DateTime();
											$umur=$today->diff($lahir);
											$usia =$umur->y." Th, ".$umur->m." Bln";
											
                                            $no++;
											if($this->session->userdata("nama") == "ovy"){
												$link = "base_url('pendaftaran/cetaksuratmasukinap/'.$p->id_daftar)";
											}else{
												$link = "base_url('pendaftaran/cetaksuratmasuk/'.$p->id_daftar.'/cetak_ri')";
											}
											
											if($p->id_rujuk == 1){
												$kedatangan = "Datang Sendiri";
											}else{
												$kedatangan = "Rujukan";
											}
                                            echo"<tr>
                                            <td class='center'>$no</td>
                                            <td>$p->id_daftar</td>
                                            <td>$p->tgl_masuk</td>
                                            <td>$p->nomr</td>
                                            <td>$data[nama]</td>
											<td class='center'>$data[jns_kelamin]</td>
											<td>$data[tgl_lahir]</td>
											<td>$usia</td>
                                            <td>$data[alamat]</td>
											<td>$data[no_telpon]</td>
                                            <td>$p->grNama</td>
											<td class='center'>$p->icd_code</td>
											<td>$p->nama_dokter</td>
											<td>$kedatangan</td>
                                            <td class='center'>";
											if($p->status_ranap == 1){
												if($this->session->userdata("kualifikasi") == "1"){
													echo "<a class='btn btn-sm btn-success btn-block' onclick=\"idkembali('".$p->id_admisi."')\">Kembalikan</a>";
												}else{
													echo "Dibatalkan";
												}
											}else if($p->status_ranap == 2){
												if($this->session->userdata("kualifikasi") == "1"){
													echo "<a class='btn btn-sm btn-success btn-block' onclick=\"idkembali('".$p->id_admisi."')\">Kembalikan</a>";
												}else{
													echo "Pulang";
												}
											}else if($p->status_ranap == 3){
												if($this->session->userdata("kualifikasi") == "1"){
													echo "<a class='btn btn-sm btn-success btn-block' onclick=\"idkembali('".$p->id_admisi."')\">Kembalikan</a>";
												}else{
													echo "Kabur";
												}
											}else if($p->status_ranap == 4){
												if($this->session->userdata("kualifikasi") == "1"){
													echo "<a class='btn btn-sm btn-success btn-block' onclick=\"idkembali('".$p->id_admisi."')\">Kembalikan</a>";
												}else{
													echo "Rujuk RS Lain";
												}
											}else if($p->status_ranap == 3){
													echo "Pindah Ruangan";
											}else{
                                                echo"
                                                <div class='hidden-sm hidden-xs action-buttons'>
                                                        <a href='#modal-view' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Detail Kunjungan Pasien' data-id='$p->id_admisi'>
                                                                <i class='ace-icon fa fa-search-plus bigger-130' ></i>
                                                        </a>
														<!-- <a href='".base_url('pendaftaran/cetaksuratmasukinap/'.$p->id_daftar)."' title='Cetak' target='_blank'>
															<i class='ace-icon fa fa-print bigger-130'></i>
														</a> -->
														<a href='#modal-cetak' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Cetak' data-id='$p->id_daftar'>
                                                                <i class='ace-icon fa fa-print bigger-130'></i>
                                                        </a>
														<a data-rel='tooltip' data-placement='left' title='Batalkan' onclick=\"idbatal('".$p->id_admisi."')\">
                                                                <i class='ace-icon fa fa-remove bigger-130'></i>
                                                        </a>
                                                </div>";
											}
											echo"
                                            </td>
                                            </tr>";
                                            }
                                            echo"<tr>
                                            <td align='left' colspan='15'>Jumlah Pasien : $jumlah Orang</td>
                                            </tr>";
											}else{
                                            echo"<tr>
                                            <td align='center' colspan='15'><h3> .: SILAHKAN LAKUKAN PENCARIAN :. </h3></td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <?php 
										if(!empty($_GET['tgl']) || !empty($_GET['nomr']) || !empty($_GET['ruang'])){
                                        echo $this->pagination->create_links();
										}
                                        ?>
                                    </div> 
						</div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
    </div>
</div>      
<div id="modal-cetak" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            CETAK SURAT MASUK / REGISTRASI
                    </div>
            </div>

            <div class="modal-body no-padding">
                <div class="cetak-data"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="modal-view" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            VIEW DETAIL KUNJUNGAN PASIEN
                    </div>
            </div>

            <div class="modal-body no-padding">
                <div class="view-data"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    jQuery(function($) {
        $('[data-rel=tooltip]').tooltip();
		
		$('.select2').css('width','230px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
        
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
        $('#modal-view').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url().'pendaftaran/modalrawat'; ?>',
                data :  'rowid='+ rowid,
                success : function(data){
                    console.log(data)
                $('.view-data').html(data);
                }
            });
        });
		
		$('#modal-cetak').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url().'pendaftaran/modalsuratinap'; ?>',
                data :  'rowid='+ rowid,
                success : function(data){
                    console.log(data)
                $('.cetak-data').html(data);
                }
            });
        });
		
    });
	function idbatal(a){
		if(confirm('Apa anda yakin untuk membatalkan rawat inap?')){
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url().'pendaftaran/batal_ranap'; ?>',
				data :  'rowid='+ a,
				success : function(data){
				var response =  eval("(" + data + ")");
					if(response.MESSAGE=="OK"){
						document.kunjungan.submit();
					}else{
						bootbox.alert(response.MESSAGE);
					}
				},
				error:function(xhr, ajaxOptions, thrownError){
					alert('Error Function : '+thrownError);
				}
			});
		}
		
	}
	function idkembali(a){
		if(confirm('Apa anda yakin untuk mengembalikan pasien yang sudah dibatalkan?')){
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url().'pendaftaran/kembali_ranap'; ?>',
				data :  'rowid='+ a,
				success : function(data){
				var response =  eval("(" + data + ")");
					if(response.MESSAGE=="OK"){
						document.kunjungan.submit();
					}else{
						bootbox.alert(response.MESSAGE);
					}
				},
				error:function(xhr, ajaxOptions, thrownError){
					alert('Error Function : '+thrownError);
				}
			});
		}
		
	}
</script>
