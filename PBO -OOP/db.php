<?php 

class Database{

    public $db = "toko";
    private $host = "localhost";
    private $user = "root";
    private $password = "";

    public function insertData(){
        return "INSERT DATA";
    }

    public static function selectData(){
        return "SELECT DATA";
    } 

    public function deleteData(){
        return "DELETE DATA";
    }
     
    public function updateData(){
        return "UPDATE DATA";
    }

    public function GetHost(){
        return $this -> host;
    }
}

$usedb = new Database;

echo $usedb -> insertData();
echo "<br>";
echo $usedb -> db , "<br>";
echo $usedb -> GetHost() , "<br>";
echo Database :: selectData() , "<br>";
echo $usedb -> selectData();

class Penjualan{
    public function Barang(){
        return "Barang";
    }

    public static function Pelanggan(){
        return "Pelanggan";
    }
}

echo "<br>";

$objPenjualan = new Penjualan;

echo $objPenjualan -> Barang();
echo $objPenjualan :: Pelanggan();
?>