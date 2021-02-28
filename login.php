<?php 
	include "koneksi.php";
	
	if (!isset($_SESSION["pengguna"])== 0) {
		header("Location: index.php");
	}
	if (isset($_POST["cmdLogin"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		try {
			$sql = "SELECT * FROM admin WHERE user = :username AND pass = :password"; // buat queri select
			$stmt = $koneksi->prepare($sql); 
			$stmt->bindParam(":username", $username);
			$stmt->bindParam(":password", $password);
			$stmt->execute(); // jalankan query
			$count = $stmt->rowCount(); // mengecek row
			if ($count == 1) { // jika rownya ada 
				$_SESSION["pengguna"] = $username;
			  	header("Location: ?page=dashboard");
				return;
			} else {
				echo "<script>alert('Anda tidak dapat login')</script>";
			}
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
		<div style="height : 100px; "><h3 class="text-center">Login</h3></div>
			<form action="?page=login" method="post">
				<div class="mb-3">
					<label class="form-label">Nama Pengguna</label>
					<input type="text" name="username" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Kata Sandi</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="text text-right">
					<a href="?page=daftar">Belum Punya Akun?</a>
				</div>
				<div class="mb-3">
					<button type="submit" name="cmdLogin" value="Login" class="btn btn-success">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>