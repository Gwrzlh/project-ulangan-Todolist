<?php
include 'config.php';

$id = $_GET['id'];

// Fetch Product
$sql = "SELECT * FROM kategori WHERE id_kategori = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// Update Product
if(isset($_POST['update'])){
        $name = $_POST['kategori'];

    $sql = "UPDATE kategori SET nama_kategori = '$name' WHERE id_kategori = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: kategori.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2>Cedit kategori</h2>
        <form method="POST" class="mb-5">
            <div class="mb-3">
                  <input type="text" name="kategori" class="form-control" placeholder="kategori" required>
                </div>
            <button type="submit" name="update" class="btn btn-primary">update kategori</button>
        </form>
    </div>
</body>
</html>