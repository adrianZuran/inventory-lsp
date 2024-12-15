<?php 
include '../include/header.php';
include '../db/function.php';

$inventory = getAllInv();

if (isset($_GET['deleteInv'])) {
    $id_inv = $_GET['deleteInv'];
    deleteInv($id_inv);
    header('location: http://localhost/lastdrill/page/dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4 text-center">Tambah Inventory Woylaa</h1>
    <div class="col-3 bg-dark m-auto">
        <p class="bg-light text-center">Jumlah Data: <?= count($inventory); ?></p>
    </div>
    <div class="text-end mb-3">
        <a href="http://localhost/lastdrill/page/addInv.php" class="btn btn-primary">Tambah Inventory</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok Barang</th>
                <th>Harga</th>
                <th>Barcode</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($inventory as $inv): ?>
            <tr class="<?= $inv['stok_barang'] == 0 ? 'table-danger' : '' ?>">
                <td><?= $no++ ?></td>
                <td><?= $inv['nama_barang'] ?></td>
                <td><?= $inv['jenis_barang'] ?></td>
                <td><?= $inv['stok_barang'] ?></td>
                <td><?= $inv['harga'] ?></td>
                <td><?= $inv['barcode'] ?></td>
                <td><?= $inv['lokasi'] ?></td>
                <td>
                    <a href="dashboard.php?deleteInv=<?= $inv['id_inv'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="editInv.php?updateInv=<?= $inv['id_inv'] ?>" class="btn btn-warning btn-sm">Update</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../include/footer.php'; ?>
