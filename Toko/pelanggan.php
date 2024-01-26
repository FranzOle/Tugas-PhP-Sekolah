<form action="" method="post">
    Nama:
    <input type="text" name="namapelanggan" placeholder="Nama Pelanggan">
<br>
    Telepon:
    <input type="number" name="telepon" placeholder="Telepon Pelanggan">
<br>
    Alamat:
    <input type="text" name="alamat" placeholder="Alamat Pelanggan">
<br>
    <input type="submit" name="simpan" value="simpan">
</form>

<?php 
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "toko";
$koneksi = new mysqli($host, $user, $password, $db);

if (isset($_POST["simpan"])) {
    $NamaPelanggan = $_POST["namapelanggan"];
    $telepon = $_POST["telepon"];
    $alamat= $_POST["alamat"];

    $sql = "INSERT INTO pelanggan (NamaPelanggan, telepon, alamat) VALUES ('$NamaPelanggan', $telepon, '$alamat')";
    $hasil =  mysqli_query($koneksi, $sql);

}

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