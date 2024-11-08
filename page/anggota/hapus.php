<?php
// if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
//     // Ambil ID dari URL
//     $id = htmlspecialchars($_GET['id_user']);
    
//     // Pastikan ID tidak kosong
//     if (!empty($id)) {
//         // Query untuk menghapus petugas berdasarkan ID
//         $sql = $conn->query("DELETE FROM tb_user WHERE id_user = '$id'") or die(mysqli_error($conn));
        
//         if ($sql) {
//             echo "<script>alert('Petugas berhasil dihapus.');window.location='?p=anggota';</script>";
//         } else {
//             echo "<script>alert('Gagal menghapus petugas.');window.location='?p=anggota';</script>";
//         }
//     } else {
//         echo "<script>alert('ID tidak valid.');window.location='?p=anggota';</script>";
//     }
// }

// menangkap id_buku di url
$id_user = $_GET['id'];

$conn->query("DELETE FROM tb_user WHERE id_user = $id_user") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=anggota';</script>";
?>