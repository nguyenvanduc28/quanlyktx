<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
?>


<?php
class lopsinhvien
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLopId($tenLop)
    {
        $query = "SELECT * FROM lop WHERE ten = '$tenLop' ";
        $result = $this->db->select($query);
        if ($result) {
            $lop = $result->fetch_assoc();
            return $lop['id'];
        } else return false;
    }

    public function getLopName($idLop)
    {
        $query = "SELECT * FROM lop where id = '$idLop' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $tenLop = $result->fetch_assoc();
            return $tenLop['ten'];
        } else return false;
    }

    public function getAllLop() {
        $query = "SELECT * FROM lop ORDER BY ten";
        $result = $this->db->select($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $value[] = $row;
            }

            return $value;
        } else return false;
    }

    public function checkLop($id) {
        $query = "SELECT * FROM sinhvien WHERE lop_id = '$id'";
        $result = $this->db->select($query);

        if ($result) return true;
        else return false;
    }


    public function deleteLop($id) {
        $query = "DELETE FROM lop WHERE id = '$id'";
        $result = $this->db->delete($query);

        if ($result) return true;
        else return false;
    }


    public function insertLop($ten) {
        $query = "INSERT INTO lop VALUES (NULL, '$ten')";
        $result = $this->db->insert($query);

        if ($result) return true;
        else return false;
    }
}

?>
