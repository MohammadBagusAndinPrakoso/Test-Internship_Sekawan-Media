<?php

include ("connection.php");

// untuk menambahkan data baru
if (isset($_POST["simpan_siswa"])) {
    // menampung data
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];

    // membuat perintah sql untuk insert data
    $sql = "insert into siswa values('$id', '$nama', '$jenis_kelamin', '$alamat')";

    // eksekusi perintah SQL
    $query = mysqli_query($connect, $sql);

    // jika berhasil maka web akan mengarah ke list siswa
    // jika tidak maka akan menampilkan pesan error
    if ($query) {
        header('Location:list-siswa.php');
    } else {
        printf(mysqli_error($connect));
        exit();
    }
} 

// untuk mengedit data
else if (isset($_POST["edit_siswa"])) {
    // menampung data
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];

    // membuat perintah sql untuk insert data
    $sql = "update siswa set nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat' where id='$id'";

    // eksekusi perintah SQL
    $query = mysqli_query($connect, $sql);

    // jika berhasil maka web akan mengarah ke list siswa
    // jika tidak maka akan menampilkan pesan error
    if ($query) {
        header('Location:list-siswa.php');
    } else {
        printf(mysqli_error($connect));
        exit();
    }
}

else if (isset($_GET["id"])) {
    // menampung id dari data yang akan dihapus
    $id = $_GET["id"];

    // membuat perintah SQL
    $sql = "delete from siswa where id = '$id'";

    // eksekusi perintah SQL
    $query = mysqli_query($connect, $sql);

    // jika berhasil maka web akan mengarah ke list siswa
    // jika tidak maka akan menampilkan pesan error
    if ($query) {
        header('Location:list-siswa.php');
    } else {
        printf(mysqli_error($connect));
        exit();
    }
}

?>