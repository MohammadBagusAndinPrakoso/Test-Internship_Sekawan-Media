<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body
        {
            background-color: darkgrey;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="text-black">
                    <b>
                        List Siswa
                    </b>
                </h4>
            </div>

            <div class="card-body bg-dark">
                <form action="list-member" method="get">
                    
                </form>

                <ul>
                    <?php
                    
                        include ("connection.php");
                        $sql = "select * from siswa";

                        // eksekusi perintah SQL
                        $query = mysqli_query($connect, $sql);
                        while ($siswa = mysqli_fetch_array($query)) { ?>
                            <li class="list-group-item bg-dark">
                                <div class="row">
                                    <?php
                                    
                                    if ($siswa["jenis_kelamin"] == 0) {
                                        $jenis_kelamin = "Laki-laki";
                                    } else if ($siswa["jenis_kelamin"] == 1) {
                                        $jenis_kelamin = "Perempuan";
                                    }

                                    ?>

                                    <div class="col-lg-10 col-md-8">
                                        <h6 class="text-white"><b>ID Anggota : </b><?=$siswa["id"]?></h6>
                                        <h6 class="text-white"><b>Nama Anggota : </b><?=$siswa["nama"]?></h6>
                                        <h6 class="text-white"><b>Jenis Kelamin : </b><?=$jenis_kelamin?></h6>
                                        <h6 class="text-white"><b>Alamat : </b><?=$siswa["alamat"]?></h6>
                                    </div>

                                    <div class="col-lg-2 col-md-2">
                                        <a href="form-siswa.php?id=<?=$siswa["id"]?>">
                                            <button class="btn btn-block btn-info mb-2">
                                                Edit
                                            </button>
                                        </a>

                                        <a href="process-siswa.php?id=<?=$siswa["id"]?>">
                                            <button class="btn btn-block btn-danger mb-2" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                    
                    ?>
                </ul>
            </div>

            <div class="card-footer bg-dark">
                <a href="form-siswa.php">
                    <button class="btn btn-success">
                        Tambah Data Siswa
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>