<?php
 require_once("koneksi.php");

//memastikan data dikirim method POST
if ($_SERVER ["REQUEST_METHOD"] !="POST") {
    header("Location : data.php");
    exit;
}

//mengambil id anggota
$id = $_POST["id"];

//Memeriksa ID
//  if (!isset( $id ) || !ctype_digit((string) $id)) {
//       die(" ID anggota tidak valid. "); 
// }

//Membuat Query Delete
$query = "DELETE FROM anggota WHERE id= ?";
//Menyiapkan Prepared Statement
$stmt = mysqli_prepare($koneksi, $query);
//Mengikat Parameter
mysqli_stmt_bind_param($stmt , "i" , $id);

//menjalankan query delete
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: data.php");
    exit;
} else {
    die("GAGAL menghapus data: " . mysqli_stmt_error($stmt));
}
?>