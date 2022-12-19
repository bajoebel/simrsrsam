<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('radiologi/list_pemeriksaan');?>">Home</a>
                </li>

                <li class="active">List Pasien Radiologi</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST PASIEN RADIOLOGI
                            </h1>
                    </div><!-- /.page-header -->

                <div class="row">
                    <form class="form-horizontal" name="kunjungan" action="<?php echo site_url('radiologi/list_pemeriksaan'); ?>" method="GET">
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
                                                <th class="center">NO FOTO</th>
                                                <th class="center">TGL PERIKSA</th>
                                                <th class="center">NOMR</th>
                                                <th class="center">NAMA PASIEN</th>
                                                <th class="center" width="350px">FOTO</th>
                                                <th class="center">GENDER</th>
                                                <th class="center">DOKTER MEMINTA</th>
                                                <th width="120px"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
											if(!empty($_GET['tgl']) || !empty($_GET['nomr'])){
                                            $no = ($this->uri->segment('3') + 1) - 1;
                                            foreach ($pasien as $p){
											$data = $this->db->select('nama,jns_kelamin')
															 ->from('m_pasien')
															 ->where('nomr',$p->nomr)
															 ->get()->row_array();
											
                                            $no++;
                                            echo"<tr>
                                            <td class='center'>$no</td>
                                            <td>$p->id_tr_rad</td>
                                            <td>$p->tanggal_diagnosa</td>
                                            <td>$p->nomr</td>
                                            <td>$data[nama]</td>
                                            <td>$p->foto</td>
                                            <td class='center'>$data[jns_kelamin]</td>
                                            <td>$p->dokter_meminta</td>
                                            <td class='center'>";
                                                echo"
												<div class='hidden-sm hidden-xs action-buttons'>
													<a href='".base_url('radiologi/edit_pemeriksaan/'.$p->id_tr_rad)."' data-rel='tooltip' data-placement='left' title='Edit Data Pemeriksaan'>
															<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>
													</a>
													<a href='".base_url('radiologi/cetak_rad/'.$p->id_tr_rad)."' data-rel='tooltip' data-placement='left' title='Cetak Hasil Pemeriksaan' target='_blank'>
														<i class='ace-icon fa fa-print bigger-130'></i>
													</a>
													<a href='".base_url('radiologi/simpan_radpdf/'.$p->id_tr_rad)."' data-rel='tooltip' data-placement='left' title='Simpan PDF' target='_blank'>
														<i class='ace-icon fa fa-folder-o bigger-130'></i>
													</a>
													<a href='".base_url('radiologi/hapus_rad/'.$p->id_tr_rad)."' data-rel='tooltip' data-placement='left' title='Hapus Data List Radiologi'>
														<i class='ace-icon fa fa-trash bigger-130'></i>
													</a>
                                                </div>";
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
										if(!empty($_GET['tgl']) || !empty($_GET['nomr'])){
										
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
    });
</script>