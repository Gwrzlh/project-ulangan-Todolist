<?php
include 'config.php';

$id = $_GET['id'];

// Fetch Product
$sql = "SELECT * FROM task WHERE id_user = $id";
$result = mysqli_query($conn, $sql);
//$product = mysqli_fetch_assoc($result);

// Update Product
if(isset($_POST['update'])){
 $deskripsi = $_POST['deskripsi'];
$status = $_POST['keterangan'];

    $sql = "UPDATE task SET deskripsi = '$deskripsi', status = '$status'  WHERE id_task = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: akhir.php");
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
    <title>Update task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
<div class="container mt-5">
    <h2>Update tugasmuu</h2>
        <form method="POST" class="mb-5">
            <div class="mb-3">
                <input type="text"  name="deskripsi" class="form-control" placeholder="deskripsi" >
            </div>
            <div class="mb-3">
            <div class="form-group mb-3">
             <label for="keterangan" class="form-label">Keterangan</label>
                    <select class="form-control" name="keterangan" id="keterangan" required>
                           <option value="selesai">selesai</option>
                           <option value="belum">belum</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    
    </div>
</body>
</html>