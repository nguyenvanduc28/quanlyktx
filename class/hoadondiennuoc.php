<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../class/phong.php');
?>

<?php
class hoadondiennuoc
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllHoadon()
    {
        $query = "SELECT * FROM hoadondiennuoc ORDER BY trangthaithanhtoan";
        $result = $this->db->select($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $value[] = $row;
            }
            return $value;
        } else return false;
    }

    public function thanhtoan($id)
    {
        if (!empty($id)) {
            $query = "UPDATE hoadondiennuoc SET trangthaithanhtoan = 1, ngaythanhtoan = CURRENT_DATE WHERE id = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                return true;
            } else return false;
        }
    }

    public function xoahoadon($id)
    {
        if (!empty($id)) {
            $query = "DELETE FROM hoadondiennuoc WHERE id = '$id'";
            $result = $this->db->delete($query);

            if ($result) {
                return true;
            } else return false;
        }
    }

    public function addHoadon($data)
    {
        $phong = new phong();

        $tenphong = !empty($data['tenphong']) ? $data['tenphong'] : null;
        $thang = !empty($data['thang']) ? $data['thang'] : null;
        $chisodiencu = !empty($data['chisodiencu']) ? $data['chisodiencu'] : null;
        $chisodienmoi = !empty($data['chisodienmoi']) ? $data['chisodienmoi'] : null;
        $tongsodien = !empty($data['tongsodien']) ? $data['tongsodien'] : null;
        $tongtiendien = !empty($data['tongtiendien']) ? $data['tongtiendien'] : null;
        $chisonuoccu = !empty($data['chisonuoccu']) ? $data['chisonuoccu'] : null;
        $chisonuocmoi = !empty($data['chisonuocmoi']) ? $data['chisonuocmoi'] : null;
        $tongsonuoc = !empty($data['tongsonuoc']) ? $data['tongsonuoc'] : null;
        $tongtiennuoc = !empty($data['tongtiennuoc']) ? $data['tongtiennuoc'] : null;
        $tongtien = !empty($data['tongtien']) ? $data['tongtien'] : null;

        if (!empty($tenphong)) {
            $idphong = $phong->getIdPhong($tenphong);
            if ($idphong) {
                $query = "INSERT INTO hoadondiennuoc VALUES (NULL, '$idphong', '$thang', '$chisodiencu',
                '$chisodienmoi',
                '$tongsodien',
                '$tongtiendien',
                '$chisonuoccu',
                '$chisonuocmoi',
                '$tongsonuoc',
                '$tongtiennuoc',
                '$tongtien', 0, NULL, 1)";

                $result = $this->db->insert($query);

                if ($result) {
                    return true;
                } else return false;
            }
        }
    }
}

?>