<?php
$filepath = realpath(dirname(__FILE__));
include ($filepath . '/../config/config.php');
?>


<?php
class Database  extends PDO {
    public  $host = DB_HOST;
    public  $user = DB_USER;
    public  $pass = DB_PASS;
    public  $dbname = DB_NAME;
    
    public  $varconnect;
    public  $error;

    public  function __construct()
    {
        $this->connectDB();
    }

    private function connectDB() {
        $this->varconnect = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );


        if (!$this->varconnect) {
            $this->error = "Connect Database fail" . $this->varconnect->connect_error;
            return false;
        }
    }


    public  function select($query) {
        $result = $this->varconnect->query($query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public  function insert($query) {
        $result = $this->varconnect->query($query);

        if ($result) {
            return  $result;
        } else {
            return false;
        }
    }

    public  function update($query) {
        $result = $this->varconnect->query($query);

        if ($result) {
            return  $result;
        } else {
            return false;
        }
    }

    public  function delete($query) {
        $result = $this->varconnect->query($query);

        if ($result) {
            return  $result;
        } else {
            return false;
        }
    }
}
?>