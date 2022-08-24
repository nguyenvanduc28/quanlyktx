<?php
$filepath  = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../class/phong.php');
include_once($filepath . '/../class/sinhvien.php');
include_once($filepath . '/../class/lopsinhvien.php');
?>

<?php
class hopdongktx
{
    private $db;
    public function __construct()
    {
        $this->db  = new Database;
    }

    public function getHopdongktx($idSv)
    {
        $query  = "SELECT * FROM hopdongktx WHERE sinhvien_id  = '$idSv' LIMIT 1";
        $result  = $this->db->select($query);

        if ($result) {
            $value  = $result->fetch_assoc();
            return $value;
        } else return false;
    }

    public function getAllHopdong()
    {
        $query = "SELECT * FROM hopdongktx";
        $result = $this->db->select($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $value[] = $row;
            }
            return $value;
        } else return false;
    }

    public function insertHopdong($data)
    {

        $svId  = isset($data['sinhvien_id']) ?$data['sinhvien_id'] : '';
        $pId  = isset($data['phong_id']) ?$data['phong_id']:'';
        $ngaylap  = isset($data['ngaylap']) ?$data['ngaylap']:'';
        $ngaybatdau  = isset($data['ngaybatdau']) ?$data['ngaybatdau']:'';
        $ngayketthuc  = isset($data['ngayketthuc']) ?$data['ngayketthuc']:'';
        $tensv  = isset($data['tensv']) ?$data['tensv']:'';
        $sdtsv  = isset($data['sdtsv']) ?$data['sdtsv']:'';
        $ngaysinhsv  = isset($data['ngaysinhsv']) ?$data['ngaysinhsv']:'';
        $cccdsv  = isset($data['cccdsv']) ?$data['cccdsv']:'';
        $gioitinhsv  = isset($data['gioitinhsv']) ?$data['gioitinhsv']:'';
        $diachisv  = isset($data['diachisv']) ?$data['diachisv']:'';
        $tengh  = isset($data['tengh']) ?$data['tengh']:'';
        $ngaysinhgh  = isset($data['ngaysinhgh']) ?$data['ngaysinhgh']:'';
        $diachigh  = isset($data['diachigh']) ?$data['diachigh']:'';
        $sdtgh  = isset($data['sdtgh']) ?$data['sdtgh']:'';


        $query  = "INSERT INTO hopdongktx VALUES (NULL, '$svId', '$pId', '$ngaylap', '$ngaybatdau', '$ngayketthuc', 1, '$tensv',
        '$ngaysinhsv',
        '$sdtsv',
        '$cccdsv',
        '$gioitinhsv',
        '$diachisv',
        '$tengh',
        '$ngaysinhgh',
        '$sdtgh',
        '$diachigh' )";
        $result  = $this->db->insert($query);

        $query2  = "UPDATE dangkyphong SET xacnhan  = 1 WHERE sinhvien_id  = '$svId'";
        $result2  = $this->db->update($query2);

        if ($result and $result2) {
            return true;
        } else return false;
    }

    public function getBanCungPhong()
    {
        $sinhvien  = new sinhvien();
        $sv  = $sinhvien->getCurrentSinhvien();
        $svId  = $sv['id'];
        if (empty($svId)) return false; 

        $lopsinhvien  = new lopsinhvien();

        $query  = "SELECT * FROM hopdongktx WHERE  phong_id  = (SELECT phong_id FROM hopdongktx WHERE sinhvien_id  = '$svId')";
        $result  = $this->db->select($query);
        if ($result) {
            while ($row  = $result->fetch_assoc()) {
                $s  = $sinhvien->getSinhvien($row['sinhvien_id']);
                $tenLop  = $lopsinhvien->getLopName($s['lop_id']);

                $value[]  = [
                    'ten'  => $s['ten'],
                    'ngaysinh'  => $s['ngaysinh'],
                    'mssv'  => $s['mssv'],
                    'lop'  => $tenLop
                ];
            }
            return $value;
        } else return array([
            'ten'  => '',
            'ngaysinh'  => '',
            'mssv'  => '',
            'lop'  => ''
        ]);
    }


    public function updateHopdong($data)
    {

        $svId  = isset($data['sinhvien_id'])  ?  $data['sinhvien_id'] : '';
        $ngaylap  = isset($data['ngaylap'])  ?  $data['ngaylap'] : null;
        $ngaybatdau  = isset($data['ngaybatdau'])  ?  $data['ngaybatdau'] : null;
        $ngayketthuc  = isset($data['ngayketthuc'])  ?  $data['ngayketthuc'] : null;
        $tensv  = isset($data['tensv'])  ?  $data['tensv'] : '';
        $sdtsv  = isset($data['sdtsv'])  ?  $data['sdtsv'] : '';
        $ngaysinhsv  = isset($data['ngaysinhsv'])  ?  $data['ngaysinhsv'] : null;
        $cccdsv  = isset($data['cccdsv'])  ?  $data['cccdsv'] : '';
        $gioitinhsv  = isset($data['gioitinhsv'])  ?  $data['gioitinhsv'] : '';
        $diachisv  = isset($data['diachisv']) ?   $data['diachisv'] : '';
        $tengh  = isset($data['tengh'])  ?  $data['tengh'] : '';
        $ngaysinhgh  = isset($data['ngaysinhgh'])  ?  $data['ngaysinhgh'] : null;
        $diachigh  = isset($data['diachigh'])  ?  $data['diachigh'] : '';
        $sdtgh  = isset($data['sdtgh'])  ?  $data['sdtgh'] : '';


        $query  = "UPDATE hopdongktx SET ngaylap  = '$ngaylap', ngaybatdau  = '$ngaybatdau',ngayketthuc  = '$ngayketthuc', tensv  = '$tensv',
        ngaysinhsv  = '$ngaysinhsv',
        sdtsv = '$sdtsv',
        cccdsv = '$cccdsv',
        gioitinhsv = '$gioitinhsv',
        diachisv = '$diachisv',
        tengh = '$tengh',
        ngaysinhgh = '$ngaysinhgh',
        sdtgh = '$sdtgh',
        diachigh = '$diachigh' WHERE sinhvien_id  = '$svId' ";
        $result  = $this->db->update($query);


        if ($result) {
            return true;
        } else return false;
    }
}
?>