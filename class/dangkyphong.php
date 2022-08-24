<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../class/phong.php');
include_once($filepath . '/../class/sinhvien.php');
?>

<?php
class dangkyphong
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertDangky($id)
    {
        $sinhvien = new sinhvien();
        $svId = $sinhvien->getCurrentSinhvien()['id'];


        $query = "SELECT * FROM dangkyphong WHERE sinhvien_id = '$svId' ";
        $result = $this->db->select($query);
        if ($result) {
            return false;
        } else {
            $query = "INSERT INTO dangkyphong VALUES (NULL, '$svId', '$id', CURRENT_DATE, true, false )";
            $result = $this->db->insert($query);

            $query2 = "UPDATE phong SET soluong = soluong+1 WHERE id = '$id'";
            $result2 = $this->db->update($query2);

            if ($result and $result2) {
                return true;
            } else return false;
        }
    }

    public function huyDangky($id)
    {
        $sinhvien = new sinhvien();
        $svId = $sinhvien->getCurrentSinhvien()['id'];

        $query = "DELETE FROM dangkyphong WHERE phong_id = '$id' AND sinhvien_id='$svId'";
        $result = $this->db->delete($query);

        $query2 = "UPDATE phong SET soluong = soluong-1 WHERE id = '$id'";
        $result2 = $this->db->update($query2);
        if ($result and $result2) {
            return true;
        } else return false;
    }


    public function getDangky()
    {
        $sinhvien = new sinhvien();
        $svId = $sinhvien->getCurrentSinhvien()['id'];


        $phong = new phong();

        $query = "SELECT * FROM dangkyphong WHERE sinhvien_id = '$svId'";
        $result = $this->db->select($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $tenPhong = $phong->getTenPhong($row['phong_id']);
            $value = [
                'id' => $row['phong_id'],
                'tenphong' => $tenPhong,
                'ngaydangky' => $row['ngaydangky'],
                'trangthaidangky' => $row['trangthaidangky'],
                'xacnhan' => $row['xacnhan'],
            ];

            return $value;
        } else return false;
    }


    public function checkDangky()
    {
        $sinhvien = new sinhvien();
        $svId = $sinhvien->getCurrentSinhvien()['id'];
        if (empty($svId)) return false; 
        $query = "SELECT * FROM dangkyphong WHERE sinhvien_id = '$svId'";
        $result = $this->db->select($query);

        if ($result) {
            return true;
        } else return false;
    }


    public function getBanCungPhong()
    {
        $sinhvien = new sinhvien();
        $sv = $sinhvien->getCurrentSinhvien();
        $svId = $sv['id'];
        if (empty($svId)) return false;

        $lopsinhvien = new lopsinhvien();

        $query = "SELECT * FROM dangkyphong WHERE  phong_id = (SELECT phong_id FROM dangkyphong WHERE sinhvien_id = '$svId')";
        $result = $this->db->select($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $s = $sinhvien->getSinhvien($row['sinhvien_id']);
                $tenLop = $lopsinhvien->getLopName($s['lop_id']);

                $value[] = [
                    'ten' => $s['ten'],
                    'ngaysinh' => $s['ngaysinh'],
                    'mssv' => $s['mssv'],
                    'lop' => $tenLop
                ];
            }
            return $value;
        } else return false;
    }


    public function getDanhsachsinhvienphong($id)
    {
        
        $lopsinhvien = new lopsinhvien();
        $sinhvien = new sinhvien();


        $query = "SELECT * FROM dangkyphong WHERE  phong_id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $s = $sinhvien->getSinhvien($row['sinhvien_id']);
                $tenLop = $lopsinhvien->getLopName($s['lop_id']);

                $value[] = [
                    'ten' => $s['ten'],
                    'ngaysinh' => $s['ngaysinh'],
                    'mssv' => $s['mssv'],
                    'lop' => $tenLop,
                    'xacnhan' => $row['xacnhan']
                ];
            }
            return $value;
        } else return false;
    }

    public function getAllDangky()
    {

        $sinhvien = new sinhvien();
        $phong = new phong();


        $query = "SELECT * FROM dangkyphong WHERE trangthaidangky = 1 AND xacnhan = 0";
        $result = $this->db->select($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $tenSv = $sinhvien->getSinhvien($row['sinhvien_id'])['ten'];
                $tenPhong = $phong->getTenPhong($row['phong_id']);


                $value[] = [
                    'sinhvien_id' => $row['sinhvien_id'],
                    'phong_id' => $row['phong_id'],
                    'ten' => $tenSv,
                    'phong' => $tenPhong,
                    'ngaydangky' => $row['ngaydangky'],
                    'xacnhan' => $row['xacnhan']

                ];
            }
            return $value;
        } else return false;
    }
}
?>