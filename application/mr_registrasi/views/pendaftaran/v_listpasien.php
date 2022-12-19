<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/list_pasien');?>">Home</a>
                </li>

                <li class="active">List Data Pasien</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST DATA PASIEN
                            </h1>
                    </div><!-- /.page-header -->

                
				<div class="row">
					<div class="col-xs-12">
					<form class="form-horizontal" action="<?php echo site_url('pendaftaran/list_pasien'); ?>" method="GET">
							<div class="col-sm-6">
								<div class="form-group">
								<button class="btn btn-sm btn-primary" name="cari" id="cari" data-toggle="button">
									Pencarian Lainnya
								</button>
								</div>
							</div>
							<div class="col-sm-6">
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
							<div id="modal-cari" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header no-padding">
												<div class="table-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
																<span class="white">&times;</span>
														</button>
														CARI DATA PASIEN
												</div>
										</div>
							
										<div class="modal-body no-padding">
										<br />
											<div class="form-horizontal">
												<div class="row">
													<div class="col-sm-12">
													
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien :</label>
								
															<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-10" value="<?php echo (!empty($_GET['nama'])) ? $_GET['nama'] : ''; ?>" style='color:#000000;'/>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Lahir :</label>
								
															<div class="col-xs-12 col-sm-2">
																<div class="input-group">
																	<input type="text" name="tgll" id="tgll" class="date-picker" data-date-format="yyyy-mm-dd" value="<?php echo (!empty($_GET['tgll'])) ? $_GET['tgll'] : ''; ?>" style='color:#000000;'/>
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-calendar"></i>
																	</span>
																</div>
															</div>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-sm btn-primary">
												<i class="ace-icon fa fa-search"></i>
												Search
											</button>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div> 
					</form>
					</div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                </div>
                               

                                    <!-- div.table-responsive -->

                                    <!-- div.dataTables_borderWrap -->
                                <div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:400px;border:1px solid grey">
                                    <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
                                        <thead>
                                            <tr>
                                                <th class="center">NO</th>
                                                <th class="center">TGL DAFTAR</th>
                                                <th class="center">NOMR</th>
                                                <th class="center">NAMA PASIEN</th>
                                                <th class="center">TGL LAHIR</th>
                                                <th class="center" width="350px">ALAMAT</th>
                                                <th class="center">GENDER</th>
                                                <th width="100px"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            if(!empty($_GET['nama']) || !empty($_GET['nomr']) || !empty($_GET['tgll'])){
                                            $no = ($this->uri->segment('3') + 1) - 1;
                                            foreach ($pasien as $p){
                                            $no++;
                                            echo"<tr>
                                            <td class='center'>$no</td>
                                            <td>$p->tgl_daftar</td>
                                            <td>$p->nomr</td>
                                            <td>$p->nama</td>
                                            <td>$p->tgl_lahir</td>
                                            <td>$p->alamat</td>
                                            <td class='center'>$p->jns_kelamin</td>
                                            <td class='center'>
                                                <div class='hidden-sm hidden-xs action-buttons'>
                                                        <a href='#modal-view' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Detail Pasien' data-id='$p->nomr'>
                                                                <i class='ace-icon fa fa-search-plus bigger-130' ></i>
                                                        </a>

                                                        <a href='".base_url('pendaftaran/edit_pasien/'.$p->nomr)."' data-rel='tooltip' data-placement='left' title='Edit Data Pasien'>
                                                                <i class='ace-icon fa fa-pencil-square-o bigger-130'></i>
                                                        </a>
                                                        
                                                        <a href='#modal-cetak' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Cetak' data-id='$p->nomr'>
                                                                <i class='ace-icon fa fa-print bigger-130'></i>
                                                        </a>
                                                </div>
                                            </td>
                                            </tr>";
                                            }
                                            echo"<tr>
                                            <td align='right' colspan='8'>Jumlah Pasien : $jumlah Orang</td>
                                            </tr>";
                                            }else{
                                            echo"<tr>
                                            <td align='center' colspan='9'><h3> .: SILAHKAN LAKUKAN PENCARIAN :. </h3></td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
									
                                    <div class="text-center">
                                        <?php 
										if(!empty($_GET['nama']) || !empty($_GET['nomr']) || !empty($_GET['tgll'])){
										
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
                            CETAK KARTU / STIKER
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
                            VIEW DATA PASIEN
                    </div>
            </div>

            <div class="modal-body no-padding">
                <div class="view-data"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	  return true;
	}
	jQuery(function($) {
        $('[data-rel=tooltip]').tooltip();
		
		$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
		})
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('#cari').click(function(){
			$('#modal-cari').modal('show');
		});

        $('#modal-cetak').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url().'pendaftaran/modalcetak'; ?>',
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
                url : '<?php echo base_url().'pendaftaran/modalview'; ?>',
                data :  'rowid='+ rowid,
                success : function(data){
                    console.log(data)
                $('.view-data').html(data);
                }
            });
        });
        
    });
</script>