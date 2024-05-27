<?php
include('templates/header.php');
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';

// Mendapatkan total id barang
$sql = "SELECT COUNT(id_barang) AS total_items FROM barang";
$result = $conn->query($sql);
$total_items = $result->fetch_assoc()['total_items'];

// Mendapatkan total harga barang
$sql = "SELECT SUM(harga_beli * jumlah_barang) AS total_value FROM barang";
$result = $conn->query($sql);
$total_value = $result->fetch_assoc()['total_value'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .container {
            margin-top: 20px;
        }
        .total-box {
            background-color: #6aa0f7;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .total-box p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h2>Dashboard</h2>
            <div class="total-box">
                <p style="font-size:20px">Total Barang: <?php echo $total_items; ?></p>
                <p style="font-size:20px">Total Rupiah: <?php echo number_format($total_value, 2); ?></p>
            </div>
        </main>
    </div>
</body>
</html>

<?php include ('templates/footer.php') ?>