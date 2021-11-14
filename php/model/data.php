<?php

    //data base class
    class theData{

        //class attribut
        public $host="127.0.0.1";
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
            //ganti namatable dengan nama asli di db
            $query= $this->db->prepare("Select * from pengiriman");
            $query->execute();
            $data=$query->fetchAll();
            $this->dataPengiriman=$data;
            return $this->dataPengiriman;
        }
    }


?>