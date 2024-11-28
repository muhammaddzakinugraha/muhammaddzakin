<?php

require './../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Menggunakan prepared statements untuk mencegah SQL Injection
        $stmt = $db_connect->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            
            // Verifikasi password
            if (password_verify($password, $data['password'])) {
                echo "Selamat datang, " . htmlspecialchars($data['name']);
                die;
            } else {
                echo "Password salah.";
                die;
            }
        } else {
            echo "Email atau password salah.";
            die;
        }
    } else {
        echo "Harap isi semua kolom.";
        die;
    }
} else {
    echo "Metode pengiriman tidak valid.";
    die;
}

?>
