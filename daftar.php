<?php
    include "koneksi.php";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $daftar = isset($_POST["daftar"]) ? $_POST["daftar"] : "";
    if ($daftar AND $username != "" AND $password != "") {
        try {
            $query = $koneksi->prepare("INSERT INTO admin (user, pass) VALUES (:username, :password)");
            $query->bindParam(":username", $username);
            $query->bindParam(":password", $password);
            if ($query->execute()) {
                echo "<script>alert('Proses Daftar Berhasil')</script>";
            } else {
                echo "<script>alert('Proses Daftar Gagal')</script>";
            }
        } catch(PDOExcaption $e) {
            echo $e->getMessage();
        }
    }
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
		<div style="height : 100px; "><h3 class="text-center">Daftar</h3></div>
			<form action="?page=daftar" method="post">
				<div class="mb-3">
					<label class="form-label">Nama Pengguna</label>
					<input type="text" name="username" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Kata Sandi</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="mb-3">
					<button type="submit" name="daftar" value="Daftar" class="btn btn-success">Daftar</button>
				</div>
			</form>
		</div>
	</div>
</div>