<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gambar</title>
</head>
<body>

<h1>Detail Gambar</h1>

<?php
// Memeriksa apakah parameter image ada dalam URL
include 'func/imageRetrieval.php';
if (isset($_GET['image'])) {
    // Mendapatkan nama file gambar dari query string
    $image = $_GET['image'];
    if(displayImage($image))
    {
    echo '<p>Anda sedang melihat gambar dengan nama: ' . htmlspecialchars($image) . '</p>';
    echo '<img src="' . htmlspecialchars($image) . '" alt="Detail Gambar">';

    // Menampilkan tombol Kembali
    echo '<p><button onclick="goBack()">Kembali</button></p>';
    }else{ echo '<p>Maaf, gambar tidak ditemukan.</p>';};
    // Menampilkan detail gambar
    
} else {
    // Jika parameter image tidak ada, tampilkan pesan kesalahan
    echo '<p>Maaf, gambar tidak ditemukan.</p>';
}
?>
<script>
    // Fungsi JavaScript untuk kembali ke halaman sebelumnya
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>
