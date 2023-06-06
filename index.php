<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>

    <div class="container">	
	<br><h2>Halaman Login</h2><br>
	<?php
		 function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			session_start();
			include "koneksi.php";
			$username = input($_POST["username"]);
			$p = input(md5($_POST["password"]));

			$sql = "select * from users where username='".$username."' and password='".$p."' limit 1";
			$hasil = mysqli_query ($kon,$sql);
			$jumlah = mysqli_num_rows($hasil);

			if ($jumlah>0) {
				$row = mysqli_fetch_assoc($hasil);
				$_SESSION["id_user"]=$row["id_user"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["nama"]=$row["nama"];
				$_SESSION["email"]=$row["email"];
				$_SESSION["level"]=$row["level"];


				if ($_SESSION["level"]=$row["level"]==1)
				{
					header("Location:admin.php");
				} else if ($_SESSION["level"]=$row["level"]==2)
				{
					header("Location:mahasiswa.php");
				}


			}else {
				echo "<div class='alert alert-danger'>
				<strong>Error!</strong> Username dan password salah.
			  </div>";
			}

		}

	?>

	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
        </div>
		<br>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
        </div>
		<br>
        <div class="form-group">
            <input type="submit"  class="btn btn-primary"  value="Login">
        </div>
        </form>
    </div>
</body>
</html>
