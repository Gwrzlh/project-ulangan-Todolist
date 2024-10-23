<?php
include 'config.php';

// Create Product
if (isset($_POST['create'])) {
    $name = $_POST['kategori'];
 
    $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$name')";
    if (mysqli_query($conn, $sql)) {
        header('Location: kategori.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 
}

// Read Products
$sql = "SELECT * FROM kategori";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-secondary navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item color-light">
                <a class="nav-link  text-light" href="user.php">USER</a>
            </li>
            <li class="nav-item color-light">
                <a class="nav-link  text-light" href="akhir.php">LIST TASK</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container mt-5">
        <h2 class="mb-4">kategori list</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th n>ID</th>
                    <th>namakategori</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $product['id_kategori']; ?></td>
                        <td><?php echo $product['nama_kategori']; ?></td>
                        <td>
                            <a href="editkategori.php?id=<?php echo $product['id_kategori']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="deletekategori.php?id=<?php echo $product['id_kategori']; ?>" class="btn btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h2>Create Kategori</h2>
        <form method="POST" class="mb-5">
            <div class="mb-3">
                  <input type="text" name="kategori" class="form-control" placeholder="kategori" required>
                </div>
            <button type="submit" name="create" class="btn btn-primary">Create kategori</button>
        </form>
    </div>
</body>
</html>