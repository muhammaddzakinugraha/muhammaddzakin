<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
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

        #preview {
            margin-top: 10px;
            width: 100%;
            max-width: 150px;
            height: auto;
            display: none;
        }

        #file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #4caf50;
        }
    </style>
</head>
<body>
    <h1>Tambah Produk</h1>
    <div class="form-container">
        <form action="./backend/create.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Input nama produk" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga Produk</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Input harga produk" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <input type="file" id="image" name="image" class="form-control" required onchange="previewImage()">
                <img id="preview" src="" alt="Image Preview" />
                <div id="file-name"></div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
        <div class="mt-3 text-center">
            <a href="show.php">Lihat data produk</a>
        </div>
        <div class="mt-3 text-center">
            <a href="index.php">Logout</a>
        </div>
    </div>

    <script>
        function previewImage() {
            const fileInput = document.getElementById("image");
            const preview = document.getElementById("preview");
            const fileName = document.getElementById("file-name");

            // Jika ada file yang dipilih
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                // Tampilkan gambar pratinjau
                reader.onload = function(e) {
                    preview.style.display = "block";
                    preview.src = e.target.result;
                }

                // Tampilkan nama file yang dipilih
                fileName.textContent = "File yang dipilih: " + fileInput.files[0].name;

                // Baca file gambar yang dipilih
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</body>
</html>
