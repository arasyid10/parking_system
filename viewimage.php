<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Halaman HTML dengan PHP</title>
    <style>
        /* Membuat grid dengan 4 kolom */
        .image-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 kolom dengan lebar yang sama */
            grid-gap: 10px; /* Jarak antar gambar */
        }

        /* Menentukan lebar dan tinggi tetap untuk semua gambar */
        img {
            width: 60%; /* Gambar mengisi seluruh lebar kolom */
            height: 150px; /* Gambar menyesuaikan tinggi sesuai rasio aspek */
            object-fit: fill; /* Memperluas gambar secara proporsional untuk mengisi area gambar */
        }
    </style>
</head>
<body>

<h1>Contoh Halaman HTML dengan PHP</h1>

<div class="image-grid">
    <?php
    include 'func/imageRetrieval.php';
    // Path ke direktori tempat gambar disimpan
    $imageDirectory = "images/";

    // Mendapatkan daftar file gambar dalam direktori
    $images = glob($imageDirectory . "*.jpg");

    // Menampilkan beberapa gambar secara acak dalam 4 kolom
    foreach ($images as $image) {
        // Mendapatkan nama file gambar tanpa ekstensi
        $imageName = pathinfo($image, PATHINFO_FILENAME);
        
        // Membuat tautan ke halaman detail gambar
        echo '<a href="detailimage.php?image=' . urlencode($image) . '">';
        echo '<img src="' . $image . '" alt="' . $imageName . '">';
        echo '</a>';
        
    }
    ?>
</div>

</body>
</html>
