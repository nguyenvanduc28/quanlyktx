<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
?>

<?php
class user
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function login($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = $this->db->select($query);

    if ($result) {
      $value = $result->fetch_assoc();
      Session::set('user', true);
      Session::set('userId', $value['id']);
      Session::set('role_id', $value['role_id']);

      $query2 = "SELECT * FROM role WHERE id = " . $value['role_id'] . " LIMIT 1";
      $result2 = $this->db->select($query2);
      if ($result2) {
        $value2 = $result2->fetch_assoc();
        if ($value2['ten'] === 'Admin') {
          header("Location:admin/index.php");
        } else {
          header("Location:client/index.php");
        }
      }
    } else {
      $error = "Tên đăng nhập hoặc mật khẩu không đúng";
      return $error;
    }
  }


  public function insert($data)
  {
    $email = $data['email'];
    $password = md5($data['password']);
    $role = $data['role'];
    $ten = $data['ten'];
    $ngaysinh = $data['ngaysinh'];
    $sdt = $data['sdt'];
    $gioitinh = $data['gioitinh'];
    $diachi = $data['diachi'];
    $cccd = $data['cccd'];
    $mssv = $data['mssv'];
    $query_getRoleId = "SELECT * FROM role WHERE UPPER(ten) = UPPER('$role')";
    $result1 = $this->db->select($query_getRoleId)->fetch_assoc();

    $roleId = $result1 ? $result1['id'] : false;


    $query_checkEmail = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result2 = $this->db->select($query_checkEmail);
    if ($result2) {
      return 'Email đã tồn tại';
    } else {
      $query_insertUser = "INSERT INTO users VALUES(NULL, '$email', '$password', '$roleId')";
      $this->db->insert($query_insertUser);

      if (strtoupper($data['role']) == 'ADMIN') {
        $user = $this->db->select("SELECT * FROM users WHERE email = '$email'")->fetch_assoc();
        $id = $user['id'];
        $query_InsertQuanly = "INSERT INTO quanly VALUES (NULL, '$email','$ten', '$ngaysinh', '$sdt', '$gioitinh', '$diachi', $id)";
        $this->db->insert($query_InsertQuanly);
      } elseif (strtoupper($data['role']) == 'USER') {
        $user = $this->db->select("SELECT * FROM users WHERE email = '$email'")->fetch_assoc();
        $id = $user['id'];
        $query_InsertSinhvien = "INSERT INTO sinhvien VALUES (NULL, '$mssv', '$email','$ten', '$ngaysinh', '$sdt', '$gioitinh', '$diachi', NULL, NULL, '$cccd', $id)";
        $this->db->insert($query_InsertSinhvien);
      }
      echo '<script type="text/javascript">alert("Bạn đã đăng kí thành công");</script>';
      header("Location:login.php");
    }
  }
}
?>