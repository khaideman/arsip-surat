<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css2/style.css">

</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $kategori=input($_POST["kategori"]);
        $tanggal=input($_POST["tanggal"]);
        $link=input($_POST["link"]);

        $sql="insert into crud (nama,kategori,tanggal,link) values
		('$nama','$kategori','$tanggal','$link')";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:crud.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Surat:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Surat" required />
        </div>
        <div class="form-group">
            <label for="kategori">Kategori Surat:</label>
            <select name="kategori" id="kategori">
                <option value="Surat Tugas">Surat Tugas</option>
                <option value="Surat Keterangan">Surat Keterangan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Link:</label>
            <input type="text" name="link" class="form-control" placeholder="Masukan Link Google Drive" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
