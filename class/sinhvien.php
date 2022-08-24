<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../class/lopsinhvien.php');
include_once($filepath . '/../class/khoa.php');
?>

<?php
class sinhvien
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCurrentSinhvien() {
        $userId = Session::get('userId');
        if (empty($userId)) return false;
        $query = "SELECT * FROM sinhvien WHERE user_id = '$userId'";
        $result = $this->db->select($query);
        if ($result) {
            $data = $result->fetch_assoc();
            return $data;
        } else return false;
        
    }


    public function getSinhvien($id) {
        $query = "SELECT * FROM sinhvien WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $data = $result->fetch_assoc();
            return $data;
        } else return false;
    }


    public function update($data)
    {
        $userId = Session::get('userId');
        $ngaysinh = $data['ngaysinh'];
        $diachi = $data['diachi'];
        $sdt = $data['sdt'];
        $idLop = $data['lop'];
        $idKhoa = $data['khoa'];
        $cccd = $data['cccd'];

        $khoa = new khoa();
        
        $query =    "UPDATE sinhvien
                    SET ngaysinh = '$ngaysinh',
                        sdt = '$sdt',
                        diachi = '$diachi',
                        lop_id = '$idLop',
                        khoa_id = '$idKhoa',
                        cccd = '$cccd'
                    WHERE user_id = '$userId' ";
        $result = $this->db->update($query);
        if ($result) {
        header("Location:taikhoan.php");
        } else return false;
    }
}
?>