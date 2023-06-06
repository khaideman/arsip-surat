<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css2/style.css">
    <style>
    #myInput {
    background-image: url('');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
    }
    </style>
</head>
<body>
<div class="container">
    <br>
    <h5>Input Data Surat</h5>
<?php

    include "koneksi.php";

    if (isset($_GET['id_surat'])) {
        $id_anggota=htmlspecialchars($_GET["id_surat"]);

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

    <a href="create.php" class="btn btn-primary" role="button">Insert Data</a>
    <a href="logout.php" class="btn btn-warning" role="button">Logout</a><br><br>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari nama surat.." title="Type in a name"><br>

    <table id="myTable" class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Surat</th>
            <th>Kategori Surat</th>
            <th>Tanggal</th>
            <th>Link</th>
            <th colspan='2'>Aksi</th>
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
                <td><?php echo $data["kategori"];   ?></td>
                <td><?php echo $data["tanggal"];   ?></td>
                <td onclick="location.href='<?php echo $data["link"];   ?>'"><a href="<?php echo $data["link"];   ?>"><?php echo $data["nama"];   ?></a></td>
                <td>
                    <a href="update.php?id_surat=<?php echo htmlspecialchars($data['id_surat']); ?>" class="btn btn-warning" role="button">Update</a>
                    <!-- <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_surat=<?php echo $data['id_surat']; ?>" class="btn btn-danger" role="button">Delete</a> -->
                    <a href="hapus.php?id_surat=<?php echo $data['id_surat']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>

    <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>

</div>
</body>
</html>
