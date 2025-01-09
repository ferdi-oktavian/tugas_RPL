<?php
include '../../koneksi/koneksi.php'; // Koneksi ke database

// Periksa apakah ID dikirim melalui parameter
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengamankan ID
    $sql = "SELECT * FROM konsultasi WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "<script>
            alert('Data tidak ditemukan!');
            window.location.href = 'index.php';
        </script>";
        exit;
    }
    $stmt->close();
} else {
    echo "<script>
        alert('ID tidak ditemukan!');
        window.location.href = 'index.php';
    </script>";
    exit;
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $complaint = $_POST['complaint'];
    $specialist = $_POST['specialist'];
    $doctor = $_POST['doctor'];
    $visit_date = $_POST['visit_date'];

    $sql = "UPDATE konsultasi SET name = ?, email = ?, gender = ?, phone = ?, address = ?, complaint = ?, specialist = ?, doctor = ?, visit_date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $name, $email, $gender, $phone, $address, $complaint, $specialist, $doctor, $visit_date, $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui data: {$stmt->error}');
            window.location.href = 'index.php';
        </script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Konsultasi</title>
    <style>
        /* CSS untuk memperindah halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .content {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Edit Data Konsultasi</h2>
        <form action="" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>

            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" required>
                <option value="pria" <?php echo $data['gender'] == 'pria' ? 'selected' : ''; ?>>Pria</option>
                <option value="wanita" <?php echo $data['gender'] == 'wanita' ? 'selected' : ''; ?>>Wanita</option>
            </select>

            <label for="phone">Nomor Kontak:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($data['phone']); ?>" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" required><?php echo htmlspecialchars($data['address']); ?></textarea>

            <label for="complaint">Keluhan:</label>
            <textarea id="complaint" name="complaint" required><?php echo htmlspecialchars($data['complaint']); ?></textarea>

            <label for="specialist">Spesialis:</label>
            <select id="specialist" name="specialist" required>
                <option value="internal" <?php echo $data['specialist'] == 'internal' ? 'selected' : ''; ?>>Chemical peeling</option>
                <option value="cardiology" <?php echo $data['specialist'] == 'cardiology' ? 'selected' : ''; ?>>Laser resurfacing therapy</option>
                <option value="neurology" <?php echo $data['specialist'] == 'neurology' ? 'selected' : ''; ?>>Dermabrasi</option>
                <option value="pediatrics" <?php echo $data['specialist'] == 'pediatrics' ? 'selected' : ''; ?>>Suntik botox</option>
                <option value="dermatology" <?php echo $data['specialist'] == 'dermatology' ? 'selected' : ''; ?>>Dermal filler</option>
            </select>

            <label for="doctor">Dokter:</label>
            <select id="doctor" name="doctor" required>
                <option value="dr1" <?php echo $data['doctor'] == 'dr1' ? 'selected' : ''; ?>>Dr. Willy, Sp.KK</option>
                <option value="dr2" <?php echo $data['doctor'] == 'dr2' ? 'selected' : ''; ?>>Dr. Richard Le, Sp.KK</option>
                <option value="dr3" <?php echo $data['doctor'] == 'dr3' ? 'selected' : ''; ?>>Dr. Nur Putri Nuzul Iryani Sp.D.V.E</option>
                <option value="dr4" <?php echo $data['doctor'] == 'dr4' ? 'selected' : ''; ?>>Dr. Siska, Sp.KK</option>
            </select>

            <label for="visit_date">Tanggal Pengunjungan:</label>
            <input type="date" id="visit_date" name="visit_date" value="<?php echo htmlspecialchars($data['visit_date']); ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
