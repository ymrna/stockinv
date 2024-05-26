<?php
include 'db.php';
include 'templates/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = isset($_POST['status_barang']) ? 1 : 0;

    $sql = "INSERT INTO barang (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang)
            VALUES ('$kode_barang', '$nama_barang', '$jumlah_barang', '$satuan_barang', '$harga_beli', '$status_barang')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Tambah Barang</h2>
<form method="POST" action="">
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
    </div>
    <div class="form-group">
        <label for="jumlah_barang">Jumlah</label>
        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
    </div>
    <div class="form-group">
        <label for="satuan_barang">Satuan</label>
        <select class="form-control" id="satuan_barang" name="satuan_barang">
            <option value="karton">karton</option>
            <option value="pcs">pcs</option>
            <option value="liter">liter</option>
            <option value="meter">meter</option>
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
        <input type="checkbox" class="form-check-input" id="status_barang" name="status_barang">
        <label class="form-check-label" for="status_barang">Available</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include 'templates/footer.php';
?>
