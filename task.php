<?php
include 'config.php';

// Ambil daftar customer dan product
$user_sql = "SELECT * FROM user ";
$user_result = mysqli_query($conn, $user_sql);

$kategori_sql = "SELECT * FROM kategori";
$kategori_result = mysqli_query($conn, $kategori_sql);


if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $kategori = $_POST['kategori'];
    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['keterangan'];

    $task_sql = "INSERT INTO task(user_id,kategori_id,title,deskripsi,status)
    VALUES ('$user','$kategori','$title','$deskripsi','$status')";
    $task_result =mysqli_query($conn,$task_sql);
    header("Location: akhir.php");
}

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <li class="nav-item color-light">
                <a class="nav-link  text-light" href="akhir.php">LIST TASK</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">

    <div class="row">
        <div class="col text-center">
            <h1 class="display-4 mb-4">Create task</h1>
            <p class="lead">atur tugasmu disinii</p>
        </div>
    </div>

    <!-- Customers & Products List Section -->
    <div class="row mt-5">
        <div class="col-md-6">
            <h3>User List</h3>
            <ul class="list-group">
                <?php while ($customer = mysqli_fetch_assoc($user_result)): ?>
                    <li class="list-group-item"><?php echo $customer['username']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <h3>Kategori List</h3>
            <ul class="list-group">
                <?php while ($product = mysqli_fetch_assoc($kategori_result)): ?>
                    <li class="list-group-item"><?php echo $product['nama_kategori']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
</div>


    <!-- Create Transaction Form Section -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Create New Task</h3>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">User</label>
                            <select class="form-control" name="username" id="username" required>
                                <?php
                                $user_result = mysqli_query($conn, $user_sql);
                                while ($user = mysqli_fetch_assoc($user_result)): ?>
                                    <option value="<?php echo $user['id_user']; ?>"><?php echo $user['username']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori" class="form-label">katergori</label>
                            <select class="form-control" name="kategori" id="kategori" required>
                                <?php
                                $kategori_result = mysqli_query($conn, $kategori_sql);
                                while ($kategori = mysqli_fetch_assoc($kategori_result)): ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['nama_kategori']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control" name="title" placeholder="title" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="deskripsi">deskripsi</label>
                            <textarea name="deskripsi" class="form-control" placeholder="deskripsi" required></textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <select class="form-control" name="keterangan" id="keterangan" required>
                               <option value="selesai">selesai</option>
                               <option value="belum">belum</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Create task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
