<?php
include('db.php');
include('templates/header.php');

$sql = "SELECT * FROM barang";
$result = $conn->query($sql);
?>

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center">Daftar Barang</h2>
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari nama barang...">
            </div>
            <a href="add_stock.php" class="btn btn-primary mb-3">Tambah Stok</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id_barang']; ?></td>
                            <td><?php echo $row['kode_barang']; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo $row['jumlah_barang']; ?></td>
                            <td><?php echo $row['satuan_barang']; ?></td>
                            <td>RP <?php echo number_format($row['harga_beli'], 2, ',', '.'); ?></td>
                            <td><?php echo $row['status_barang'] ? 'Available' : 'Not Available'; ?></td>
                            <td>
                                <a href="edit_stock.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_stock.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                <a href="usage_stock.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-info btn-sm">Use</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

                <script>
    function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // Indeks 2 untuk kolom nama barang
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    document.getElementById("searchInput").addEventListener("keyup", search);
</script>
            </table>
        </div>
    </div>
</div>

<?php
include('templates/footer.php')?>