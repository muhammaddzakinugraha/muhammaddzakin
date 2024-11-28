<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background: #222;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50;
        }

        .table-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table {
            color: #4a4a4a;
        }

        .btn {
            border-radius: 20px;
        }

        .btn-edit {
            background: #007bff;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }

        a {
            text-decoration: none;
        }

        .download-link {
            color: #4caf50;
        }
    </style>
</head>
<body>
    <h1>Data Produk</h1>
    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar Produk</th>
                    <th>Opsi</th>
                </tr>
                <a href="create.php">Tambah produk lagi</a>
            </thead>
            <tbody>
                <?php
                require './config/db.php';

                $products = mysqli_query($db_connect, "SELECT * FROM products");
                $no = 1;

                while ($row = mysqli_fetch_assoc($products)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                        <td><a class="download-link" href="<?= htmlspecialchars($row['image']); ?>" target="_blank">Unduh</a></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
