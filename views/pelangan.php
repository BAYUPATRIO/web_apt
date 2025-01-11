<?php 
// Menghubungkan ke database
include '../produk.php';
// Tangkap input pencarian
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
// Ambil data dari tabel "kontak"
$sql = "SELECT * FROM kontak ORDER BY waktu DESC"; // Urutkan berdasarkan waktu terbaru
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
        font-size: 14px;
        color: #555;
    }

    th {
        background-color: #007bff;
        color: #fff;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e0e0e0;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }
      /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

header .logo {
    font-size: 26px;
    font-weight: bold;
    color: #007BFF;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

header nav a {
    margin: 0 15px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

header nav a:hover {
    color: #007BFF;
}

header .btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

header .btn-primary {
    background-color: #007BFF;
    color: #fff;
}

header .btn-secondary {
    background-color: #f8f9fa;
    color: #007BFF;
    border: 2px solid #007BFF;
}

header .btn-secondary:hover {
    background-color: #007BFF;
    color: #fff;
}

/* Hero Section */
.hero {
    text-align: center;
    padding: 50px 20px;
    background-color: #333;
    color: #fff;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 15px;
}

.hero h2 span:first-child {
    color: gold;
    font-weight: bold;
    font-size: 36px;
}

.hero h2 span:last-child {
    color: #007BFF;
    font-weight: bold;
    font-size: 36px;
}

.hero p {
    font-size: 18px;
    margin: 10px 0 20px;
}

.hero .stars {
    font-size: 20px;
    color: gold;
    margin-bottom: 20px;
}

.hero .buttons .btn {
    margin: 5px;
    padding: 10px 20px;
    font-size: 16px;
}

/* Description Section */
.description {
    padding: 30px;
    text-align: center;
    background-color: #fff;
    margin-top: 20px;
}

.description h3 {
    font-size: 28px;
    color: #007BFF;
    margin-bottom: 15px;
}

.description p {
    margin-bottom: 15px;
    color: #555;
}

.description .devices img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
}

/* Footer */
footer {
    text-align: center;
    padding: 20px;
    background-color: #333;
    color: #fff;
    margin-top: 20px;
}

footer a {
    color: #007BFF;
    text-decoration: none;
    margin: 0 10px;
}

footer a:hover {
    text-decoration: underline;
}
.button {
  padding: 10px 20px;
  color: white;
  background-color: #007bff; /* Warna biru */
  border: none;
  border-radius: 5px; /* Sudut tombol melengkung */
  font-size: 16px; /* Ukuran teks */
  font-weight: bold;
  text-decoration: none;
  text-align: center;
  cursor: pointer;
  transition: all 0.3s ease; /* Efek animasi */
}

.button:hover {
  background-color: #0056b3; /* Warna saat hover */
  transform: scale(1.1); /* Efek memperbesar */
}

.button:active {
  background-color: #003d80; /* Warna saat diklik */
  transform: scale(0.95); /* Efek mengecil */
}
</style>

    
</head>
<body>
    <header>
        <table>
        <div class="logo">Apotek Dubai</div>
        <nav>
        </nav>
        <div>
        <a href="../logout.php" class="button">Logout</a>
        </div>
</table>
</header>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['pesan'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data pelanggan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="home.php">Kembali ke Dashboard</a>
</body>
</html>
