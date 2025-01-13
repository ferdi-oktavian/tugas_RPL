<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$allowed_types = ['jpg', 'jpeg', 'png', 'gif']; // Allowed file extensions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $url = $_POST['url']; // Get the URL input
    $image = $row['image']; // Default to current image

    if (!empty($_FILES['image']['name'])) {
        $image_name = basename($_FILES['image']['name']);
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        // Check if the file type is allowed
        if (in_array($image_extension, $allowed_types)) {
            // Define the destination path for saving the file
            $image_server_path = '../../img/' . $image_name;

            // Define the URL path that will be stored in the database
            $image_url_path = 'img/' . $image_name;

            // Move the uploaded file to the destination
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_server_path)) {
                echo "File successfully uploaded.";
                $image = $image_url_path; // Update the image path for database
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    }

    // Update the database with the new data (including URL)
    $sql = "UPDATE images SET name = '$name', image = '$image', url = '$url' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <h2>Edit Artikel</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Judul Artikel</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>" required>
            
            <label for="url">URL Artikel</label>
            <input type="text" id="url" name="url" value="<?= $row['url'] ?>" required>
            
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image">
            
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
