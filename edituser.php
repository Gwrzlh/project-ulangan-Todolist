<?php
include 'config.php';

$id = $_GET['id'];

// Fetch Product
$sql = "SELECT * FROM user WHERE id_user = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// Update Product
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $description = $_POST['password'];
    $price = $_POST['email'];
    $stock = $_POST['NoHp'];

    $sql = "UPDATE user SET username = '$name', password = '$description', email = '$price', noHp = '$stock' WHERE id_user = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: user.php");
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
        <h2>Create Product</h2>
        <form method="POST" class="mb-5">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                  <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="email"  name="email" class="form-control" placeholder="email" required>
            </div>
            <div class="mb-3">
                <input type="number" name="NoHp" class="form-control" placeholder="NomberHP" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Create username</button>
        </form>
    
    </div>
</body>
</html>