<?php 
// Menampilkan data petugas
$ambilPetugas = $conn->query("SELECT * FROM tb_user WHERE level = 'petugas' ORDER BY `id_user` DESC") or die(mysqli_error($conn));
?>


<h1 class="mt-4">Data Petugas</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Petugas</li>
</ol>
<div class="col-md-12">
    <a href="?p=anggota&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Petugas</a>
    <a href="./laporan/laporan_petugas_excel.php" target="_blank" class="btn btn-success mb-3"><i class="fa fa-file-excel"></i> Export to Excel</a>
    <a href="./laporan/laporan_petugas_pdf.php" target="_blank" class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Petugas
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($pecahPetugas = $ambilPetugas->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pecahPetugas['nama']; ?></td>
                        <td><?= $pecahPetugas['username']; ?></td>
                        <td><?= $pecahPetugas['level']; ?></td>
                        <td>
                            <a href="?p=anggota&aksi=hapus&id=<?= $pecahPetugas['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
