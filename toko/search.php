<?php
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query pencarian barang
$query = "SELECT * FROM barang WHERE nama LIKE '%$search%'";
$result = mysqli_query($conn, $query);

// Jika tidak ada hasil
if (mysqli_num_rows($result) == 0) {
    echo "<p class='text-center text-gray-500 col-span-3'>Barang tidak ditemukan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <img src="assets/'.$row['gambar'].'" alt="'.$row['nama'].'" class="w-32 h-32 mx-auto">
            <h2 class="text-lg font-bold mt-2">'.$row['nama'].'</h2>
            <p class="text-green-700">Rp '.number_format($row['harga'], 0, ',', '.').'</p>
            <p class="text-sm text-gray-600">Distributor: <strong>'.$row['distributor'].'</strong></p>
            <p class="text-sm text-gray-600">Kontak: <strong>'.$row['kontak'].'</strong></p>
        </div>';
    }
}
?>
