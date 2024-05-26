<?php
include 'db.php';
include 'templates/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM barang WHERE id_barang = $id";
    $result = $conn->query($sql);
    $barang = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $jumlah_pakai = $_POST['jumlah_pakai'];

    $sql = "UPDATE barang SET jumlah_barang = jumlah_barang - $jumlah_pakai WHERE id_barang = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2 class="text-center">Gunakan Barang</h2>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
            <div class="form-group">
                <label for="jumlah_pakai">Jumlah yang Digunakan</label>
                <input type="number" class="form-control" id="jumlah_pakai" name="jumlah_pakai" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
include 'templates/footer.php';
?>
