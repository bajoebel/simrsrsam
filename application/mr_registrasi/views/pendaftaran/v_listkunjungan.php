<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/list_kunjungan');?>">Home</a>
                </li>

                <li class="active">List Kunjungan Pasien</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST KUNJUNGAN PASIEN
                            </h1>
                    </div><!-- /.page-header -->

                <div class="row">
                    <form class="form-horizontal" name="kunjungan" action="<?php echo site_url('pendaftaran/list_kunjungan'); ?>" method="GET">
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
										<select class="select2" id="poli" name="poli" data-placeholder="Klik untuk memilih poli..." style='color:#000000;' onchange="this.form.submit()">
										<option value="">-- Pilih Poli --</option>
											<?php
											foreach($poly as $pol){
											?>
											<option value="<?php echo $pol->grId ?>" <?php error_reporting(0); if($_GET['poli']==$pol->grId) echo "selected"; ?>><?php echo $pol->grNama ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
					</div>
					<div class="col-sm-6">
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
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                </div>
                               

                                    <!-- div.table-responsive -->

                                    <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table class="table table-striped table-bordered table-hover" style='color:#000000;'>
                                        <thead>
                                            <tr>
                                                <th class="center">NO</th>
                                                <th class="center">NO REG</th>
                                                <th class="center">TGL REGISTRASI</th>
                                                <th class="center">NOMR</th>
                                                <th class="center">NAMA PASIEN</th>
                                                <th class="center" width="350px">ALAMAT</th>
                                                <th class="center">GENDER</th>
                                                <th class="center">TUJUAN</th>
                                                <th width="100px"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
											if(!empty($_GET['tgl']) || !empty($_GET['nomr']) || !empty($_GET['poli'])){
                                            $no = ($this->uri->segment('3') + 1) - 1;
                                            foreach ($pasien as $p){
											$data = $this->db->select('nama,tgl_lahir,jns_kelamin,alamat')
															 ->from('m_pasien')
															 ->where('nomr',$p->nomr)
															 ->get()->row_array();
											
                                            $no++;
                                            echo"<tr>
                                            <td class='center'>$no</td>
                                            <td>$p->id_daftar</td>
                                            <td>$p->tgl_reg</td>
                                            <td>$p->nomr</td>
                                            <td>$data[nama]</td>
                                            <td>$data[alamat]</td>
                                            <td class='center'>$data[jns_kelamin]</td>
                                            <td>$p->grNama</td>
                                            <td class='center'>";
											if($p->status_daftar == 1){
												if($this->session->userdata("kualifikasi") == "1"){
													echo "<a class='btn btn-sm btn-success btn-block' onclick=\"idkembali('".$p->id_daftar."')\">Kembalikan</a>";
												}else{
													echo "Dibatalkan";
												}
											}else{
                                                echo"
												<div class='hidden-sm hidden-xs action-buttons'>
                                                        <a href='#modal-view' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Detail Kunjungan Pasien' data-id='$p->id_daftar'>
                                                                <i class='ace-icon fa fa-search-plus bigger-130' ></i>
                                                        </a>

                                                        <a href='#modal-cetak' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Cetak' data-id='$p->id_daftar'>
                                                                <i class='ace-icon fa fa-print bigger-130'></i>
                                                        </a>
														
														<a data-rel='tooltip' data-placement='left' title='Batalkan' onclick=\"idbatal('".$p->id_daftar."')\">
                                                                <i class='ace-icon fa fa-remove bigger-130'></i>
                                                        </a>
                                                </div>";
											}
											echo"
                                            </td>
                                            </tr>";
                                            }
                                            echo"<tr>
                                            <td align='right' colspan='9'>Jumlah Pasien : $jumlah Orang</td>
                                            </tr>";
											}else{
                                            echo"<tr>
                                            <td align='center' colspan='10'><h3> .: SILAHKAN LAKUKAN PENCARIAN :. </h3></td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <?php 
										if(!empty($_GET['tgl']) || !empty($_GET['nomr']) || !empty($_GET['poli'])){
										
                                        echo $this->pagination->create_links();
										
										}
                                        ?>
                                    </div>
                                    	
                                </div>
                            </div>
                        </div>
                            <!-- PAGE CONTENT ENDS -->
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

        $('#modal-cetak').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url().'pendaftaran/modalsuratmasuk'; ?>',
                data :  'rowid='+ rowid,
                success : function(data){
                    console.log(data)
                $('.cetak-data').html(data);
                }
            });
        });
        
        $('#modal-view').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url().'pendaftaran/modalkunjungan'; ?>',
                data :  'rowid='+ rowid,
                success : function(data){
                    console.log(data)
                $('.view-data').html(data);
                }
            });
        });
    });
	function idbatal(a){
		if(confirm('Apa anda yakin untuk membatalkan pendaftaran?')){
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url().'pendaftaran/batal_daftar'; ?>',
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
				url : '<?php echo base_url().'pendaftaran/kembali_daftar'; ?>',
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