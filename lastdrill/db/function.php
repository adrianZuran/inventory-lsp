<?php
include 'conn.php';
// kelolo inv

function addInv($nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO inventory (nama_barang, jenis_barang, stok_barang, barcode, harga, lokasi) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssiiis', $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi);
    $stmt->execute();
    return true;
}

function updateInv($nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi, $id_inv) {
    global $conn;
    $query = "UPDATE inventory SET nama_barang = ?, jenis_barang = ?, stok_barang = ?, barcode = ?, harga = ?, lokasi = ? WHERE id_inv = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiiisi", $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi, $id_inv);
    return $stmt->execute();
}

function deleteInv($id_inv) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM inventory WHERE id_inv = ?");
    $stmt->bind_param('i', $id_inv);
    $stmt->execute();
    return true;
}

function getInvById($id_inv) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE id_inv = ?");
    $stmt->bind_param('i', $id_inv);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getAllInv() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM inventory");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// kelola vendor 

function getAllVendor() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM vendor");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getVendorByName($nama_vendor) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM vendor WHERE nama_vendor = ?");
    $stmt->bind_param('s', $nama_vendor);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc(); 
}

function getVendorByBarangName($nama_barang) {
    global $conn;
    $stmt = $conn->prepare("SELECT nama_vendor FROM vendor WHERE nama_barang = ?");
    $stmt->bind_param('s', $nama_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// kelola gudang

function getAllGudang() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM gudang");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}