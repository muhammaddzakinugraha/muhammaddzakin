<?php
require './config/db.php';

// Mendapatkan ID produk dari parameter URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$product = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($product);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image']; 

    mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");


    header("Location: show.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background: #222;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .form-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #4caf50;
            margin-bottom: 20px;
        }

        label {
            color: #4a4a4a;
        }

        .btn {
            border-radius: 20px;
        }

        .btn-primary {
            background: #4caf50;
            border: none;
        }

        .btn-primary:hover {
            opacity: 0.8;
        }

        a {
            text-decoration: none;
            color: #4caf50;
        }

        a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Edit Produk</h1>
    <div class="form-container">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($row['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" id="price" name="price" class="form-control" value="<?= htmlspecialchars($row['price']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar URL</label>
                <input type="text" id="image" name="image" class="form-control" value="<?= htmlspecialchars($row['image']); ?>">
            </div>

            <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
        </form>
        <div class="mt-3 text-center">
            <a href="create.php">Kembali ke tambah Produk</a>
        </div>
    </div>
</body>
</html>

