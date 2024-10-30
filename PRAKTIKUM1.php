<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
?>


<?php
$data = ["Ardi", "Budi", "Ceryl", "Dandy", "Eka", "Fadhil"];
$keyword = "Budi"; // Ganti dengan kata yang ingin dicari

if (in_array($keyword, $data)) {
    echo "Ketemu";
} else {
    echo "Keyword tidak ditemukan";
}
?>
