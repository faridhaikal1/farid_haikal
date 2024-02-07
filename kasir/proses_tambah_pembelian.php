<?php
include 'config.php';

if (isset($_POST['pelanggan_id'], $_POST['tanggal_transaksi'], $_POST['produk'], $_POST['jumlah'], $_POST['harga'], $_POST['total'])) {
    $pelanggan_id = $_POST['pelanggan_id'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];

    $total_harga = array_sum($total);
    
    $sql = "INSERT INTO penjualan (PelangganID, TanggalPenjualan, TotalHarga) VALUES ('$pelanggan_id', '$tanggal_transaksi', '$total_harga')";

    if (mysqli_query($conn, $sql)) {
        $penjualan_id = mysqli_insert_id($conn); // Pindahkan ke sini
        
        $sql_detail = "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql_detail);
        mysqli_stmt_bind_param($stmt, "iiid", $penjualan_id, $produk_id, $jumlah_produk, $subtotal);
        
        foreach ($produk as $key => $produk_id) {
            $produk_id = (int)$produk_id; // Konversi ke int
            $jumlah_produk = $jumlah[$key];
            $subtotal = $total[$key];
            mysqli_stmt_execute($stmt);
        }
        
        mysqli_stmt_close($stmt);
        
        echo "Data pembelian berhasil ditambahkan.";
        
        header("Location: detail_penjualan.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
