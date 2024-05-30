<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "prjweb3",
        $tablename = "produit",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             nom VARCHAR (30) NOT NULL,
                             price FLOAT,
                             devise VARCHAR (25),
                             category text,
                             product_image VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    /* insert data*/ 
    public function insertOrder($Id, $products, $total) {
        $sql = "INSERT INTO orders (user_id, products, total_price) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->con, $sql);
    
        if ($stmt === false) {
            error_log('MySQL prepare error: ' . mysqli_error($this->con));
            return false;
        }
    
        // Convert products array to JSON for storage
        $productsJson = json_encode($products);
        
        mysqli_stmt_bind_param($stmt, 'isd', $userId, $productsJson, $total);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        return $result;
    }
}






