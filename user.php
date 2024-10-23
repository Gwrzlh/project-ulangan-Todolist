<?php
include 'config.php';

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['password'];
    $price = $_POST['email'];
    $stock = $_POST['NoHp'];

    $sql = "INSERT INTO user (username,password,email,noHp) VALUES ('$name', '$description', '$price', '$stock')";
    if (mysqli_query($conn, $sql)) {
        header('Location: user.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 
}

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-secondary navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item color-light">
                <a class="nav-link  text-light" href="kategori.php">KATEGORI</a>
            </li>
            <li class="nav-item color-light">
                <a class="nav-link  text-light" href="akhir.php">LIST TASK</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container mt-5">
        <h2 class="mb-4">user List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th n>ID</th>
                    <th>Username</th>
                    <th>password</th>
                    <th>email</th>
                    <th>NOhp</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $product['id_user']; ?></td>
                        <td><?php echo $product['username']; ?></td>
                        <td><?php echo $product['password']; ?></td>
                        <td><?php echo $product['email']; ?></td>
                        <td><?php echo $product['noHp']; ?></td>
                        <td>
                            <a href="edituser.php?id=<?php echo $product['id_user']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="deleteuser.php?id=<?php echo $product['id_user']; ?>" class="btn btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h2>Add user</h2>
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
            <button type="submit" name="create" class="btn btn-primary">Create username</button>
        </form>
    
    </div>
</body>
</html>