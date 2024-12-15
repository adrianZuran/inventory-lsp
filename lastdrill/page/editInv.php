<?php 
include '../include/header.php';
include '../db/function.php';

if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $stok_barang = $_POST['stok_barang'];
    $barcode = $_POST['barcode'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $id_inv = $_POST['id_inv'];

    updateInv($nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi, $id_inv);
    header('location: http://localhost/lastdrill/page/dashboard.php');
    exit();
}

if (isset($_GET['updateInv'])) {
    $id_inv = $_GET['updateInv'];
    $inv = getInvById($id_inv);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5 card shadow p-5">
    <h1 class="text-center mb-4">Update Data Inventory</h1>
    <form action="editInv.php" method="post" class="row g-3">
        <input type="hidden" name="id_inv" value="<?= $inv['id_inv'] ?>">
        <div class="col-md-6">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" value="<?= $inv['nama_barang']?>" class="form-control" readonly>
        </div>
        <div class="col-md-6">
            <label for="jenis_barang" class="form-label">Jenis Barang</label>
            <input type="text" name="jenis_barang" value="<?= $inv['jenis_barang'] ?>" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="stok_barang" class="form-label">Stok Barang</label>
            <input type="text" name="stok_barang" value="<?= $inv['stok_barang'] ?>" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="barcode" class="form-label">Barcode</label>
            <input type="text" name="barcode" value="<?= $inv['barcode'] ?>" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" value="<?= $inv['harga'] ?>" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="nama_gudang" class="form-label">Nama Gudang</label>
            <input type="text" value="<?= $inv['lokasi'] ?>" name="lokasi" class="form-control" readonly>
        </div>

            <button type="submit" name="update" class="btn btn-primary">Ubah</button>
            <a href="dashboard.php" class="btn btn-secondary">back to inventory</a>

    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../include/footer.php'; ?>
