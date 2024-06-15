<?php
session_start(); // Memulai sesi
include('../include/koneksi.php');

if (!isset($_SESSION['email'])) {
    // Jika sesi tidak ada, arahkan ke halaman login
    header("Location: ../login-admin.php");
    exit();
}

$email = $_SESSION['email']; // mengambil email dari session yang login

// Query untuk mengecek email
$cek = $koneksi->query("SELECT * FROM user WHERE email='$email'");
if ($cek->num_rows == 0) {
    header("Location: ../login-admin.php");
    exit();
} else {
    $row = $cek->fetch_assoc();
    $nama = $row['nama'];
}
?>

<?php include('header.php'); // Menyertakan header ?>
<style>
.halaman1 {
padding: 20px;
}
.isi-halaman {
    background-color: #EEEEEE;
    padding: 20px;
    border-radius: 10px;
}
.artikel {
    margin-bottom: 20px;
}
.artikel h3 {
    margin: 0;
    font-size: 30px;
}
</style>
<div class="halaman1">
    <div class="isi-halaman">
        <div class="isi">
            <div class="artikel">
                <h3>Selamat Datang <?php echo $nama; ?>.....</h3>
            </div>
        </div>
        <div class="hapus"></div>
    </div>

<?php include('footer.php'); // Menyertakan footer ?>
