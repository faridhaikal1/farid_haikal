<?php
include 'config.php';

$pelanggan_id = $_POST["pelanggan_id"];
$tanggal_transaksi = $_POST["tanggal_transaksi"];
$produk = $_POST["produk"];
$jumlah = $_POST["jumlah"];
$total = $_POST["total"];

$sql = "INSERT INTO penjualan (PelangganID, TanggalTransaksi) VALUES ('$pelanggan_id', '$tanggal_transaksi')";
if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn); 
    
    for ($i = 0; $i < count($produk); $i++) {
        $produk_id = $produk[$i];
        $jumlah_barang = $jumlah[$i];
        $total_harga = $total[$i];
        
        $sql_detail = "INSERT INTO detailpenjualan (PenjualanID, ProdukID, Jumlah, TotalHarga) VALUES ('$PenjualanID', '$produk_id', '$jumlah_barang', '$total_harga')";
        mysqli_query($conn, $sql_detail);
    }
    
    echo "Data penjualan telah berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
