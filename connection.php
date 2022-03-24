<?php

// file ini digunakan untuk menghubungkan file denga database

$connect = mysqli_connect("localhost", "root", "", "sekolah");
/*  localhost --> hostname
    root --> username untuk masuk ke mysql
    "kosong" --> password untuk masuk ke mysql
    sekolah --> nama database yg kita hubungkan
*/

?>