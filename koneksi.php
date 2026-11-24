<?php
mysqli_report(MYSQLI_REPORT_OFF);

//parameter untuk koneksi ke db
$host = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

//membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

//memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: ". htmlspecialchars(mysqli_connect_error()));
}
 else echo "Koneksi berhasil ke DATABASE: " . htmlspecialchars("$database") .
//mengatur koneksi agar huruf dan simbol tersimpan dengan benar
mysqli_set_charset($koneksi,"utf8mb4");
?>
