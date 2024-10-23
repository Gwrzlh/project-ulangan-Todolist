<?php
include 'config.php';

$id = $_GET['id'];

// Delete Product
$sql = "DELETE FROM user WHERE id_user = $id";
if (mysqli_query($conn, $sql)) {
    header('Location: user.php');  
} else {
        // Jika gagal, cek apakah error karena foreign key constraint
        $error = mysqli_error($conn);
        if (strpos($error, 'foreign key constraint') !== false) {
            // Jika error karena foreign key, tampilkan pesan alert
            echo "<script>
                alert('Customer sudah digunakan di tabel lain dan tidak bisa dihapus!');
                window.location.href = 'user.php';
            </script>";
        } else {
            // Jika error lain, tampilkan pesan error default
            echo "Error deleting record: " . $error;
        }
}

?>