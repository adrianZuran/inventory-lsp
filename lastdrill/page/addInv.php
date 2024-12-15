<?php 
include '../include/header.php';
include '../db/function.php';

$nama_barang = '';
$nama_vendor = '';
$id_gudang = '';

if (isset($_POST['addInv'])) {
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $stok_barang = $_POST['stok_barang'];
    $barcode = $_POST['barcode'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
        if (addInv($nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi) == true) {
            $data_berhasil = 'Data Berhasil di Tambahkan';
        }
}

$vendor = getAllVendor();
$gudang = getAllGudang();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5 card shadow p-5">
    <h1 class="text-center mb-4">Tambah Inventory</h1>
    <?php if (isset($data_berhasil)): ?>
        <div class="alert alert-success" role="alert">
            <?= $data_berhasil ?>
        </div>
    <?php endif; ?>

    <form action="http://localhost/lastdrill/page/addInv.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-select">
                <?php if (!empty($vendor)): ?>
                    <?php foreach ($vendor as $barang): ?>
                        <option value="<?= $barang['nama_barang'] ?>">
                            <?= $barang['nama_barang']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Pilih Barang terlebih dahulu</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="jenis_barang" class="form-label">Jenis Barang</label>
            <input type="text" name="jenis_barang" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="stok_barang" class="form-label">Stok Barang</label>
            <input type="text" name="stok_barang" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="barcode" class="form-label">Barcode</label>
            <input type="text" name="barcode" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="lokasi" class="form-label">Nama Gudang</label>
            <select name="lokasi" id="lokasi" class="form-select">
                <?php foreach ($gudang as $g): ?>
                    <option value="<?= $g['lokasi']?>">
                        <?= $g['lokasi']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

            <button type="submit" name="addInv" class="btn btn-primary col-12">Tambah</button>
        <a href="dashboard.php" class="btn btn-secondary">back to inventory</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../include/footer.php'; ?>
