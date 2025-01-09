<?php
// delete.php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM isipaket WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>