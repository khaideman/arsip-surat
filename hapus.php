<?php

    include "koneksi.php";

    if (isset($_GET['id_surat'])) {
        $id_surat=htmlspecialchars($_GET["id_surat"]);

        $sql="delete from crud where id_surat='$id_surat' ";
        $hasil=mysqli_query($kon,$sql);

            if ($hasil) {
                header("Location:crud.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
