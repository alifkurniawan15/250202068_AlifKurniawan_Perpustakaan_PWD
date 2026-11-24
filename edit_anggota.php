<?php
require_once "koneksi.php";
 
//memanggil id dari url
$id = $_GET['id'];

//memanggil data anggota berdasaekan id

$query = "SELECT * FROM anggota WHERE id= ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

//memeriksa apakah data ditemukan'
if (mysqli_num_rows($result) == 0) {
    die("Data Anggota tidak Ditemukan. ");
}

//merubah result menjadi assosiatif
$baris = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charsert="UTF-8">
        <title>EDIT anggota</title>
    </head>
    <body>
        
        <h2>Edit Data Anggota</h2>

        <form action="proses_update.php" method="POST">

            <input type="hidden" name="id"
             value="<?= $baris ['id'];?>" >

            <label>Nomer Anggota</label><br>
            <input type="text" name="no_anggota"
            value="<?= htmlspecialchars($baris['no_anggota']); ?>"
            maxlength="15" required>
            <br><br>

            <label>Nama Lengkap</label><br>
            <input type="text" name="nama_lengkap"
            value="<?= htmlspecialchars($baris['nama_lengkap']); ?>"
            maxlength="100" required>
            <br><br>

            <label>Email</label><br>
            <input type="email" name="email"
            value="<?= htmlspecialchars($baris['email']); ?>"
            maxlength="100" required>
            <br><br>

            <label>NO HP</label><br>
            <input type="text" name="no_hp"
            value="<?= htmlspecialchars($baris['no_hp']); ?>"
            maxlength="15" required>
            <br><br>

            <label>Jenis Anggota</label><br>
            <select name="jenis_anggota" require>
                <option value="Mahasiswa"
                <?= $baris['jenis_anggota'] == "Mahasiswa" ? "selected" : ""; ?>>
                Mahasiswa
                </option>

                <option value="Dosen"
                <?= $baris['jenis_anggota'] == "Dosen" ? "selected" : ""; ?>>
                Dosen
                </option>

                <option value="Tenaga Kependidikan"
                <?= $baris['jenis_anggota'] == "Tenaga Kependidikan" ? "selected" : ""; ?>>
                Tenaga Kependidikan
                </option>
            </select>
            <br><br>

            <label>Alamat</label><br>
            <textarea name="alamat" rows="4" cols="40"
            required><?= htmlspecialchars($baris["alamat"]); ?>
            </textarea>
            <br><br>

            <button type="submit" name="update">
                Update Data
            </button>
            <a href=data.php">Kembali</a>
        </form>
    </body>
</html>