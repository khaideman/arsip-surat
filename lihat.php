<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Tugas Pemrograman Web Lanjut</h4>
    <h5>Lihat Data</h5>
<?php

    include "koneksi.php";

    if (isset($_GET['id_surat'])) {
        $id_anggota=htmlspecialchars($_GET["id_surat"]);

        $sql="delete from crud where id_surat='$id_surat' ";
        $hasil=mysqli_query($kon,$sql);

            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIK</th>
            <th>Gaji Pegawai</th>
            <th>Masa Kerja Pegawai</th>
            <th>Tempat Lahir Pegawai</th>
        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from crud order by id_surat desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["npm"];   ?></td>
                <td><?php echo $data["ipk"];   ?></td>
                <td><?php echo $data["prodi"];   ?></td>
                <td><?php echo $data["fakultas"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="logout.php" class="btn btn-warning" role="button">Logout</a>

</div>

</body>
</html>
