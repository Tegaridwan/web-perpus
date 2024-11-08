<?php
session_start();
require_once 'config/koneksi.php';

// Cek apakah data diterima dari AJAX
if (isset($_POST['id_buku'], $_POST['nim'], $_POST['nama'], $_POST['tgl_pinjam'], $_POST['tgl_kembali'])) {
    $id_buku = $_POST['id_buku'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    // Cek apakah stok buku masih tersedia
    $sql = $conn->query("SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
    $buku = $sql->fetch_assoc();

    if ($buku && $buku['jumlah_buku'] > 0) {
        // Tambahkan transaksi peminjaman
        $conn->query("INSERT INTO tb_transaksi (id_buku, nim, nama, tgl_pinjam, tgl_kembali, status) VALUES ('$id_buku', '$nim', '$nama', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") or die(mysqli_error($conn));

        // Kurangi stok buku
        $conn->query("UPDATE tb_buku SET jumlah_buku = jumlah_buku - 1 WHERE id_buku = '$id_buku'") or die(mysqli_error($conn));

        echo 'Buku berhasil dipinjam';
    } else {
        echo 'Stok buku habis, transaksi tidak dapat dilakukan';
    }
}
?>
