<?php 
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "toko";

$koneksi = new mysqli($host, $user, $password, $db);

// Barang
$sql = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $sql);

echo "<table border=2px>
        <thead>
            <tr>
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
    echo "<td>" . $row[1] . "<br>" . "</td>";
    echo "<td>" . $row[2] . "<br>" . "</td>";
    echo "<td>" . $row[3] . "<br>" . "</td>";
    echo "</tr>";
}
echo "</tbody> </table>";

// Pelanggan
$sql = "SELECT * FROM pelanggan";
$hasil = mysqli_query($koneksi, $sql);

echo "<table border=2px>
        <thead>
            <tr>
            <th>
                nama
            </th>
            <th>
                telepon
            </th>
            <th>
                alamat
            </th>
             </tr>
        </thead>
        <tbody>";
while ($row = mysqli_fetch_array($hasil)){
    echo "<tr>";
    echo "<td>" . $row[1] . "<br>" . "</td>";
    echo "<td>" . $row[2] . "<br>" . "</td>";
    echo "<td>" . $row[3] . "<br>" . "</td>";
    echo "</tr>";
}
echo "</tbody> </table>";

?>
