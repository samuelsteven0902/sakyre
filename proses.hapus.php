<?php
// hapus katefori
include 'functions.php';
if(isset($_GET['idk'])){
    $delete = mysqli_query($conn, "DELETE FROM db_category WHERE category_id ='".$_GET['idk']."' ");
    echo '<script>window.location="../sakyre2.0/kategori.php"</script>';
}

// hapus produk
if(isset($_GET['idp'])){
    $produk = mysqli_query($conn, "SELECT product_image FROM db_product WHERE product_id = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($produk);

    unlink ('../sakyre2.0/img/cover-book/'.$p->product_image);
    
    $delete = mysqli_query($conn, "DELETE FROM db_product WHERE product_id ='".$_GET['idp']."' ");
    echo '<script>window.location="../sakyre2.0/buku.php"</script>';

}
// hapus wishlist
if(isset($_GET['idw'])){
    $wishlist = mysqli_query($conn,"SELECT * FROM db_wishlist WHERE wishlist_id = '".$_GET['idw']."'");
    $w = mysqli_fetch_object($wishlist);

    $deletewishlist = mysqli_query($conn, "DELETE FROM db_wishlist WHERE wishlist_id ='".$_GET['idw']."' ");
    
    
        echo '<script>window.location="../sakyre2.0/wishlist.php"</script>';
        

}
if(isset($_GET['idt'])){
    $wishlist = mysqli_query($conn,"SELECT * FROM db_transaction WHERE tr_id = '".$_GET['idt']."'");
    $w = mysqli_fetch_object($wishlist);

    $deletewishlist = mysqli_query($conn, "DELETE FROM db_transaction WHERE tr_id ='".$_GET['idt']."' ");
    
    
        echo '<script>window.location="../sakyre2.0/wishlist.php"</script>';
        

}