<!-- Cari -->
<form class="" action="" method="POST">
                <div class="column">
                    <input type="search" class='form-control me-2' name="keyword" placeholder="Masukan Kata Kunci di Sini" aria-label="Search" autofocus></input>
                    <select type="text" name="param" class='form-control me-2'>
                        <option value="judul">Judul</option>
                        <option value="penulis">Penulis</option>
                        <option value="penerbit">Penerbit</option>
                        <option value="kategori">Kategori</option>
                        <option value="isbn">ISBN</option>
                    </select>
                </div>
                <button type="submit" class='btn btn-success me-2' name="cari">Cari</button>

            </form>
            <?php
            if (isset($keyword)) {
                echo "<p>Menampilkan hasil pencarian berdasarkan <b><i>$param</i></b> untuk kata kunci : <b><i>$keyword</i></b> </p>";
                // var_dump($keyword);
            }
            ?>



<?php
require 'functions.php';

$rows = query("SELECT * FROM buku");

if (isset($_POST['cari'])) {
    $param = $_POST['param'];
    $keyword = $_POST['keyword'];
    // var_dump($keyword);
    $rows = query("SELECT * FROM buku WHERE judul LIKE '%$keyword%'");
}
?>

functions.php 
<?php
$rows = query("SELECT * FROM buku");

if (isset($_POST['cari'])) {
    $param = $_POST['param'];
    $keyword = $_POST['keyword'];
    // var_dump($keyword);
    $rows = query("SELECT * FROM buku WHERE $param LIKE '%$keyword%'");
}
?>