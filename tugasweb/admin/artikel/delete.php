<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM images WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
