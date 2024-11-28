<?php

require './../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $confirm = isset($_POST['confirm']) ? trim($_POST['confirm']) : null;

    // Validasi input kosong
    if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
        echo "Harap isi semua kolom.";
        die;
    }

    // Validasi password konfirmasi
    if ($password !== $confirm) {
        echo "Password tidak sesuai dengan konfirmasi password.";
        die;
    }

    // Cek apakah email sudah digunakan
    $stmt = $db_connect->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email sudah digunakan.";
        die;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $created_at = date('Y-m-d H:i:s');

    // Simpan data pengguna
    $stmt = $db_connect->prepare("INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashedPassword, $created_at);

    if ($stmt->execute()) {
        echo "Registrasi berhasil.";
    } else {
        echo "Terjadi kesalahan saat registrasi.";
    }

    $stmt->close();
} else {
    echo "Metode pengiriman tidak valid.";
    die;
}
?>
