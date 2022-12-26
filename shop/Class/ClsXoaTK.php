<?php
include("CLsThaoTac.php");
	$p= new thaotac();
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', "mypham","123456789tinh", 'websitemypham') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['xoataikhoan'])){
$idxoa = trim($_POST['txtid']);
if($idxoa!="")
	
{
	if($p->themxoasua("delete from taikhoankh where SDT='$idxoa' limit 1")==1)
	{
		echo '<script language="javascript">alert("Xoá thành công!");</script>';
	}
	else
	{
		echo '<script language="javascript">alert("Xoá không thành công!");</script>';
	}

}
else{
		echo '<script language="javascript">alert("Vui lòng chọn tài khoản cần xoá!");</script>';
	}
}
?>