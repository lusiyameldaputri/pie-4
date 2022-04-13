<?php
include '_includes/db.php';
$db = PWE_DB::connect();

$nama = $_POST ['nama'];
$npm = $_POST ['npm'];
$email = $_POST ['email'];
$password = $_POST ['password'];

$password = md5($password);

$query = $db->prepare('INSERT INTO `anggota` (`id`, `nama`, `npm`, `email`, `password`)
    VALUES (NULL, ?, ?, ?, ?)');
    $insert = $query->execute([$nama, $npm, $email, $password]);


    if ($insert) {
        header('Location: berhasil-daftar.php');
    }
    else {
        echo 'Gagal melakukan pendaftaran. Silahkan periksa data kembali';
    }