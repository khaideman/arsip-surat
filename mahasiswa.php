<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!=2) {
    echo "Anda tidak punya akses pada halaman User";
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
    <br><h1>Halaman User</h1>
    <p>Nama : <?php echo $nama; ?></p>
    <p>Username : <?php echo $username; ?></p>
    <p>Email : <?php echo $email; ?></p>
    <a href="lihat.php" class="btn btn-primary" role="button">Lihat Data</a><br><br>
    <a href="logout.php" class="btn btn-warning" role="button">Logout</a>
</div>

</body>
</html> 