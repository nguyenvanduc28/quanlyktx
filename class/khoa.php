<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
?>


<?php
class khoa
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getKhoaId($tenKhoa) {
        $query = "SELECT * FROM khoa where UPPER(ten) = UPPER('$tenKhoa')";
        $result = $this->db->select($query);
        if ($result) {
            $idKhoa = $result->fetch_assoc()['id'];
            return $idKhoa;
        } else return false;
    }

    public function getKhoaName($idKhoa)
    {
        $query = "SELECT * FROM khoa where id = '$idKhoa' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $tenKhoa = $result->fetch_assoc();
            return $tenKhoa['ten'];
        } else return false;
    }


    public function getAllKhoa() {
        $query = "SELECT * FROM khoa ORDER BY ten";
        $result = $this->db->select($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $value[] = $row;
            }

            return $value;
        } else return false;
    }


    public function checkKhoa($id) {
        $query = "SELECT * FROM sinhvien WHERE khoa_id = '$id'";
        $result = $this->db->select($query);

        if ($result) return true;
        else return false;
    }

    public function deleteKhoa($id) {
        $query = "DELETE FROM khoa WHERE id = '$id'";
        $result = $this->db->delete($query);

        if ($result) return true;
        else return false;
    }

    public function insertKhoa($ten) {
        $query = "INSERT INTO khoa VALUES (NULL, '$ten')";
        $result = $this->db->insert($query);

        if ($result) return true;
        else return false;
    }
}

?>
