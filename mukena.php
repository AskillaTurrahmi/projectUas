<?php
    include "koneksi.php";
    $id=isset($_POST["id"]) ? $_POST["id"] : "";
	$hapus = isset($_POST["hapus"]) ? $_POST["hapus"] :"";
	if ($hapus AND $id != "") {
        try {
            $query = $koneksi->prepare("DELETE FROM mukena WHERE id_barang=:id");
            $query->bindParam(":id", $id);
            if ($query->execute()) {
                echo "<script>alert('Data berhasil dihapus')</script>";
            } else {
                echo "<script>alert('Data gagal dihapus')</script>";
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div><h3 class="text-center">Daftar Barang Mukena</h3></div>
				<table class="table table-hover table-striped table-bordered text-center">
					<tr>
                        <th>No</th>
						<th>Kode Barang</th>
                        <th>Nama Barang</th>
						<th>Harga Barang</th>
						<th>Gambar</th>
                        <th>Aksi</th>
					</tr>
					<?php
						try {
							$query = $koneksi->prepare("SELECT * FROM mukena");
							$query->execute();
                            $no = 1;
                            while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                echo "<form action='?page=mukena' method='post'>";
								echo "<input type='hidden' name='id' value='".$data->id_barang."'>";
                                echo "<tr>";
									echo "<td>".$no."</td>";
									echo "<td>".$data->kode_barang."</td>";
									echo "<td>".$data->nama_barang."</td>";
                                    echo "<td>".$data->harga_barang."</td>";
									echo "<td> <img src ='fotoMukena/".$data->foto."'width = '100' heigt = '100'</td>";
                                    echo "<td><button type='submit' class='btn btn-primary'>Buat Pemesanan</button>  | ";
                                    if (isset($_SESSION["pengguna"])) {
                                        echo "<a href='?page=editMukena&id=".$data->id_barang."' type='submit' class='btn btn-primary'>Edit</a>  |  ";
                                        echo "<button type='submit' class='btn btn-primary' name='hapus' value='Hapus'>Hapus</button></td>";
                                    }
                                echo "</tr>";
								$no++;
							}
						} catch(PDOException $e) {
                            echo $e->getMessage();
                        }
					?>
				</table>	
		</div>
	</div>
</div>
