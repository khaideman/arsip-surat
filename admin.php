<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}

$id_user=$_SESSION["id_user"];
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
$email=$_SESSION["email"];

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css2/style.css">

</head>
<body>
    <div class="jumbotron text-center">
      <br><h1>Sistem Informasi Surat Masuk dan Keluar</h1></p><br><br>
			<p>Nama : <?php echo $nama; ?></p>
	    <p>Username : <?php echo $username; ?></p>
	    <p>Email : <?php echo $email; ?></p><br><br>
				<a href class="btn btn-primary" onclick=" window.open('https://drive.google.com','_blank')">Upload Surat</a>
				<a href="crud.php" class="btn btn-primary" role="button">Lihat Surat</a><br><br>
        <a href="logout.php" class="btn btn-warning" role="button">Logout</a>
    </div>

</body>
</html>
