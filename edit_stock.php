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
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = isset($_POST['status_barang']) ? 1 : 0;

    $sql = "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', jumlah_barang='$jumlah_barang', satuan_barang='$satuan_barang', harga_beli='$harga_beli', status_barang='$status_barang' WHERE id_barang=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Edit Barang</h2>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $barang['kode_barang']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required>
    </div>
    <div class="form-group">
        <label for="jumlah_barang">Jumlah</label>
        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $barang['jumlah_barang']; ?>" required>
    </div>
    <div class="form-group">
        <label for="satuan_barang">Satuan</label>
        <select class="form-control" id="satuan_barang" name="satuan_barang">
            <option value="karton" <?php if ($barang['satuan_barang'] == 'karton') echo 'selected'; ?>>karton</option>
            <option value="pcs" <?php if ($barang['satuan_barang'] == 'pcs') echo 'selected'; ?>>pcs</option>
            <option value="liter" <?php if ($barang['satuan_barang'] == 'liter') echo 'selected'; ?>>liter</option>
            <option value="meter" <?php if ($barang['satuan_barang'] == 'meter') echo 'selected'; ?>>meter</option>
        </select>
    </div>
    <div class="form-group">
    <label for="harga_beli">Harga Beli</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">RP</span>
        </div>
        <input type="number" class="form-control" id="harga_beli" step=100 name="harga_beli"  required>
    </div>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="status_barang" name="status_barang" <?php if ($barang['status_barang']) echo 'checked'; ?>>
        <label class="form-check-label" for="status_barang">Available</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php
include 'templates/footer.php';
?>
