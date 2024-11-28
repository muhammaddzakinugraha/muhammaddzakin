<?php

require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    $name = mysqli_real_escape_string($db_connect, $_POST['name']);
    $price = mysqli_real_escape_string($db_connect, $_POST['price']);
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $imageName = pathinfo($image, PATHINFO_FILENAME); 
    $imageExt = pathinfo($image, PATHINFO_EXTENSION); 
    $randomFilename = time() . '-' . md5(rand()) . '.' . $imageExt;


    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
    $uploadPath = $uploadDir . $randomFilename;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $upload = move_uploaded_file($tempImage, $uploadPath);

    if ($upload) {
        $query = "INSERT INTO products (name, price, image) 
                  VALUES ('$name', '$price', '/upload/$randomFilename')";
        $result = mysqli_query($db_connect, $query);

        if ($result) {
            echo "Berhasil upload";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($db_connect);
        }
    } else {
        echo "Gagal upload file.";
    }
} else {
    echo "Form tidak valid.";
}