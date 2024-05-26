<?php
include 'db.php';

// Data pengguna baru
$username = 'admin';
$password = 'admin123';

// Enkripsi password menggunakan password_hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menambahkan pengguna ke database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Pengguna baru berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
