<?php

    //data base class
    class theData{

        //class attribut
        public $host="127.0.0.1";
        //ganti db_jasakurir
        public $dbname="db_jasakurir";
        public $username="root";
        public $password="";
        public $db;

        //attribut yg ini bisa disesuaikan
        public $dataPengiriman=[];

        //Method
        public function __construct(){
            $this->db= new PDO("mysql:host={$this->host};
                                dbname={$this->dbname}",
                                $this->username,
                                $this->password);
        }

        //Method Tampil Table
        public function tampil_table(){
            //ganti pengiriman dengan nama asli di db
            $query= $this->db->prepare("Select * from pengiriman");
            $query->execute();
            $data=$query->fetchAll();
            $this->dataPengiriman=$data;
            return $this->dataPengiriman;
        }

        //method insert kirim barang
        public function kirim_barang($a, $b, $c, $d, $e){
            $query=$this->db->prepare("INSERT INTO tb_barang(nama_barang, jumlah_barang, jenis_barang, berat_barang, ukuran_barang) 
                                       VALUES(:namaBarang, :jumlahBarang, :jenisBarang, :beratBarang, :ukuranBarang)");
            
            //menginsialisasi
            $query->bindParam(":namaBarang",$a);
            $query->bindParam(":jumlahBarang",$b);
            $query->bindParam(":jenisBarang",$c);
            $query->bindParam(":beratBarang",$d);
            $query->bindParam(":ukuranBarang",$e);

            //kondisi
            if($query->execute()) return true;
            else return false;
        }

        //method insert dataPenerima
        public function data_penerima($a, $b, $c, $d, $e){
            $query=$this->db->prepare("INSERT INTO tb_penerima(nama, alamat, no_telepon, kode_post, kota)
                                       VALUE(:pn, :al, :np, :kp, :kc)");
            
            //inisialisasi
            $query->bindParam(":pn", $a);
            $query->bindParam(":al", $b);
            $query->bindParam(":np", $c);
            $query->bindParam(":kp", $d);
            $query->bindParam(":kc", $e);

            //kondisi
            if($query->execute()) return true;
            else return false;
        }

        //method menghitung total depends berat barang
        
    }


?>