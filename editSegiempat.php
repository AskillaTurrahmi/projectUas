<?php
    include "koneksi.php";
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    $kode = isset($_POST["kode"]) ? $_POST["kode"] : "";
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
    $simpan = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
    if ($simpan AND $id != "" AND $kode != "" AND $nama != "" AND $harga != "") {	
        try {
            $query = $koneksi->prepare("UPDATE segiempat SET kode_barang=:kode, nama_barang=:nama, harga_barang=:harga WHERE id_barang=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":kode", $kode);
            $query->bindParam(":nama", $nama);
            $query->bindParam(":harga", $harga);
            if ($query->execute()) {
                echo "<script>alert('Data Berhasil Di Perbaharui')</script>";
            } else {
                echo "<script>alert('Gagal Perbaharui Data')</script>";
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

/** Proses memilih data */
    if ($id != "") {
        try {
            $query = $koneksi->prepare("SELECT * FROM segiempat WHERE id_barang=:id");
            $query->bindParam(":id", $id);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <div><h3 class="text-center">Edit Data Hijab Pashmina</h3></div>
			<form action="?page=editSegiempat" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
					<label class="form-label">Kode Barang</label>
					<input type="text" class="form-control" name="kode" value="<?php echo $data->kode_barang; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama Barang</label>
					<input type="text" class="form-control" name="nama" value="<?php echo $data->nama_barang; ?>">
				</div>
                <div class="mb-3">
					<label class="form-label">Harga Barang</label>
					<input type="text" class="form-control" name="harga" value="<?php echo $data->harga_barang; ?>">
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