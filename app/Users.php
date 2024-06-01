<?php
    class users {
        private $conn;
        private $table_name = "users";

        public $id;
        public $username;
        public $email;
        public $password;
        public $balance;


        public function __construct($db){
            $this->conn = $db;
        }

        // Tampilkan data semua produk
        public function index(){
            $query = "SELECT * FROM {$this->table_name}";
            $data = $this->conn->prepare($query);
            $data->execute();
            return $data;
        }
         // Tampilkan halaman create
         public function create(){
            header("Location: create.php");
            exit();
        }
        // Tambah produk ke database
        public function store(){
            $query = "INSERT INTO {$this->table_name} 
                    (username, email, password, balance) 
                    VALUES (?, ?, ?, ?)
                    ";
            $data = $this->conn->prepare($query);
        
            $data->execute([
                $this->username,
                $this->email,
                $this->password,
                $this->balance, 
            ]);
        
            return $data->rowCount() > 0;
        }

        // Tampilkan halaman edit
        public function edit(){
            $query = "SELECT * FROM {$this->table_name} WHERE id = ?";
            $data = $this->conn->prepare($query);
            $data->execute([$this->id]);
            return $data;
        }

        // Update produk ke database
        public function update(){
            $query = "UPDATE {$this->table_name} 
                    SET username=?, email=?, password=?, balance=? 
                    WHERE id=?";
            $data = $this->conn->prepare($query);
        
            $data->execute([
                $this->username, 
                $this->email, 
                $this->password, 
                $this->balance, 
                $this->id, 
            ]);
        
            return $data->rowCount() > 0;
        }

        // Hapus produk dari database
        public function delete(){
            $query = "DELETE FROM {$this->table_name} WHERE id = ?";
            $data = $this->conn->prepare($query);
            $data->execute([$this->id]);
        
            return $data->rowCount() > 0;
        }
    }
?>
