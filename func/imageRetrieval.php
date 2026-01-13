<?php
// Fungsi untuk memeriksa dan mengamankan path file
const basepath = __DIR__;
function secureFilePath($userid,$filePath,$pdo) {
    if (!is_string($filePath)) {
        return false;
    }
    $normalizedPath=absPath($filePath);
    if (!$normalizedPath) {
        return false; 
    }
    if (findPath($filePath) !== 0) {
        return false; 
    }
    if (!userHasPermission_($userid,!$normalizedPath,$pdo) )
    { 
        return false; 
    }
    if (pathExist($normalizedPath)) {
        return true;
    } else {
        return false;
    }
}
function absPath($path)
{
    $normalizedPath = trim(realpath($path), DIRECTORY_SEPARATOR) ;
    return $normalizedPath;
}
function findPath($path)
{
    $path='C:\xampp\htdocs\index.php';
    //return strpos(realPath($path), 'x');
    return strpos(realPath($path), basepath);
}
function userHasPermission($id,$path)
{
    if($id==1)
    {
        return true;
    }else{return false;}
    
}
function pathExist($path)
{
    if (file_exists($path) && is_readable($path)) {
        return true;
    } else {
        return false;
    }
}
function userHasPermission_($id, $path,$pdo)
{
    // Prepare and execute the SQL query to get the user's role
    $stmt = $pdo->prepare("
        SELECT roles.role_name, permissions.path 
        FROM users 
        JOIN roles ON users.role_id = roles.id 
        JOIN permissions ON roles.id = permissions.role_id 
        WHERE users.username = :username AND permissions.path = :path
    ");
    $stmt->execute(['username' => $id, 'path' => $path]);
    
    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if the result is not empty
    if ($result) {
        return true;
    } else {
        return false;
    }
}
//Contoh penggunaan
/*
$userInput = "..\..\PortSwigger.txt";; // Anggap ini adalah input dari pengguna, misalnya dari parameter URL
$securePath = secureFilePath(1, $userInput);
if ($securePath) {
    echo "Path file aman: $securePath";
} else {
    echo "Path file tidak valid atau tidak bisa diakses.";
}*/


// Pada contoh ini, kita memiliki sebuah situs web yang menampilkan file-file gambar
// dengan menggunakan parameter "id" untuk menentukan file gambar yang akan ditampilkan.
// Fungsi untuk mendapatkan path file gambar berdasarkan ID
/*function getImagePath($id) {
    // Prediksi bahwa file gambar disimpan dalam direktori "images" dengan nama file sesuai dengan ID
    return "images/image_$id.jpg";
}*/

// Fungsi untuk menampilkan file gambar
function displayImage($id) {
    $result = false;
    if (file_exists($id)) {
       $result=true;
    } else {
        $result =false;
    }
    return $result;
}


//================IDOR==========

// Pada contoh ini, aplikasi web memiliki fitur untuk menampilkan file gambar berdasarkan nama file yang diberikan dalam parameter "filename" pada URL.

// Mendapatkan nama file gambar dari parameter URL (contoh: example.com/view-image.php?filename=image1.jpg)
//$filename = $_GET['filename'];

// Menyusun path lengkap ke file gambar
/*function getFile($filename)
{
    $imagePath = "uploads/$filename"; // Seharusnya ini adalah direktori tempat menyimpan file gambar

    // Menampilkan file gambar jika ada
    if (file_exists($imagePath)) {
        // Menampilkan file gambar
        echo "<img src='$imagePath' alt='Gambar'>";
    } else {
        // Menampilkan pesan error jika file gambar tidak ditemukan
        echo "File gambar tidak ditemukan.";
    }
}*/





