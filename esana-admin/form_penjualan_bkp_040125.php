<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Data Penjualan Hari Ini - E S A N A</title>
		<link rel="shortcut icon" href="img/esana.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<link rel="stylesheet" href="css/freelancer.min.css">-->
		<link rel="stylesheet" href="css/journ_bootstrap.min.css">
		<!--<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
		<script type="text/javascript" charset="utf8" src="js/jquery-3.3.1.min.js"></script>
		<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">-->
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>-->
		<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
		<script data-ad-client="ca-pub-5256228815542923" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<style>
			table, th, td {
			border: 2px solid white;
			border-collapse: collapse;
			}
		</style>
		<style>
        /* Style untuk background modal penuh layar */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Latar belakang lebih gelap */
            z-index: 1000;
        }

        /* Style untuk modal box memenuhi layar */
        .modal-box {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 20px;
            overflow-y: auto;
            box-sizing: border-box;
            z-index: 1001;
        }

        /* Style untuk konten di dalam modal */
        .modal-content {
            max-width: 600px;
            margin: 50px auto;
        }

        .modal-box input, .modal-box button {
            width: 100%;
            margin: 10px 0;
            padding: 8px;
            box-sizing: border-box;
        }

        .modal-box button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-box button:hover {
            background-color: #0056b3;
        }

        .close-btn {
            cursor: pointer;
            color: red;
            font-size: 24px;
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>

	</head>
	<body>
		<?php
			error_reporting(0);
			   session_start();
			include 'koneksi.php';					
			date_default_timezone_set('Asia/Hong_Kong');
			$tgl_hari_ini = date("Y-m-d");
			   if ($_SESSION['status'] != "login") {
			       echo "<script>alert('Anda Harus Login untuk mengakses halaman ini');window.location.href='index?pesan=belum_login';</script>";
			}
			else{
			$juml_ofl = mysqli_query($koneksi, "SELECT sum(KUANTITAS) as ofl FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='Offline'");
			      $juml_wa = mysqli_query($koneksi, "SELECT sum(KUANTITAS) as wa FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='WA/IG'");
			      $juml_sh = mysqli_query($koneksi, "SELECT sum(KUANTITAS) as shh FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='Shopee'");
			      $juml_tk = mysqli_query($koneksi, "SELECT sum(KUANTITAS) as tk FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='TikTok'");
			      $juml_ta = mysqli_query($koneksi, "SELECT sum(KUANTITAS) as ta FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='TikTok Affiliate'");
			//$juml_onl = mysqli_query($koneksi, "SELECT sum(KUANTITAS) as onl FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='Online'");
			
			$trx_ofl = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(KODE_PENJUALAN)) AS trxx_ofl FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='Offline'");
			$trx_wa = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(KODE_PENJUALAN)) AS trxx_wa FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='WA/IG'");
			$trx_sh = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(KODE_PENJUALAN)) AS trxx_sh FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='Shopee'");
			$trx_tk = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(KODE_PENJUALAN)) AS trxx_tk FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='TikTok'");
			$trx_ta = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(KODE_PENJUALAN)) AS trxx_ta FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='TikTok Affiliate'");
			//$trx_onl = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(KODE_PENJUALAN)) AS trxx_onl FROM tbl_penjualan WHERE TGL='$tgl_hari_ini' AND SUMBER='Online'");
			
			     
			      while ($dd = mysqli_fetch_array($juml_ofl)) {
			          $tot_of = $dd['ofl'];
			$tot_ofl = number_format($tot_of, 0, ",", ".");
			}
			     
			      while ($dd = mysqli_fetch_array($juml_wa)) {
			          $tot_wa = $dd['wa'];
			$tot_waa = number_format($tot_wa, 0, ",", ".");
			}
			      while ($dd = mysqli_fetch_array($juml_sh)) {
			          $tot_sh = $dd['shh'];
			$tot_shh = number_format($tot_sh, 0, ",", ".");
			}
			     
			     
			      while ($dd = mysqli_fetch_array($juml_tk)) {
			          $tot_tk = $dd['tk'];
			$tot_tkk = number_format($tot_tk, 0, ",", ".");
			}
			     
			      while ($dd = mysqli_fetch_array($juml_ta)) {
			          $tot_ta = $dd['ta'];
			$tot_taa = number_format($tot_ta, 0, ",", ".");
			}
			      while ($ddd = mysqli_fetch_array($juml_onl)) {
			          $tot_on = $ddd['onl'];
			$tot_onl = number_format($tot_on, 0, ",", ".");
			}
			
			      while ($dd2 = mysqli_fetch_array($trx_ofl)) {
			          $tot_trxx_of = $dd2['trxx_ofl'];
			$tot_trxx_ofl = number_format($tot_trxx_of, 0, ",", ".");
			}
			
			      while ($dd2 = mysqli_fetch_array($trx_sh)) {
			          $tot_trxx_sh = $dd2['trxx_sh'];
			$tot_trxx_shh = number_format($tot_trxx_sh, 0, ",", ".");
			}
			
			      while ($dd2 = mysqli_fetch_array($trx_wa)) {
			          $tot_trxx_wa = $dd2['trxx_wa'];
			$tot_trxx_waa = number_format($tot_trxx_wa, 0, ",", ".");
			}
			
			      while ($dd2 = mysqli_fetch_array($trx_tk)) {
			          $tot_trxx_tk = $dd2['trxx_tk'];
			$tot_trxx_tkk = number_format($tot_trxx_tk, 0, ",", ".");
			}
			
			      while ($dd2 = mysqli_fetch_array($trx_ta)) {
			          $tot_trxx_ta = $dd2['trxx_ta'];
			$tot_trxx_taa = number_format($tot_trxx_ta, 0, ",", ".");
			}
			      while ($ddd2 = mysqli_fetch_array($trx_onl)) {
			          $tot_trxx_on = $ddd2['trxx_onl'];
			$tot_trxx_onl = number_format($tot_trxx_on, 0, ",", ".");
			}
			$tot_pc=$tot_of+$tot_on+$tot_sh+$tot_wa+$tot_tk+$tot_ta;
			$tot_pcs = number_format($tot_pc, 0, ",", ".");
			
			$tot_trx=$tot_trxx_of+$tot_trxx_on+$tot_trxx_wa+$tot_trxx_sh+$tot_trxx_tk+$tot_trxx_ta;
			$tot_trxx = number_format($tot_trx, 0, ",", ".");
			}
			   ?>
		<h1 align='center' style="background-color:#c27f86;color:#FFFFFe">DATA PENJUALAN HARI INI_CEK</h1>
		<h3 align='center' style="background-color:#f7ced3;color:#c27f86">- E S A N A -</h3>
		<br>
		<table id="tabel3" class="" style="width:100%;" border="0" cellpadding="0" cellspacing="1">
			<tr>
				<td align="left">
					<!--<a style="background-color:#a25f66;color:#FFFFFe" href="utama"> KE MENU UTAMA </a></br>
						<a style="background-color:#dd9ba2;color:#FFFFFe" href="form_penjualan_all" target="_BLANK"> LIHAT SEMUA DATA PENJUALAN </a></br>
						<a style="background-color:#dd9ba2;color:#FFFFFe" href="input_penjualan"> INPUT DATA PENJUALAN </a>-->
					<a class="btn btn-primary mb-1" href="utama" target="_BLANK"> MENU UTAMA</a><br>
					<a class="btn btn-primary mb-1" href="form_penjualan_all" target="_BLANK"> SEMUA DATA PENJUALAN </a>
					<a class="btn btn-primary mb-1" onclick="openModal()"> PILIH TANGGAL</a></br>
					
					
					
					<!-- Overlay dan Modal Box -->
						<div class="modal-overlay" id="modalOverlay">
							<div class="modal-box">
								<span class="close-btn" onclick="closeModal()">×</span>
								<h2>Pilih Tanggal</h2>
								<!-- Form untuk tanggal -->
								<form id="dateForm" action="form_penjualan_pilih_tgl.php" method="POST">
									<label for="startDate">Tanggal Awal:</label>
									<input type="date" id="startDate" name="tanggal_awal" required>

									<label for="endDate">Tanggal Akhir:</label>
									<input type="date" id="endDate" name="tanggal_akhir" required>

									<!-- Gunakan elemen <a> dengan JavaScript untuk submit -->
									<a class="btn btn-primary" onclick="document.getElementById('dateForm').submit();">Submit</a>
									<a class="btn btn-secondary" onclick="closeModal()">Batal</a>
								</form>
							</div>
						</div>
					
					<a class="btn btn-primary mb-1" href="form_penjualan_31_hari" target="_BLANK"> PENJUALAN 31 HARI TERAKHIR</a></br>
					<a class="btn btn-primary" href="input-transaksi">+ INPUT TRANSAKSI </a>
					<!-- <a class="btn btn-success" href="input-transaksi"> INPUT TRANSAKSI-NEW ✅ </a> -->
				</td>
				<td align="right">
					<table style="width:50%;background-color:#c27f86" border="2">
						<tr>
							<td style="padding-left:10px">
								<p style="color:#ffffff;font-size:16px"><b>Transaksi : <?php echo $tot_trxx; ?></b></p>
								<!--<p style="color:#ffffff;font-size:16px">Online : <b><?php echo $tot_trxx_onl; ?></b></p>-->
								<p style="color:#ffffff;font-size:16px">Offline : <b><?php echo $tot_trxx_ofl; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Wa/IG : <b><?php echo $tot_trxx_waa; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Shopee : <b><?php echo $tot_trxx_shh; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Tiktok : <b><?php echo $tot_trxx_tkk; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Tiktok Affiliate : <b><?php echo $tot_trxx_taa; ?></b></p>
							</td>
							<td style="padding-left:10px">
								<p style="color:#ffffff;font-size:16px"><b>Total PCS : <?php echo $tot_pcs; ?></b></p>
								<!--<p style="color:#ffffff;font-size:16px">Online : <b><?php echo $tot_onl; ?></b></p>-->
								<p style="color:#ffffff;font-size:16px">Offline : <b><?php echo $tot_ofl; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Wa/IG : <b><?php echo $tot_waa; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Shopee : <b><?php echo $tot_shh; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Tiktok : <b><?php echo $tot_tkk; ?></b></p>
								<p style="color:#ffffff;font-size:16px">Tiktok Affiliate : <b><?php echo $tot_taa; ?></b></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table id="tabel1" class="table table-striped" border="1" cellpadding="0" cellspacing="1">
			<thead align="center">
				<tr align='center' class="table-primary">
					<th>No.</th>
					<th>No. Resi</th>
					<th>Jumlah Barang</th>
					<th>Nominal</th>
					<th>Jenis Transaksi</th>
					<th>Waktu</th>
					<th>Oleh</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
				//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
				error_reporting(0);
				         include 'koneksi.php';						
				date_default_timezone_set('Asia/Hong_Kong');
				$tgl_hari_ini = date("Y/m/d");
				         $no   = 1;
				function formatTanggal($date){
				// ubah string menjadi format tanggal
					return date('d-M-Y', strtotime($date));
				}
				         //$data = mysqli_query($koneksi, "select * from tbl_penjualan order by KODE_PENJUALAN DESC");
				         //$data = mysqli_query($koneksi, "select URUT,KODE_PENJUALAN,TGL,JAM,KODE_BARANG,NAMA_BARANG,KATEGORI,SUMBER,KUANTITAS,DISKON,AKSI,HARGA_SATUAN,JUMLAH,POTONGAN from tbl_penjualan WHERE YEAR(TGL)='2021' GROUP BY KODE_PENJUALAN order by KODE_PENJUALAN DESC");
				       
				         $data = mysqli_query($koneksi, "select NO_RESI,SUM(KUANTITAS) AS QTY, COUNT('KODE_PENJUALAN') AS JUMLAHH,SUMBER,KODE_PENJUALAN,TGL,SOURCE,OLEH,HARGA_SATUAN,JUMLAH,POTONGAN,TGL,JAM,BAYAR from tbl_penjualan WHERE TGL='$tgl_hari_ini' GROUP BY KODE_PENJUALAN ORDER BY KODE_PENJUALAN DESC");
				         
				         //$data = mysqli_query($koneksi, "select * from tbl_penjualan GROUP BY KODE_PENJUALAN ORDER BY KODE_PENJUALAN DESC LIMIT 20");
				         while ($d = mysqli_fetch_array($data)) {
				             $harga1 = number_format($d['HARGA_SATUAN'], 0, ",", ".");
				             $harga2 = number_format($d['JUMLAH'], 0, ",", ".");
				             $qty = number_format($d['QTY'], 0, ",", ".");
				             $harga3 = number_format($d['POTONGAN'], 0, ",", ".");
				             $bayar = number_format($d['BAYAR'], 0, ",", ".");
				             $bayar_tamp = "Rp".$bayar;
				             $tgl = formatTanggal($d['TGL']);  
				             $jam = $d['JAM'];
				             $no_resi = $d['NO_RESI'];
				             $jam = substr($jam,0,8);
				             $hari = date('l', strtotime($d['TGL']));
				             $semua = $hari.", ".$tgl;
				         ?>
			<tr style="text-align: center;">
				<td><?php
					echo $no++;
					?></td>
				<td><?php
					echo $no_resi;
					?></td>
				<td><?php
					echo $qty;
					?></td>
				<td style="text-align: right;"><?php
					echo $bayar_tamp;
					?></td>
				<td><?php
					echo $d['SUMBER'];
					?></td>
				<td><?php
					echo $jam;
					?></td>
				<td><?php
					echo $d['OLEH'];
					?></td>
				<td><a target="_BLANK" href='detail_penjualan?kode_penjualan=<?php
					echo $d['KODE_PENJUALAN'];
					?>' title="Detail Penjualan" onclick="return confirm('Want Show?')"><img src="img/show.png" height="100%" ></a>|
					<a target="_BLANK" href='reprint_jual?kode_penjualan=<?php
						echo $d['KODE_PENJUALAN'];
						?>' title="Reprint Penjualan" onclick="return confirm('Are you sure you want to reprint?')"><img src="img/print.png" height="100%" ></a>|<a href='delete_penjualan?kode_penjualan=<?php
						echo $d['KODE_PENJUALAN'];
						?>' title="Delete Penjualan" onclick="return confirm('Are you sure you want to delete?')"><img src="img/delete.png" height="100%" ></a>
				</td>
			</tr>
			<?php
				}
				?>        
		</table>
		<script type="text/javascript">
			$(document).ready(function() {
			    //$("#tabel1").tablesorter();
			    $("#tabel1").DataTable({
			        "paging": true,
			        "ordering": true,
			        "info": true,
			        // });
			        //$("#tabel1").DataTable({
			        "language": {
			            "decimal": "",
			            "emptyTable": "Tidak ada transaksi yang tersedia di tabel",
			            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Transaksi",
			            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 Transaksi",
			            "infoFiltered": "(difilter dari _MAX_ total Transaksi)",
			            "infoPostFix": "",
			            "thousands": ".",
			            "lengthMenu": "Menampilkan _MENU_ Transaksi Penjualan",
			            "loadingRecords": "memuat...",
			            "processing": "Sedang di proses...",
			            "search": "Pencarian:",
			            "zeroRecords": "Arsip tidak ditemukan",
			            "paginate": {
			                "first": "Pertama",
			                "last": "Terakhir",
			                "next": "Selanjutnya",
			                "previous": "Kembali"
			            },
			            "aria": {
			                "sortAscending": ": aktifkan urutan kolom ascending",
			                "sortDescending": ": aktifkan urutan kolom descending"
			            }
			        }
			    });
			});
		</script>
		<script>
        // Fungsi untuk membuka modal
        function openModal() {
            document.getElementById("modalOverlay").style.display = "block";

            // Set tanggal awal dan akhir
            const today = new Date();
            const yesterday = new Date(today);
            yesterday.setDate(today.getDate() - 1);

            // Format tanggal ke YYYY-MM-DD
            const formatDate = (date) => date.toISOString().split('T')[0];

            // Set nilai default input tanggal
            document.getElementById("startDate").value = formatDate(yesterday);
            document.getElementById("endDate").value = formatDate(today);
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("modalOverlay").style.display = "none";
        }
    </script>
	</body>
</html>