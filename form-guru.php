<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Guru</title>
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
                        Form Guru
                    </b>
                </h4>
            </div>

            <div class="card-body bg-dark">
                <ul>
                    <?php
                        // untuk edit
                        if (isset($_GET["id"])) {
                            include "connection.php";

                            $id = $_GET["id"];
                            $sql = "select * from guru where id = '$id'";

                            // eksekusi SQL
                            $query = mysqli_query($connect, $sql);

                            // konversi array
                            $guru = mysqli_fetch_array($query);

                            if ($guru["jenis_kelamin"] == 0) {
                                $jenis_kelamin = "Laki-laki";
                            } else if ($guru["jenis_kelamin"] == 1) {
                                $jenis_kelamin = "Perempuan";
                            }
                            ?>
                            
                            <form action="process-guru.php" method="post" 
                            enctype="multipart/form-data" 
                            onsubmit="return confirm('Apakah anda yakin ingin mengubah data ini?')">
                                <p class="text-white mb-0">
                                    ID Guru
                                </p>
                               <input type="number" name="id"
                                class="form-control mb-3" required
                                value="<?=$guru["id"]?>">

                                <p class="text-white mb-0">
                                    Nama Guru
                                </p>
                               <input type="text" name="nama"
                                class="form-control mb-3" required
                                value="<?=$guru["nama"]?>">

                                <p class="text-white mb-0">
                                    Jenis Kelamin
                                </p>
                                <select type="text" name="jenis_kelamin" class="form-control mb-3" required
                                value="<?=$jenis_kelamin?>">
                                    <option value="0">Laki-Laki</option>
                                    <option value="1">Peremuan</option>
                                </select>

                                <p class="text-white mb-0">
                                    Alamat
                                </p>
                               <input type="text" name="alamat"
                                class="form-control mb-3" required
                                value="<?=$guru["alamat"]?>">

                                <button type="submit" class="btn btn-success btn-block mt-4" name="edit_guru">
                                    Simpan
                                </button>
                            </form>
                            <?php
                        } elseif (!isset($_POST["id"])) {
                            ?>

                            <form action="process-guru.php" method="post" 
                            enctype="multipart/form-data">

                                <p class="text-white mb-0">
                                    ID Guru
                                </p>
                                <input type="number" name="id"
                                class="form-control mb-3" required>

                                <p class="text-white mb-0">
                                    Nama Guru
                                </p>
                                <input type="text" name="nama"
                                class="form-control mb-3" required>

                                <p class="text-white mb-0">
                                    Jenis Kelamin
                                </p>
                                <select type="text" name="jenis_kelamin" class="form-control mb-3" required>
                                    <option value="0">Laki-Laki</option>
                                    <option value="1">Peremuan</option>
                                </select>

                                <p class="text-white mb-0">
                                    Alamat
                                </p>
                                <input type="text" name="alamat"
                                class="form-control mb-3" required>

                                <button type="submit" class="btn btn-success btn-block" name="simpan_guru">
                                    Simpan
                                </button>
                            </form>

                        <?php
                        }
                    
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>