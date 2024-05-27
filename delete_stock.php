<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id_barang = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: list_stock.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
