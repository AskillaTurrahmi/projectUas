<?php
    include "koneksi.php";
	if (!isset($_SESSION["pengguna"])) {
		header("Location : ?page=dashboard");
	}
	$kode = isset($_POST["kode"]) ? $_POST["kode"] : "";
	$nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
	$simpan = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
	if ($simpan AND $kode != "" AND $nama != "" AND $harga != ""){
		$file_name = $_FILES['foto']['name'];
		$file_temp = $_FILES['foto']['tmp_name'];
		$allowed_ext = array("jpg", "jpeg", "gif", "png", "jfif");
		$exp = explode(".", $file_name);
		$ext = end($exp);
		$path = "fotoInstan/".$file_name;
		if (in_array($ext, $allowed_ext)) {
			if (move_uploaded_file($file_temp, $path)) {
				try {
					$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query = $koneksi->prepare("INSERT INTO instan (kode_barang, nama_barang, harga_barang, foto) VALUES (:kode, :nama, :harga, :file_name)");
					$query->bindParam(":kode", $kode);
					$query->bindParam(":nama", $nama);
					$query->bindParam(":harga", $harga);
					$query->bindParam(":file_name", $file_name);
					if ($query->execute()) {
						echo "<script>alert('Data Berhasil Disimpan')</script>";
					} else {
						echo "<script>alert('Data Gagal Disimpan')</script>";
					}
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div><h3 class="text-center">Input Data Hijab Instan</h3></div>
			<form action="?page=inputInstan" method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Kode Barang</label>
					<input type="text" class="form-control" name="kode">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama Barang</label>
					<input type="text" class="form-control" name="nama">
				</div>
                <div class="mb-3">
					<label class="form-label">Harga Barang</label>
					<input type="text" class="form-control" name="harga">
				</div>
				<div class="mb-3">
					<label class="form-label">File Foto</label>
					<input type="file" class="form-control" name="foto">
				</div>
				<button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
			</form>
		</div>
	</div>
</div>