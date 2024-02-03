<?php 
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $db = "toko";
    $koneksi = new mysqli($host, $user, $password, $db);

    $id = 0;
    $NamaPelanggan = "";
    $telepon = 0;
    $alamat = "";

    if(isset($_GET["ubah"])){
        $id = $_GET["ubah"];
        $sql = "SELECT * FROM pelanggan WHERE id=" . $id;
        $hasil = mysqli_query($koneksi, $sql);

        if(mysqli_num_rows($hasil) > 0){
            $row = mysqli_fetch_array($hasil);
            $id = $row[0];
            $NamaPelanggan = $row[1];
            $telepon = $row[2];
            $alamat = $row[3];
        }
    }
?>

<form action="" method="post">
    Nama:
    <input type="text" name="namapelanggan" placeholder="Nama Pelanggan" value="<?php echo $NamaPelanggan ?>">
    <br>
    Telepon:
    <input type="number" name="telepon" placeholder="Telepon Pelanggan" value="<?php echo $telepon ?>">
    <br>
    Alamat:
    <input type="text" name="alamat" placeholder="Alamat Pelanggan" value="<?php echo $alamat ?>">
    <br>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="submit" name="simpan" value="simpan">
</form>


<?php 
if(isset($_POST["simpan"])){
    $NamaPelanggan = $_POST["namapelanggan"];
    $telepon = $_POST["telepon"];
    $alamat= $_POST["alamat"];


    if (isset($_POST["id"])) {
    $id = $_POST["id"];
    echo $id;
    if($id == 0){
        $sql = "INSERT INTO pelanggan (NamaPelanggan, telepon, alamat) VALUES ('$NamaPelanggan', $telepon, '$alamat')";
        $hasil =  mysqli_query($koneksi, $sql);
    }
    else {
        $sql = "UPDATE pelanggan SET NamaPelanggan = '$NamaPelanggan', telepon = $telepon, alamat = '$alamat' WHERE id =" . $id;
        $hasil = mysqli_query($koneksi, $sql); 
        header("location:http://localhost/Tugas-php-sekolah/Toko/pelanggan.php");
    
    } }  }

if(isset($_GET["hapus"])){
    $id = $_GET["hapus"];
    $sql = "DELETE FROM pelanggan WHERE id =" . $id;
    $hasil = mysqli_query($koneksi, $sql);
    header("location:http://localhost/Tugas-php-sekolah/Toko/pelanggan.php");
}

$sql = "SELECT * FROM pelanggan";
$hasil = mysqli_query($koneksi, $sql);

echo "<table border=2px>
        <thead>
            <tr>
            <th>
                no
            </th>
            <th>
                nama
            </th>
            <th>
                telepon
            </th>
            <th>
                alamat
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
        $i = 1;
while ($row = mysqli_fetch_array($hasil)){
    echo "<tr>";
    echo "<td>" . $i++ . "</td>";
    echo "<td>" . $row[1] . "<br>" . "</td>";
    echo "<td>" . $row[2] . "<br>" . "</td>";
    echo "<td>" . $row[3] . "<br>" . "</td>";
    echo "<td>" . "<a href='?hapus=". $row[0] ."'>Hapus</a>" . "</td>";
    echo "<td>" . "<a href='?ubah=". $row[0] ."'>Ubah</a>" . "</td>";
    echo "</tr>";
}
echo "</tbody> </table>";

?>