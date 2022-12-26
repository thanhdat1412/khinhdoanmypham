<?php
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', "mypham","123456789tinh", 'websitemypham') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['themtaikhoan'])){
$SDT = trim($_POST['txtsdt']);
$MatKhau = trim($_POST['txtpass']);
$MatKhau = md5($MatKhau );




if (empty($SDT)) {
array_push($errors, "Username is required"); 
}
if (empty($MatKhau)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM taikhoanqtht WHERE SDT = '$SDT'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Số điện thoại đã được sử dụng!"); window.location="../Admin/taikhoanqtht.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO taikhoanqtht (SDT, MatKhau) VALUES ('$SDT','$MatKhau')";
echo '<script language="javascript">alert("Thêm thành công!");</script>';

if (mysqli_query($conn, $sql)){
//echo "Mã tài khoản: ".$_POST['txtMaTaiKhoan']."<br/>";
//echo "Mật khẩu: " .$_POST['txtMatKhau']."<br/>";
//echo "Phân quyền: ".$_POST['txtPhanquyen']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../Admin/taikhoanqtht.php";</script>';
}
}
}
?>