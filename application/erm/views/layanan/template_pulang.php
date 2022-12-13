<div class="box box-success">
	<div class="box-header">
		Pasien Keluar

	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php
			if ($pulang > 0) {
			?>
				<div class="col-md-12">
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Penting</h4>
						Pasien Sudah Dipulangkan
					</div>
				</div>
				<?php

			} else {
				//print_r($pindah);
				if (empty($pindah)) {
					//Jika Pasien Belum Dipindahkan
					if ($ranap == 0) {
				?>
						<form id="form1" role="form" onsubmit="return false">
							<input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="<?= $detail->id_daftar ?>">
							<input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="<?= $detail->reg_unit ?>">
							<input type="hidden" class="form-control" name="nomr" id="nomr" value="<?= $detail->nomr ?>">
							<input type="hidden" class="form-control" name="nama_pasien" id="nama_pasien" value="<?= $detail->nama_pasien ?>">
							<input type="hidden" class="form-control" name="jns_kelamin" id="jns_kelamin" value="<?= $detail->jns_kelamin ?>">
							<input type="hidden" class="form-control" id="v_jns_kelamin" value="<?php if ($detail->jns_kelamin == "0") echo "Perempuan";
																								else echo "Laki-Laki" ?>">
							<input type="hidden" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $detail->tgl_lahir; ?>">
							<?php
							$tgl_lahir 	= new DateTime($detail->tgl_lahir);
							$sekarang 	= new DateTime('today');
							$umur 		= $sekarang->diff($tgl_lahir);
							?>
							<input type="hidden" class="form-control" name="umur" id="umur" value="<?= $umur->y . " Tahun " . $umur->m . " Bulan " . $umur->d . " Hari";  ?>">
							<input type="hidden" class="form-control" name="id_ruang" id="id_ruang" value="<?= $detail->id_ruang ?>">
							<input type="hidden" class="form-control" name="nama_ruang" id="nama_ruang" value="<?= $detail->nama_ruang; ?>">
							<input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="<?= $detail->id_kelas ?>">
							<input type="hidden" class="form-control" name="kelas_layanan" id="kelas_layanan" value="<?= $detail->kelas_layanan; ?>">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tanggal Masuk / Tanggal Pulang <span style="color: red"> * </span></label>
									<div class="input-group col-md-12">
										<input readonly="" type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?= $detail->tgl_masuk ?>">
										<div class="input-group-btn" style="width: 50%">
											<input readonly="" type="text" class="form-control tanggal" name="tgl_keluar" id="tgl_keluar" value="<?php if (!empty($pasien_pulang)) echo $pasien_pulang->tgl_keluar;
																																					else  echo date("Y-m-d"); ?>" placeholder="__-__-____">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>LOS (Hari) / Jenis Layanan</label>
									<?php
									$tgl_masuk 	= new DateTime($detail->tgl_masuk);
									$sekarang 	= new DateTime('today');
									$los 		= $sekarang->diff($tgl_masuk)->d;
									?>
									<div class="input-group col-md-12">
										<input type="text" class="form-control" name="los" id="los" value="<?= $los ?>">
										<div class="input-group-btn" style="width: 50%">
											<input readonly="" type="text" class="form-control" name="jns_layanan" id="jns_layanan" value="<?= $detail->jns_layanan ?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Jenis Kunjungan <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<?php
										if (strtotime($detail->tgl_masuk) >= strtotime($tgl_daftar)) $baru = 1;
										else $baru = 0;
										//echo strtotime($detail->tgl_masuk) ." <= " .strtotime($tgl_daftar) ." " .$baru;
										if (!empty($pasien_pulang)) {
											$baru = $pasien_pulang->jns_kunjungan;
										}
										?>
										<select name="jns_kunjungan" id="jns_kunjungan" class="form-control" style="width: 300px">
											<option value="0" <?php if ($baru == 0) echo "selected"; ?>>Pasien Baru</option>
											<option value="1" <?php if ($baru == 1) echo "selected"; ?>>Pasien Lama</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Kasus Penyakit <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<?php
										if (!empty($pasien_pulang)) {
											$kasus = $pasien_pulang->kasus_penyakit;
										} else {
											$kasus = 0;
										}
										?>
										<select name="kasus_penyakit" id="kasus_penyakit" class="form-control" style="width: 300px">
											<option value="0" <?php if ($kasus == 0) echo "selected"; ?>>Kasus Baru</option>
											<option value="1" <?php if ($kasus == 1) echo "selected"; ?>>Kasus Lama</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<label>Cara Bayar <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<select name="id_cara_bayar" id="id_cara_bayar" class="form-control" style="width: 300px">
											<?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
												<option value="<?php echo $xCB['idx'] ?>" <?php if ($detail->id_cara_bayar == $xCB["idx"]) echo "selected" ?>><?php echo $xCB['cara_bayar'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>No Kartu / No.Jaminan <span style="color: red"> * </span> [<em>Jika Cara Bayar Bukan Umum</em>]</label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="<?= $detail->no_bpjs ?>">
										<div class="input-group-btn" style="width: 60%">
											<input type="text" class="form-control" name="no_jaminan" id="no_jaminan" value="<?php if (!empty($pasien_pulang)) echo $pasien_pulang->no_jaminan;
																																else echo $detail->no_jaminan ?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Dokter Penanggung Jawab <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<select name="dpjp" id="dpjp" class="form-control" style="width: 300px">
											<option value=""></option>
											<?php foreach ($getDokter->result_array() as $xD) : ?>
												<option value="<?php echo $xD['NRP'] ?>" <?php if ($detail->dokterJaga == $xD["NRP"]) echo "selected" ?>><?php echo $xD['pgwNama'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Tindakan Pelayanan <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<?php
										if (!empty($pasien_pulang)) {
											$id_tindakan_pelayanan = $pasien_pulang->id_tindakan_pelayanan;
											$id_cara_keluar = $pasien_pulang->id_cara_keluar;
											$id_keadaan_keluar = $pasien_pulang->id_keadaan_keluar;
										} else {
											$id_tindakan_pelayanan = "";
											$id_cara_keluar = "";
											$id_keadaan_keluar = "";
										}
										?>
										<select name="id_tindakan_pelayanan" id="id_tindakan_pelayanan" class="form-control" style="width: 300px">
											<option value=""></option>
											<?php foreach ($getJenisPelayanan->result_array() as $xJP) : ?>
												<option value="<?php echo $xJP['idx'] ?>" <?php if ($id_tindakan_pelayanan == $xJP["idx"]) echo "selected"; ?>><?php echo $xJP['jenis_pelayanan'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Cara Keluar <span style="color: red"> * </span></label>
									<div class="input-group col-md-6">
										<select name="id_cara_keluar" id="id_cara_keluar" class="form-control" style="width: 300px">
											<?php foreach ($getCaraKeluar->result_array() as $xCP) : ?>
												<option value="<?php echo $xCP['idx'] ?>" <?php if ($id_cara_keluar == $xCP["idx"]) echo "selected"; ?>><?php echo $xCP['cara_keluar'] ?></option>
											<?php endforeach; ?>

										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Keadaan Keluar <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<select name="id_keadaan_keluar" id="id_keadaan_keluar" class="form-control" style="width: 300px">
											<?php foreach ($getKeadaanKeluar->result_array() as $xKK) : ?>
												<option value="<?php echo $xKK['idx'] ?>" <?php if ($id_keadaan_keluar == $xKK["idx"]) echo "selected" ?>><?php echo $xKK['keadaan_keluar'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>&nbsp;</label>
									<div class="input-group" id="btnExec">
										<button type="button" class="btn btn-primary" id="btnBatal">
											<i class="glyphicon glyphicon-new-window"></i> Batal</button>
										<button type="button" class="btn btn-danger" id="submit" <?php if ($pulang > 0 || $detail->status_transaksi == 0) echo "disabled"; ?> onclick="simpanPulang()">
											<i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
									</div>
								</div>
							</div>
						</form>
					<?php
					} else {
					?>
						<div class="col-md-12">
							<div class="alert alert-warning alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> Penting</h4>
								Maaf Pasien Tidak Bisa dipulangkan Dari ruangan ini karena pasien terdaftar sebagai pasien rawat inap.
							</div>
						</div>
					<?php
					}
				} else {
					if (empty($pindah->idx_batal) && $pindah->id_ruang != $pindah->ruang_pengirim) {
						//Pasien Sudah dpindah
						//print_r($pindah);
					?>
						<div class="col-md-12">
							<div class="alert alert-warning alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> Penting</h4>
								Maaf Pasien Tidak Bisa dipulangkan Dari ruangan ini karena pasien sudah dipindahkan ke <?= $pindah->nama_ruang ?>.
							</div>
						</div>
					<?php
					} else {
					?>
						<form id="form1" role="form" onsubmit="return false">
							<input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="<?= $detail->id_daftar ?>">
							<input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="<?= $detail->reg_unit ?>">
							<input type="hidden" class="form-control" name="nomr" id="nomr" value="<?= $detail->nomr ?>">
							<input type="hidden" class="form-control" name="nama_pasien" id="nama_pasien" value="<?= $detail->nama_pasien ?>">
							<input type="hidden" class="form-control" name="jns_kelamin" id="jns_kelamin" value="<?= $detail->jns_kelamin ?>">
							<input type="hidden" class="form-control" id="v_jns_kelamin" value="<?php if ($detail->jns_kelamin == "0") echo "Perempuan";
																								else echo "Laki-Laki" ?>">
							<input type="hidden" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $detail->tgl_lahir; ?>">
							<?php
							$tgl_lahir 	= new DateTime($detail->tgl_lahir);
							$sekarang 	= new DateTime('today');
							$umur 		= $sekarang->diff($tgl_lahir);
							?>
							<input type="hidden" class="form-control" name="umur" id="umur" value="<?= $umur->y . " Tahun " . $umur->m . " Bulan " . $umur->d . " Hari";  ?>">
							<input type="hidden" class="form-control" name="id_ruang" id="id_ruang" value="<?= $detail->id_ruang ?>">
							<input type="hidden" class="form-control" name="nama_ruang" id="nama_ruang" value="<?= $detail->nama_ruang; ?>">
							<input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="<?= $detail->id_kelas ?>">
							<input type="hidden" class="form-control" name="kelas_layanan" id="kelas_layanan" value="<?= $detail->kelas_layanan; ?>">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tanggal Masuk / Tanggal Pulang <span style="color: red"> * </span></label>
									<div class="input-group col-md-12">
										<input readonly="" type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?= $detail->tgl_masuk ?>">
										<div class="input-group-btn" style="width: 50%">
											<input readonly="" type="text" class="form-control tanggal" name="tgl_keluar" id="tgl_keluar" value="<?php if (!empty($pasien_pulang)) echo $pasien_pulang->tgl_keluar;
																																					else  echo date("Y-m-d"); ?>" placeholder="__-__-____">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>LOS (Hari) / Jenis Layanan</label>
									<?php
									$tgl_masuk 	= new DateTime($detail->tgl_masuk);
									$sekarang 	= new DateTime('today');
									$los 		= $sekarang->diff($tgl_masuk)->d;
									?>
									<div class="input-group col-md-12">
										<input type="text" class="form-control" name="los" id="los" value="<?= $los ?>">
										<div class="input-group-btn" style="width: 50%">
											<input readonly="" type="text" class="form-control" name="jns_layanan" id="jns_layanan" value="<?= $detail->jns_layanan ?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Jenis Kunjungan <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<?php
										if (strtotime($detail->tgl_masuk) >= strtotime($tgl_daftar)) $baru = 1;
										else $baru = 0;
										//echo strtotime($detail->tgl_masuk) ." <= " .strtotime($tgl_daftar) ." " .$baru;
										if (!empty($pasien_pulang)) {
											$baru = $pasien_pulang->jns_kunjungan;
										}
										?>
										<select name="jns_kunjungan" id="jns_kunjungan" class="form-control" style="width: 300px">
											<option value="0" <?php if ($baru == 0) echo "selected"; ?>>Pasien Baru</option>
											<option value="1" <?php if ($baru == 1) echo "selected"; ?>>Pasien Lama</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Kasus Penyakit <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<?php
										if (!empty($pasien_pulang)) {
											$kasus = $pasien_pulang->kasus_penyakit;
										} else {
											$kasus = 0;
										}
										?>
										<select name="kasus_penyakit" id="kasus_penyakit" class="form-control" style="width: 300px">
											<option value="0" <?php if ($kasus == 0) echo "selected"; ?>>Kasus Baru</option>
											<option value="1" <?php if ($kasus == 1) echo "selected"; ?>>Kasus Lama</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<label>Cara Bayar <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<select name="id_cara_bayar" id="id_cara_bayar" class="form-control" style="width: 300px">
											<?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
												<option value="<?php echo $xCB['idx'] ?>" <?php if ($detail->id_cara_bayar == $xCB["idx"]) echo "selected" ?>><?php echo $xCB['cara_bayar'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>No Kartu / No.Jaminan <span style="color: red"> * </span> [<em>Jika Cara Bayar Bukan Umum</em>]</label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="<?= $detail->no_bpjs ?>">
										<div class="input-group-btn" style="width: 60%">
											<input type="text" class="form-control" name="no_jaminan" id="no_jaminan" value="<?php if (!empty($pasien_pulang)) echo $pasien_pulang->no_jaminan;
																																else echo $detail->no_jaminan ?>">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Dokter Penanggung Jawab <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<select name="dpjp" id="dpjp" class="form-control" style="width: 300px">
											<option value=""></option>
											<?php foreach ($getDokter->result_array() as $xD) : ?>
												<option value="<?php echo $xD['NRP'] ?>" <?php if ($detail->dokterJaga == $xD["NRP"]) echo "selected" ?>><?php echo $xD['pgwNama'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Tindakan Pelayanan <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<?php
										if (!empty($pasien_pulang)) {
											$id_tindakan_pelayanan = $pasien_pulang->id_tindakan_pelayanan;
											$id_cara_keluar = $pasien_pulang->id_cara_keluar;
											$id_keadaan_keluar = $pasien_pulang->id_keadaan_keluar;
										} else {
											$id_tindakan_pelayanan = "";
											$id_cara_keluar = "";
											$id_keadaan_keluar = "";
										}
										?>
										<select name="id_tindakan_pelayanan" id="id_tindakan_pelayanan" class="form-control" style="width: 300px">
											<option value=""></option>
											<?php foreach ($getJenisPelayanan->result_array() as $xJP) : ?>
												<option value="<?php echo $xJP['idx'] ?>" <?php if ($id_tindakan_pelayanan == $xJP["idx"]) echo "selected"; ?>><?php echo $xJP['jenis_pelayanan'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Cara Keluar <span style="color: red"> * </span></label>
									<div class="input-group col-md-6">
										<select name="id_cara_keluar" id="id_cara_keluar" class="form-control" style="width: 300px">
											<?php foreach ($getCaraKeluar->result_array() as $xCP) : ?>
												<option value="<?php echo $xCP['idx'] ?>" <?php if ($id_cara_keluar == $xCP["idx"]) echo "selected"; ?>><?php echo $xCP['cara_keluar'] ?></option>
											<?php endforeach; ?>

										</select>
									</div>
								</div>

								<div class="form-group">
									<label>Keadaan Keluar <span style="color: red"> * </span></label>
									<div class="input-group col-md-8">
										<select name="id_keadaan_keluar" id="id_keadaan_keluar" class="form-control" style="width: 300px">
											<?php foreach ($getKeadaanKeluar->result_array() as $xKK) : ?>
												<option value="<?php echo $xKK['idx'] ?>" <?php if ($id_keadaan_keluar == $xKK["idx"]) echo "selected" ?>><?php echo $xKK['keadaan_keluar'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label>&nbsp;</label>
									<div class="input-group" id="btnExec">
										<button type="button" class="btn btn-primary" id="btnBatal">
											<i class="glyphicon glyphicon-new-window"></i> Batal</button>
										<button type="button" class="btn btn-danger" id="submit" <?php if ($pulang > 0 || $detail->status_transaksi == 0) echo "disabled"; ?> onclick="simpanPulang()">
											<i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
									</div>
								</div>
							</div>
						</form>
				<?php
					}
				}
				?>

			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.tanggal').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd"
		})
		$('#tgl_masuk, #tgl_keluar').on('change textInput input', function() {
			if (($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
				var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
				var firstDate = new Date($("#tgl_masuk").val());
				var secondDate = new Date($("#tgl_keluar").val());
				var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
				if (diffDays < 0) {
					$("#los").val('');
					$("#tgl_keluar").val('');
					alert('Tanggal keluar tidak boleh lebih rendah dari tanggal masuk');
				} else {
					$("#los").val(diffDays + 1);
				}
			}
		});
	})
</script>