<?php

// menangkap id_buku di url
$id_buku = $_GET['id'];

// menampilkan data db sesuai id_buku
$sql = $conn->query("SELECT * FROM tb_buku WHERE id_buku = $id_buku") or die(mysqli_error($conn));
$pecahSql = $sql->fetch_assoc();

$tahun = $pecahSql['tahun_terbit'];

?>

<h1 class="mt-4">Deskripsi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="halaman_petugas.php">Dashboard</a></li>\
    <li class="breadcrumb-item active">Deskripsi</li>
</ol>
<div class="card-header mb-5">

<form action="" method="post">
    <!-- Judul Buku -->
    <div class="form-group mb-4">
        <h4 class="mb-1" for="judul_buku">Judul Buku:</h4>
        <h3 class="mt-2"><?= $pecahSql['judul_buku']; ?></h3>
    </div>

    <!-- Foto Sampul Buku -->
    <div class="mb-4">
        <?php if (!empty($pecahSql['foto'])): ?>
            <img src="img/<?= $pecahSql['foto']; ?>" alt="Sampul Buku" width="150" class="img-fluid">
        <?php else: ?>
            <span>Tidak ada gambar</span>
        <?php endif; ?>
    </div>

    <!-- Deskripsi Buku -->
    <div class="form-group mb-4">
        <h4 class="mb-1" for="isbn">Deskripsi Buku:</h4>
        <p class="mt-2"><?= $pecahSql['isbn']; ?></p>
    </div>
</form>

</div>