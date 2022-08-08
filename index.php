<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title>Export Data ke Excel dengan PhpSpreadsheet</title>

	</head>
	<body>
		<h3>Form Export Data</h3>
		<form method="POST" action="proses.php">
			<label for="bln">Bulan</label>
			<input type="date" name="bln" id="bln" required></input>
			<button href="proses.php">Export ke Excel</button>
		</form>
		<br><br>

		<?php
			// Load file koneksi.php
			include "koneksi.php";
			
			// Buat query untuk menampilkan semua data siswa
			//$sql = $pdo->prepare("SELECT * FROM siswa");
			
			// $sql = $pdo->prepare("SELECT jadwal_dinas.id ID,jadwal_dinas.id_user, jadwal_dinas.tanggal TANGGAL, jadwal_dinas.id_shift ID_SHIFT, user_list.nama_lengkap NAMA, level_shift.shift SHIFT, level_shift.kode KODE FROM jadwal_dinas LEFT JOIN user_list on user_list.id = jadwal_dinas.id_user LEFT JOIN level_shift on level_shift.id = jadwal_dinas.id_shift;");
			// $sql->execute(); // Eksekusi querynya
			// $data = $sql->fetchAll();
			
			// $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			// Load file autoload.php
			require 'vendor/autoload.php';

			// Include librari PhpSpreadsheet
			use PhpOffice\PhpSpreadsheet\Spreadsheet;
			use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
		?>
			<h3>Form Import Data</h3>
			<form method="post" action="index.php" enctype="multipart/form-data">
				<!-- <a href="Format.xlsx">Download Format</a> -->
				<a href="index.php">Kembali</a>
				<br><br>
				<input type="file" name="file">
				<button type="submit" name="preview">Preview</button>
			</form>
			<hr>

			<?php
			// Jika user telah mengklik tombol Preview
			if (isset($_POST['preview'])) {
				$tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
				$nama_file_baru = date('Y-m-d-His'). '-FormatDinas' . '.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

				$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
				$tmp_file = $_FILES['file']['tmp_name'];

				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if ($ext == "xlsx") {
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{tglsekarang}.xlsx
					// {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
					// Contoh nama file setelah di rename : data20210814192500.xlsx
					move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					$spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
					
					$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import.php'>";

					// Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
					// ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
					echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

					// Buat sebuah div untuk alert validasi kosong
					echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
						</div>";
					
					// hitung kolom dan baris
					$jml_baris = 1;
					$jml_kolom = 0;
					$kolom = ['A', 'B','C', 'D', 'E', 'F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG'];
					foreach ($sheet as $row){
						// Cek jika semua data tidak diisi
						if ($row['A'] == "" && $row['B'] == ""){
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
						}
						if($jml_baris > 0){
							while(isset($row[$kolom[$jml_kolom]]) && $jml_kolom+1 < 33){
								$jml_kolom++;
							}
						}
						$jml_baris++;
					}
					// $spreadsheet->getActiveSheet()
					echo "<table border='1' cellpadding='5'>";
					echo "<tr><th colspan='" . $jml_kolom+1 . "'>" .$jml_kolom. "-" . $sheet[1]['B'] . "-" . $sheet[1]['D'] . "</th></tr>";
					echo "<tr>
					<th>No</th>
					<th>Nama</th>";
					for($i=0; $i<=$jml_kolom-2; $i++){
						echo "<th>" . $i+1 . "</th>";
					}
					echo "</tr>";

					$numrow = 1;
					$kosong = 0;
					$no = 1;
					foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$nomor = $row['A']; // Ambil data nomor
						$username = $row['B']; // Ambil data id
						//$jadwal = $row; // Ambil data jadwal
						// Cek jika semua data tidak diisi
						if ($username == ""){
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
						}
						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if ($numrow > 2) {
							// Validasi apakah semua data telah diisi
							$no_td = (!empty($nomor)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$username_td = (!empty($username)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							//$jadwal = (!empty($jadwal)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah

							// Jika salah satu data ada yang kosong
							if ($nomor = "" && $username = "") {
								$kosong++; // Tambah 1 variabel $kosong
							}

							echo "<tr>";
							echo "<td" . $no_td . ">" . $no . "</td>";
							echo "<td" . $username_td . ">" . $username . "</td>";
							for($i=0; $i<=$jml_kolom-2; $i++){
								$jadwal = strtoupper($row[$kolom[$i+2]]);
								$sql_shift = $pdo->prepare("SELECT id FROM level_shift WHERE kode LIKE '". trim($jadwal) ."%' LIMIT 1");
								$sql_shift->execute();
								$id_shift = $sql_shift->fetchAll();
								if($jadwal == null || $id_shift == null){
									$sql_shift = null;
									$jadwal = "";	
								}
								$jadwal_td = (!empty($jadwal)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
								echo "<td" . $jadwal_td . ">" . $jadwal . "</td>";
							}
							echo "</tr>";
							$no++;
						}

						$numrow++; // Tambah 1 setiap kali looping
					}

					echo "</table>";

					// Cek apakah variabel kosong lebih dari 0
					// Jika lebih dari 0, berarti ada data yang masih kosong
					if ($kosong > 0) {
				?>
						<script>
							$(document).ready(function() {
								// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
								$("#jumlah_kosong").html('<?php echo $kosong; ?>');

								$("#kosong").show(); // Munculkan alert validasi kosong
							});
						</script>
			<?php
					} else { // Jika semua data sudah diisi
						echo "<hr>";

						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import'>Import</button>";
					}

					echo "</form>";
				} else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div style='color: red;margin-bottom: 10px;'>
				Hanya File Excel 2007 (.xlsx) yang diperbolehkan
						</div>";
				}
			}
			?>
	</body>
</html>