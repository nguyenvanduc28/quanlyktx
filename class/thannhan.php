<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../class/sinhvien.php');
?>

<?php
class thannhan
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function setThannhan($data)
    {
        $sv = new sinhvien();
        $sinhvien = $sv->getCurrentSinhvien();
        $sinhvienId = $sinhvien['id'];

        $query = "SELECT * FROM thannhan WHERE sinhvien_id = $sinhvienId ";
        $result = $this->db->select($query);
        if ($result) {
            $this->updateThannhan($data);
            return true;
        }

        $ten = $data['tengh'];
        $ngaysinh = $data['ngaysinhgh'];
        $sdt = $data['sdtgh'];
        $diachi = $data['diachigh'];
        $gioitinh = $data['gioitinhgh'];
        $nghenghiep = $data['nghenghiepgh'];


        $query2 = "INSERT INTO thannhan VALUES (NULL, '$ten', '$ngaysinh', '$sdt', '$gioitinh', '$diachi', '$nghenghiep', '$sinhvienId')";
        $result2 = $this->db->insert($query2);
        if ($result2) {
            header("Location:taikhoan.php");
        }
    }


    public function updateThannhan($data)
    {

        $sv = new sinhvien();
        $sinhvien = $sv->getCurrentSinhvien();
        $sinhvienId = $sinhvien['id'];

        $ten = $data['tengh'];
        $ngaysinh = $data['ngaysinhgh'];
        $sdt = $data['sdtgh'];
        $diachi = $data['diachigh'];
        $gioitinh = $data['gioitinhgh'];
        $nghenghiep = $data['nghenghiepgh'];


        $query = "UPDATE thannhan SET ten = '$ten', ngaysinh = '$ngaysinh', sdt = '$sdt', gioitinh = '$gioitinh', diachi = '$diachi', nghenghiep = '$nghenghiep' WHERE sinhvien_id = '$sinhvienId'";
        $result = $this->db->update($query);
        if ($result) {
            header("Location:taikhoan.php");
        }
    }


    public function getCurrentThannhan()
    {
        $sv = new sinhvien();
        $sinhvien = $sv->getCurrentSinhvien();
        $sinhvienId = $sinhvien['id'];

        $query = "SELECT * FROM thannhan WHERE sinhvien_id = '$sinhvienId' ";
        $result = $this->db->select($query);
        if ($result) {
            $value = $result->fetch_assoc();
            return $value;
        } else return array(
            'ten' => '',
            'ngaysinh' => '',
            'sdt' => '',
            'gioitinh' => '',
            'diachi' => '',
            'nghenghiep' => ''
        );
    }

    public function getThannhan($idSv) {
        $query = "SELECT * FROM thannhan WHERE sinhvien_id = '$idSv' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) {
            $value = $result->fetch_assoc();

            return $value;
        } else return false;
    }
}
?>