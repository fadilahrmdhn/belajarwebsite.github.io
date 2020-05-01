<?php
    include_once("koneksi.php");    
    $result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY id ASC");
?>

<!-- Validasi -->
<?php
if (isset ($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kontak = $_POST['kontak'];

    include_once("koneksi.php");
    $send = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama,nim,tempat_lahir,tanggal_lahir,kontak) values('$nama','$nim','$tempat_lahir','$tanggal_lahir','$kontak')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Universitas Hasanuddin | CRUD PHP</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/584999f8a5.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Universitas Hasanuddin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="form.php">Tambah Data</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container" style="margin-top:20px">
    <h2>Daftar Mahasiswa</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA</th>
                <th scope="col">NIM</th>
                <th scope="col">TEMPAT TANGGAL LAHIR</th>
                <th scope="col">KONTAK</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            $number=1;
            while($resultMHS = mysqli_fetch_array($result)) {         
                echo "<tr>";
                    echo "<td>".$number++."</td>";
                    echo "<td>".$resultMHS['nama']."</td>";
                    echo "<td>".$resultMHS['nim']."</td>";    
                    echo "<td>".$resultMHS['tempat_lahir']. ',' .$resultMHS['tanggal_lahir']."</td>";
                    echo "<td>".$resultMHS['kontak']."</td>";
                    echo "<td>";
                        echo "<a href='edit.php?id=$resultMHS[id]' class='badge badge-primary'><i class='fa fa-edit'></i></a>";
                        echo "<a href='delete.php?id=$resultMHS[id]' class='badge badge-primary'><i class='fa fa-eraser'></i></a>";        
                    echo "</td>";
                echo "</tr>";
            }?>
        </tbody>            
    </table>        
</div>
</body>
</html>