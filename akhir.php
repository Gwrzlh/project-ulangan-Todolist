<?php
include 'config.php';

$sql = "SELECT task.id_task, user.username AS nama, kategori.nama_kategori AS kategori, task.title, task.deskripsi,  task.status, task.tanggal
FROM 
    task
INNER JOIN 
    user ON task.user_id = user.id_user
INNER JOIN 
    kategori ON task.kategori_id = kategori.id_kategori";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-secondary navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="kategori.php">KATEGORI</a>
            </li>
            <li class="nav-item color-light">
                <a class="nav-link  text-light" href="user.php">USER</a>
            </li>
        </ul>
    </div>
</nav>
    
    <div class="container mt-5">
        <h2 class="mb-4">List task</h2>
       <a href="task.php" class="btn btn-secondary">Create Task</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th n>ID task</th>
                    <th>Username</th>
                    <th>kategori</th>
                    <th>title</th>
                    <th>Deskripsi</th>
                    <th>status</th>
                    <th>update</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $product['id_task']; ?></td>
                        <td><?php echo $product['nama']; ?></td>
                        <td><?php echo $product['kategori']; ?></td>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['deskripsi']; ?></td>
                        <td><?php echo $product['status']; ?></td>
                        <td>
                            <a href="editTask.php?id=<?php echo $product['id_task']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="deletTask.php?id=<?php echo $product['id_task']; ?>" class="btn btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
 
</body>
</html>