<?php

$barang = [
    ["id" => "1", "nama" => "Buku", "kategori" => "alat tulis", "harga" => "20000"],
    ["id" => "2", "nama" => "Pulpen", "kategori" => "alat tulis", "harga" => "5000"],
];

// membuat data di array
if (isset($_POST['create'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Validate input (optional but recommended)
    if (empty($id) || empty($nama) || empty($kategori) || empty($harga)) {
        echo "<p>Please fill in all required fields.</p>";
    } else {
        // menambah file dalam arrray
        $barang[] = ['id' => $id, 'nama' => $nama, 'kategori' => $kategori, 'harga' => $harga];
    }
}

// mengedit data pada array
function mengeditdata(&$buku, $id, $judul, $penulis) {
    if (isset($buku[$id])) {
        $buku[$id]["Judul"] = $judul;
        $buku[$id]["Penulis"] = $penulis;
    }
}

// menghapus
if (isset($_POST['delete'])) {
    $index = $_POST['delete'];
    unset($barang[$index]); // menghapus data dalam array
    $barang = array_values($barang);
}

// mengedit data
if (isset($_POST['edit'])) {
    $index = $_POST['edit'];
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Validate input (optional but recommended)
    if (empty($id) || empty($nama) || empty($kategori) || empty($harga)) {
        echo "<p>Please fill in all required fields.</p>";
    } else {
        $barang[$index] = ['id' => $id, 'nama' => $nama, 'kategori' => $kategori, 'harga' => $harga];
    }
}

?>

<form action="" method="POST">
    <label for="id">ID Barang:</label>
    <input type="text" id="id" name="id" required><br>

    <label for="nama">Nama Barang:</label>
    <input type="text" id="nama" name="nama" required><br>

    <label for="kategori">Kategori Barang:</label>
    <input type="text" id="kategori" name="kategori" required><br>

    <label for="harga">Harga Barang:</label>
    <input type="number" id="harga" name="harga" required><br>

    <input type="submit" name="create" value="Tambah Barang">
</form>

<?php

echo "<table border='1'>";
echo "<tr><th>ID Barang</th><th>Nama Barang</th><th>Kategori</th><th>Harga</th><th>Aksi</th></tr>";

foreach ($barang as $index => $b) {
    echo "<tr>";
    echo "<td>{$b['id']}</td>";
    echo "<td>{$b['nama']}</td>";
    echo "<td>{$b['kategori']}</td>";
    echo "<td>{$b['harga']}</td>";
    echo "<td>";
    echo "<form action='' method='POST' style='display:inline-block;'>";
    echo "<input type='hidden' name='delete' value='{$index}'>";
    echo "<input type='submit' value='Hapus'>";
    echo "</form>";
    echo "<form action='' method='POST' style='display:inline-block;'>";
    echo "<input type='hidden' name='edit' value='{$index}'>";
    echo "<input type='submit' value='Edit'>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

?>