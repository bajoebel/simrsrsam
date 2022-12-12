<section class="content">
	<div class="row">
		<div class="col-sm-6">
			<div class="box box-success">
	            <div class="box-header witd-border">
	              	<h3 class="box-title">Input Data Kamar</h3>
	            </div>
	            <div class="box-body">
	              	<form class="form-horizontal" action="<?php if(empty($row)) echo base_url() ."backend/ruang/simpan"; else echo base_url() ."backend/ruang/update";  ?>" method="POST">
		              	<div class="box-body">
		              		<input type="hidden" name="start" value="<?php if(!empty($start)) echo $start; else echo "0"; ?>">
		              		<input type="hidden" name="q" value="<?php if(!empty($q)) echo $q; ?>">
			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Nama Kamar</label>
			                  	<?php if(!empty($row)) $id= $row->grId; else $id=""; ?>
			                  	<div class="col-sm-9">
			                  		<input type="hidden" name="grId" value="<?php echo $id; ?>">
			                    	<input type="text" name="grNama" class="form-control" id="inputEmail3" placeholder="Nama Kamar" value="<?php if(!empty($row)) echo $row->grNama;?>">
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Kapasitas</label>
			                  	<div class="col-sm-9">
			                  		<input type="text" name="totTmpTidur" class="form-control" id="inputEmail3" placeholder="Kapasitas Pria" value="<?php if(!empty($row)) echo $row->totTmpTidur;?>">
			                  	</div>
			                </div>
			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Jenis Kelamin</label>
			                  	<?php if(!empty($row)) $jekel=$row->grPenempatan; else $jekel=""; 
			                  	//echo "JEKEL : " .$jekel;
			                  	?>
			                  	<div class="col-sm-9">
			                  		<input type="radio" name="grPenempatan" value="LK" <?php if($jekel=='LK') echo "checked"; ?> > Khusus Laki-Laki <br>
			                  		<input type="radio" name="grPenempatan" value="PR" <?php if($jekel=='PR') echo "checked"; ?>> Khusus Perempuan<br>
			                  		<input type="radio" name="grPenempatan" value="LK/PR" <?php if($jekel=='LK/PR') echo "checked"; ?>> Bisa Laki-Laki Dan Perempuan<br>
			                  		<input type="radio" name="grPenempatan" value="AUTO" <?php if($jekel=='AUTO') echo "checked"; ?>> Otomatis Tergantung Pasian Pertama Masuk
			                  	</div>
			                </div>

			                
		                	<div class="form-group">
		                  		<div class="col-sm-offset-3 col-sm-9">
		                    		<div class="checkbox">
		                      			<label>
		                      				<?php if(!empty($row)) $status=$row->grStatus; else $status=0; ?>
		                        		<input type="checkbox" value="1" name="grStatus" <?php if($status==1) echo "checked"; ?>> Aktif
		                      			</label>
		                    		</div>
		                  		</div>
		                	</div>
		              	</div>
		              	<!-- /.box-body -->
		             	<div class="box-footer">
		                	<!--button type="submit" class="btn btn-default">Cancel</button-->
		                	<button type="submit" class="btn btn-success pull-right">Simpan</button>
		              	</div>
		              	<!-- /.box-footer -->
		            </form>
	            </div>
	        </div>


		</div>
		<div class="col-sm-6">
			<div class="box box-success">
	            <div class="box-header witd-border">
	              	<h3 class="box-title">List Data kamar</h3>
	              	<div class="box-tools">
	              		<form action="<?php echo base_url() ."ruang" ?>" method='GET'>
			                <div class="input-group input-group-sm" style="width: 300px;">
			                  	<input type="text" name="q" class="form-control pull-right" value="<?php if(!empty($q)) echo $q; ?>" placeholder="Search" >
								<div class="input-group-btn">
			                    	<button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
			                  	</div>
			                </div>
			            </form>
		            </div>
	            </div>
	            <div class="box-body">
	              	<table class="table table-bordered">
	              		<thead>
	              			<tr>
	              				<td>NO</td>
		              			<td>NAMA KAMAR</td>
		              			<td>KAPASITAS</td>
		              			<td>JEKEL</td>
		              			<td>STATUS</td>
		              			<td>AKSI</td>
	              			</tr>
	              		</thead>
	              		<tbody>
	              			<?php 
	              			$no=0;
	              			foreach ($kamar as $j) {
	              				$no++;
	              				?>
	              				<tr class="<?php if($id==$j->grId) echo "bg-gray"; ?>">
	              					<td><?php echo $no; ?></td>
	              					<td><?php echo $j->grNama ?></td>
	              					<td><?php echo $j->totTmpTidur ?></td>
	              					<td><?php echo $j->grPenempatan ?></td>
	              					<td><?php if($j->grStatus==1) echo "<span class='btn btn-success btn-xs'>Aktif</span>"; else echo "<span class='btn btn-danger btn-xs'>Non Aktif</span>"; ?></td>

	              					<td>
	              						<a href="<?php echo base_url() ."ruang/" .$j->grId ."?start=" .$start ."&q=" .$q; ?>" class='btn btn-primary btn-xs' ><span class='fa fa-edit'></span></a>
	              						<a href="<?php echo base_url() ."backend/ruang/delete/" .$j->grId ?>" class='btn btn-danger btn-xs' ><span class='fa fa-remove'></span></a>
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