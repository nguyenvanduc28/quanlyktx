<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../class/lopsinhvien.php');
include_once($filepath . '/../class/khoa.php');
?>

<?php
class phong
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllPhong() {
        $query = "SELECT * FROM phong ORDER BY tenphong";
        $result = $this->db->select($query);

        if ($result) {
            while($row = $result->fetch_assoc()) {
                $value[] = $row;
            }
            return $value;
        } else return false;
    }


    public function getPhong($id) {
        $query = "SELECT * FROM phong WHERE id = '$id' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) {
            $value = $result->fetch_assoc();
            return $value;
        } else return false;
    }

    public function updatePhong($data) {
        $id = !empty($data['id']) ? $data['id'] : null;
        $tenphong = !empty($data['tenphong']) ? $data['tenphong'] : null;
        $toida = (!empty($data['toida']) and is_numeric($data['toida']) == 1) ? $data['toida'] : null;
        $yeucau = !empty($data['yeucau']) ? $data['yeucau'] : null;
        $ghichu = !empty($data['ghichu']) ? $data['ghichu'] : null;

        if (empty($yeucau)) {
            $query = "UPDATE phong SET tenphong = '$tenphong',toida = '$toida',ghichu = '$ghichu' WHERE id = '$id' ";
            $result = $this->db->update($query);

            if ($result) {return true;}
            else return false;
        } else {
            $query = "UPDATE phong SET tenphong = '$tenphong',toida = '$toida',yeucau = '$yeucau',ghichu = '$ghichu' WHERE id = '$id' ";
            $result = $this->db->update($query);

            if ($result) {return true;}
            else return false;
        }
    }


    public function getIdPhong($data) {
        $query = "SELECT * FROM phong where UPPER(tenphong) = UPPER('$data') LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $value = $result->fetch_assoc();
            return $value['id'];
        } else return false;
    }


    public function getTenPhong($id) {
        $query = "SELECT * FROM phong WHERE id = '$id' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) {
            $value = $result->fetch_assoc();
            return $value['tenphong'];
        } else return false;
    }


    public function insertPhong($data) {
        $tenphong = !empty($data['tenphong']) ? $data['tenphong'] : '';
        $toida = !empty($data['toida']) ? $data['toida'] : '';
        $yeucau = !empty($data['yeucau']) ? $data['yeucau'] : '';
        $ghichu = !empty($data['ghichu']) ? $data['ghichu'] : '';


        $query = "INSERT INTO phong VALUES (null, '$tenphong', '0', '$toida', '$yeucau', '$ghichu')";
        $result = $this->db->insert($query);

        if($result) return true;
        else return false;

    }


    public function deletePhong ($id) {
        $query = "DELETE FROM phong WHERE id = '$id' ";
        $result = $this->db->delete($query);

        if ($result) return true;
        else return false;
    }

}

?>