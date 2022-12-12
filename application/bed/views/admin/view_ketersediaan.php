<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-success">
	            <div class="box-header witd-border">
	              	<h3 class="box-title">Input Data ketersediaan</h3>
	            </div>
	            <div class="box-body">
	            	<div class="col-sm-5">
	            		<?php 
	            		$error=$this->session->flashdata('error');
	            		$success=$this->session->flashdata('success');
	            		if(!empty($error)){
	            			?>
	            			<div class="callout callout-danger">
					          <h4>Warning!</h4>
					          <p><?php echo $error; ?></p>
					        </div>
	            			<?php
	            		}
	            		if(!empty($success)){
	            			?>
	            			<div class="callout callout-success">
					          <h4>Success!</h4>
					          <p><?php echo $success; ?></p>
					        </div>
	            			<?php
	            		}
	            		?>
		              	<form class="form-horizontal" action="<?php if(empty($row)) echo base_url() ."backend/ketersediaan/simpan"; else echo base_url() ."backend/ketersediaan/update";  ?>" method="POST">
			              	<div class="box-body">
			              		<?php if(!empty($row)) $id= $row->map_id; else $id=""; ?>
			              		<input type="hidden" name="map_id" value="<?php echo $id; ?>">
			              		<?php
				                
				                $admin=$this->session->userdata('admin');
				                if($admin==1){
				                	?>
				                	<div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">RUANG RAWATAN</label>
					                  	<div class="col-sm-9">
					                  		<select class="form-control " name="map_kamarid" id="map_kamarid">
					                  			<option value="">Pilih Ruang</option>
					                  			<?php 
					                  			if(!empty($row)) $grId=$row->map_kamarid; else $grId="";
					                  			foreach ($kamar as $k) {
					                  				?>
					                  				<option value="<?php echo $k->grId; ?>" <?php if($grId==$k->grId) echo "selected"; ?>><?php echo $k->grNama; ?></option>
					                  				<?php
					                  			}
					                  			?>
					                  		</select>
					                  		
					                  	</div>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">JENIS RUANG</label>
					                  	<div class="col-sm-9">
					                  		
					                    	<select class="form-control" name="map_ruangid">
					                    		<option value="">Pilih Jenis Ruang Rawatan</option>
					                    		<?php 
					                    		if(!empty($row)) $ruang_id=$row->map_ruangid;else $ruang_id="";
					                    		foreach ($ruang as $j) {
					                    			?>
					                    			<option value="<?php echo $j->ruang_id ?>" <?php if($j->ruang_id==$ruang_id) echo "selected"; ?>><?php echo $j->ruang_perawatan ?></option>
					                    			<?php
					                    		}
					                    		?>
					                    	</select>
					                  	</div>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">KELAS</label>
					                  	<div class="col-sm-9">
					                  		<select class="form-control" name="map_kelasid">
					                    		<option value="">Pilih Kelas</option>
					                    		<?php 
					                    		if(!empty($row)) $kelas_id=$row->map_kelasid;else $kelas_id="";
					                    		foreach ($kelas as $j) {
					                    			?>
					                    			<option value="<?php echo $j->kelas_id ?>" <?php if($j->kelas_id==$kelas_id) echo "selected"; ?>>
					                    				<?php echo $j->kelas_nama ?>
					                    			</option>
					                    			<?php
					                    		}
					                    		?>			                    	
					                    	</select>
					                  	</div>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">KAPASITAS</label>
					                  	<div class="col-sm-9">
					                  		<input type="text" name="map_kapasitas" class="form-control input-sm" id="map_kapasitas" value="<?php if(!empty($row)) echo $row->map_kapasitas; ?>">
					                  	</div>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">PENEMPATAN</label>
					                  	<?php if(!empty($row)) $jekel=$row->map_penempatan; else $jekel=""; 
					                  	//echo "JEKEL : " .$jekel;
					                  	?>
					                  	<div class="col-sm-9">
					                  		<input type="radio" name="map_penempatan" value="LK" <?php if($jekel=='LK') echo "checked"; ?> > Khusus Laki-Laki <br>
					                  		<input type="radio" name="map_penempatan" value="PR" <?php if($jekel=='PR') echo "checked"; ?>> Khusus Perempuan<br>
					                  		<input type="radio" name="map_penempatan" value="LK/PR" <?php if($jekel=='LK/PR') echo "checked"; ?>> Bisa Laki-Laki Dan Perempuan<br>
					                  		<input type="radio" name="map_penempatan" value="AUTO" <?php if($jekel=='AUTO') echo "checked"; ?>> Otomatis Tergantung Pasian Pertama Masuk
					                  	</div>
					                </div>
				                	<?php
				                }else{
				                	if(!empty($row)){
				                	?>
				                	<div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 " style="text-align: right;">RUANG RAWATAN</label>
					                  	<label for="inputEmail3" class="col-sm-9">: <?php echo $row->grNama;  ?></label>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 " style="text-align: right;">JENIS RUANGAN</label>
					                  	<label for="inputEmail3" class="col-sm-9">: <?php echo $row->ruang_perawatan;  ?></label>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 " style="text-align: right;">KELAS</label>
					                  	<label for="inputEmail3" class="col-sm-9">: <?php echo $row->kelas_nama;  ?></label>
					                </div>

					                <div class="form-group">
					                	<?php 
					                	$penempatan=array(
					                		'LK'=>"Penempatan Khusus Pasien Laki-Laki",
					                		'PR'=>"Penempatan Khusus Pasien Perempuan",
					                		'LK/PR'=>"Penempatan Tidak Ditentukan",
					                		'AUTO'	=> "Penempatan Otomatis Tergantung Pasien Pertama Masuk"
					                	);
					                	?>
					                  	<label for="inputEmail3" class="col-sm-3 " style="text-align: right;">PENEMPATAN</label>
					                  	<label for="inputEmail3" class="col-sm-9">: <?php echo $penempatan[$row->map_penempatan];  ?></label>
					                </div>
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 " style="text-align: right;">KAPASITAS</label>
					                  	<label for="inputEmail3" class="col-sm-9">: <?php echo $row->map_kapasitas;  ?></label>
					                </div>
					                <?php } ?>
				                	<input type="hidden" name="map_kamarid" value="<?php echo $this->session->userdata('ruang') ?>">
				                	<input type="hidden" name="map_ruangid" value="<?php if(!empty($row)) echo $row->map_ruangid; else echo "0"; ?>">
				                	<input type="hidden" name="map_kelasid" value="<?php if(!empty($row)) echo $row->map_kelasid; else echo "0"; ?>">
				                	<input type="hidden" name="map_kapasitas" value="<?php if(!empty($row)) echo $row->map_kapasitas; else echo "0"; ?>">
				                	<input type="hidden" name="map_penempatan" value="<?php if(!empty($row)) echo $row->map_penempatan; else echo "LK/PR"; ?>">
				                	<?php
				                }
				                ?>
				                
				                
				                <?php 
				                if(!empty($id)) { 
				                	if(!empty($row)) {
				                		$jekelpasien=$row->map_penempatan;
				                		if($jekelpasien=="LK") {
					                		$lk= $row->map_kapasitas;
					                		$pr=0;
					                		$lk_style="";
					                		$pr_style="readonly";
					                	}
					                	elseif($jekelpasien=="PR") {
					                		$pr=$row->map_kapasitas;
					                		$lk=0;
					                		$lk_style="readonly";
					                		$pr_style="";
					                	}elseif($jekelpasien=="LK/PR"){
					                		$pr=$row->map_kapasitas;
					                		$lk=$row->map_kapasitas;
					                		$lk_style="";
					                		$pr_style="";
					                	}else{
					                		if($row->map_isipr==0&&$row->map_isilk==0){
					                			//Kalau Ruang rawatan Masih Kosong
					                			$pr=$row->map_kapasitas;
					                			$lk=$row->map_kapasitas;
					                			$lk_style="";
					                			$pr_style="";
					                		}elseif($row->map_isipr>0&&$row->map_isilk<=0){
					                			//Kalau Ruang Rawatan Diisi Perempuan 
					                			$pr=$row->map_kapasitas;
					                			$lk=0;
					                			$lk_style="readonly";
					                			$pr_style="";
					                		}else{
					                			$lk=$row->map_kapasitas;
					                			$pr=0;
					                			$lk_style="";
					                			$pr_style="readonly";
					                		}
					                	}
				                	} else {
				                		$jekelpasien="";
				                		$lk=0;
				                		$pr=0;
				                	}
					                	
				                	?>
				                	<div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">PRIA (TERISI)</label>
					                  	<div class="col-sm-6">
					                  		<input type="text" name="map_isilk" class="form-control" id="inputEmail3" placeholder="Pria (Terisi)" value="<?php if(!empty($row)) echo $row->map_isilk;?>" <?php echo $lk_style ?>>
					                  	</div>
					                  	<div class="col-sm-3"> <input type="hidden" name="kapasitas_lk" value="<?php if(!empty($row)) echo $lk ?>"><?php //if(!empty($row)) echo "/ " .$lk ." Bed" ?></div>
					                </div>
					                <!--input type="hidden" name="totTmpTidur" id="totTmpTidur" value="<?php //if(!empty($row)) echo $row->map_kapasitas; else echo "0"; ?>"-->
					                <div class="form-group">
					                  	<label for="inputEmail3" class="col-sm-3 control-label">WANITA (TERISI)</label>
					                  	<div class="col-sm-6">
					                  		<input type="text" name="map_isipr" class="form-control" id="inputEmail3" placeholder="Wanita (Terisi)" value="<?php if(!empty($row)) echo $row->map_isipr;?>" <?php echo $pr_style ?>>
					                  	</div>
					                  	<div class="col-sm-3"> <input type="hidden" name="kapasitas_pr" value="<?php if(!empty($row)) echo $pr ?>"><?php //if(!empty($row)) echo "/ " .$pr ." Bed" ?></div>
					                </div>
					                
				            	<?php } else{ ?>
				            		<input type="hidden" name="map_isilk" class="form-control" id="inputEmail3" placeholder="Pria (Terisi)" value="<?php if(!empty($row)) echo $row->map_isilk; else echo "0"; ?>">
				            		<input type="hidden" name="map_isipr" class="form-control" id="inputEmail3" placeholder="Pria (Terisi)" value="<?php if(!empty($row)) echo $row->map_isilk; else echo "0";  ?>">
				            	<?php }?>
			                	
			              	</div>
			              	<!-- /.box-body -->
			             	<div class="box-footer">
			                	<!--button type="submit" class="btn btn-default">Cancel</button-->
			                	<?php if($admin==1) { 
			                		?>
				                	<button type="submit" class="btn btn-success pull-right">Simpan</button>
				                <?php } else{
				                	if(!empty($row)){
				                		?>
				                		<button type="submit" class="btn btn-success pull-right">Simpan</button>
				                		<?php
				                	}
				                }?>
			              	</div>
			              	<!-- /.box-footer -->
			            </form>
			        </div>
			        <div class="col-sm-7">
			        	<?php 
			        	if(!empty($row)){
			        		$kemkes=$this->Backend_model->getDatakemkes('',$row->map_ruangid);

			        		?>
			        		<h3>PRIVIEW DATA YANG DIKIRIM KE KEMENKES</h3>
			        		<table class="table table-bordered">
	              				<thead>
	              					<tr>
	              						<td rowspan="2">No</td>
		              					<td rowspan="2">Ruang</td>
		              					<td rowspan="2">Kelas</td>
		              					<td rowspan="2">Total TT</td>
		              					<td colspan="2">Terpakai</td>
		              					<td colspan="2">Kosong</td>
		              					<td rowspan="2">Waiting</td>
	              					</tr>
	              					<tr>
	              						<td>LK</td>
	              						<td>PR</td>
	              						<td>LK</td>
	              						<td>PR</td>
	              					</tr>
	              					
	              				</thead>
	              				<tbody>
	              					<?php 
	              					$no=0;
	              					foreach ($kemkes as $kem) {
	              						$kapasitas_male=intval($kem->kapasitas_male);
	              						$kapasitas_female=intval($kem->kapasitas_female);
	              						$terpakai_male=intval($kem->terpakai_male);
	              						$terpakai_female=intval($kem->terpakai_female);
	              						if($kapasitas_male>0) $kosong_lk=$kapasitas_male-$terpakai_male; else $kosong_lk=0;
	              						if($kapasitas_female>0) $kosong_pr=$kapasitas_female-$terpakai_female; else $kosong_pr=0;
	              						//$kapasitas_male_female=intval($kem->kapasitas_male_female);
	              						//$auto_male=intval($kem->auto_male);
	              						//$auto_female=intval($kem->auto_female);
	              						//$auto_male_female=intval($kem->auto_male_female);
	              						//$kapasitas_lk=$kapasitas_male;
	              						//$kapasitas_pr=$kapasitas_female;
	              						//$kosong_lk=$kapasitas_lk-$kem->terpakai_male;
	              						//$kosong_pr=$kapasitas_pr-$kem->terpakai_female;
	              						$no++;
	              						?>
	              						<tr class="<?php if($row->map_kelasid==$kem->kode_ruang) echo "bg-gray"; ?>">
	              							<td><?php echo $no; ?></td>
	              							<td><?php echo $kem->ruang_perawatan; ?></td>
	              							<td><?php echo $kem->kelas_perawatan; ?></td>
	              							<td><?php echo $kem->total_TT ?></td>
	              							<td><?php echo $kem->terpakai_male; ?></td>
	              							<td><?php echo $kem->terpakai_female; ?></td>
	              							<td><?php echo $kosong_lk ; //.'(' .$kapasitas_male .' + ' .$kapasitas_male_female .' + ' .$auto_male .')' ?></td>
	              							<td><?php echo $kosong_pr ; // .'(' .$kapasitas_female .' + ' .$kapasitas_male_female .' + ' .$auto_female .')' ?></td>
	              							<td><?php echo intval($kem->waiting_list) ?></td>

	              						</tr>
	              						<?php
	              					}
	              					?>
	              				</tbody>
	              			</table>
			        		<?php
			        	}
			        	?>
			        	

			        </div>
	            </div>
	        </div>


		</div>
		<div class="col-sm-12">
			<div class="box box-success">
	            <div class="box-header witd-border">
	              	<h3 class="box-title">List Data ketersediaan</h3>
	              	<div class="box-tools">
	              		<form action="<?php echo base_url() ."ketersediaan" ?>" method='GET'>
			                <div class="input-group input-group-sm" style="width: 150px;">
			                  	<input type="text" name="q" class="form-control pull-right" placeholder="Search">
								<div class="input-group-btn">
			                    	<button type="submit" class="btn btn-SUCCESS"><i class="fa fa-search"></i></button>
			                  	</div>
			                </div>
			            </form>
		            </div>
	            </div>
	            <div class="box-body" style="overflow-x:auto;">
	              	<table class="table table-bordered">
	              		<thead>
	              			<tr>
	              				<td>NO</td>
		              			<td>KELAS</td>
		              			<td>JENIS RUANG (KEMENKES)</td>
		              			<td>NAMA RUANGAN</td>
		              			<td>KAPASITAS</td>
		              			<td>TERISI LAKI-LAKI</td>
		              			<td>TERISI PEREMPUAN</td>
		              			<td>PENEMPATAN</td>
		              			<td>LAST UPDATE</td>
		              			<td>USER UPDATE</td>
		              			<td>AKSI</td>
	              			</tr>
	              		</thead>
	              		<tbody>
	              			<?php 
	              			$no=0;
	              			foreach ($ketersediaan as $j) {
	              				$no++;
	              				?>
	              				<tr class="<?php if($id==$j->map_id) echo "bg-gray"; ?>">
	              					<td><?php echo $no; ?></td>
	              					<td><?php if(!empty($j->kelas_nama)) echo $j->kelas_nama; else echo "-" ?></td>
	              					<td><?php echo $j->ruang_perawatan ?></td>
	              					<td><?php echo "Ruang Rawat " .$j->grNama ?></td>
	              					<td><?php echo $j->map_kapasitas ?></td>
	              					<td><?php echo $j->map_isilk ?></td>
	              					<td><?php echo $j->map_isipr ?></td>
	              					<td>
	              						<?php 
	              						if($j->map_penempatan=="AUTO"){
	              							if($j->map_isilk>0 && $j->map_isipr==0) echo "LK";
	              							elseif($j->map_isilk==0 && $j->map_isipr>0) echo "PR";
	              							else echo "AUTO";
	              						}else{
	              							echo $j->map_penempatan ;
	              						}
	              						//echo $j->grPenempatan 
	              						?>
	              					</td>
	              					<td><?php echo $j->map_tglupdate ?></td>
	              					<td><?php echo $j->user_namalengkap; ?></td>
	              					<td>
	              						<a href="<?php echo base_url() ."ketersediaan/" .$j->map_id ?>" class='btn btn-primary btn-xs' ><span class='fa fa-edit'></span></a>
	              						<?php if($admin==1) { ?>
		              						<a href="<?php echo base_url() ."backend/ketersediaan/delete/" .$j->map_id ?>" class='btn btn-danger btn-xs' ><span class='fa fa-remove'></span></a>
		              					<?php } ?>
	              					</td>
	              					
	              				</tr>
	              				<?php
	              			}
	              			?>
	              		</tbody>
	              	</table>
	              	<?php echo $pagination;?>
	            </div>
	        </div>
		</div>
	</div>
</section>