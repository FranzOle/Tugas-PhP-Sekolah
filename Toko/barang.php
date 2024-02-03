<?php 
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "toko";

$koneksi = new mysqli($host, $user, $password, $db);

$id = 0;
$namabarang = "";
$harga = 0;
$stock = 0;
$koneksi = new mysqli($host, $user, $password, $db);

if(isset($_GET["ubah"])){
    $id = $_GET["ubah"];
    $sql = "SELECT * FROM barang WHERE id=" . $id;
    $hasil = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($hasil) > 0){
        $row = mysqli_fetch_array($hasil);
        $id = $row[0];
        $namabarang = $row[1];
        $harga = $row[2];
        $stock = $row[3];
    }

}
?>


<form action="" method="post">
    Barang:
    <input type="text" name="namabarang" placeholder="Nama Barang" value="<?php echo $namabarang ?>">
<br>
    Harga:
    <input type="number" name="harga" placeholder="Harga Barang" value="<?php echo $harga ?>">
<br>
    Stok:
    <input type="number" name="stock" placeholder="Stok Barang" value="<?php echo $stock ?>">
<br>
    <input type="submit" name="simpan" value="simpan">
    <input type="hidden" name="id" value="<?php echo $id ?>">
</form>


<?php 

//Barang
if(isset($_GET["hapus"])){
    $id = $_GET["hapus"];
    $sql = "DELETE FROM barang WHERE id =" . $id;
    $hasil = mysqli_query($koneksi, $sql);
    header("location:http://localhost/Tugas-php-sekolah/Toko/barang.php");
}

if (isset($_POST["simpan"])){
    $namabarang = $_POST["namabarang"];
    $harga =  $_POST["harga"];
    $stock = $_POST["stock"];

    if (isset($_POST["id"])) {
    $id = $_POST["id"];
    if($id == 0){
        $sql = "INSERT INTO barang (namabarang, harga, stock) VALUES ('$namabarang', $harga, $stock)";
        $hasil = mysqli_query($koneksi, $sql);
    } else {
        $sql = "UPDATE barang SET namabarang = '$namabarang', harga = $harga, stock = $stock WHERE id =" . $id;
        $hasil = mysqli_query($koneksi, $sql); 
        header("location:http://localhost/Tugas-php-sekolah/Toko/barang.php");
    }
}
}

$sql = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $sql);

echo "<table border=2px>
        <thead>
            <tr>
            <th>
            Id
            </th>
            <th>
               barang
            </th>
            <th>
                harga
            </th>
            <th>
                stok
            </th>
            <th>
                hapus
            </th>
            <th>
                ubah
            </th>
             </tr>
        </thead>
        <tbody>";
while ($row = mysqli_fetch_array($hasil)){
    echo "<tr>";
    echo "<td>" . $row[0] . "<br>" . "</td>";
    echo "<td>" . $row[1] . "<br>" . "</td>";
    echo "<td>" . $row[2] . "<br>" . "</td>";
    echo "<td>" . $row[3] . "<br>" . "</td>";
    echo "<td>" . "<a href='?hapus=". $row[0] ."'>Hapus</a>" . "</td>";
    echo "<td>" . "<a href='?ubah=". $row[0] ."'>Ubah</a>" . "</td>";
    echo "</tr>";
}
echo "</tbody> </table>";
?>
