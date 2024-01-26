<form action="" method="post">
    Barang:
    <input type="text" name="namabarang" placeholder="Nama Barang" id="">
<br>
    Harga:
    <input type="number" name="harga" placeholder="Harga Barang" id="">
<br>
    Stok:
    <input type="number" name="stock" placeholder="Stok Barang">
<br>
    <input type="submit" name="simpan" value="simpan">
</form>


<?php 
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "toko";

$koneksi = new mysqli($host, $user, $password, $db);

//Barang
if (isset($_POST["simpan"])){
    $namabarang = $_POST["namabarang"];
    $harga =  $_POST["harga"];
    $stock = $_POST["stock"];
    $sql = "INSERT INTO barang (namabarang, harga, stock) VALUES ('$namabarang', $harga, $stock)";
    $hasil = mysqli_query($koneksi, $sql);
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
             </tr>
        </thead>
        <tbody>";
while ($row = mysqli_fetch_array($hasil)){
    echo "<tr>";
    echo "<td>" . $row[0] . "<br>" . "</td>";
    echo "<td>" . $row[1] . "<br>" . "</td>";
    echo "<td>" . $row[2] . "<br>" . "</td>";
    echo "<td>" . $row[3] . "<br>" . "</td>";
    echo "</tr>";
}
echo "</tbody> </table>";


?>
