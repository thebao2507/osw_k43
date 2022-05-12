<?php
require 'site.php';
load_top();
load_header();
load_menu();
if(isset($_POST["user"])&&isset($_POST["pass"])
	&&isset($_POST["nlpass"])&&isset($_POST["ten"])
	&&isset($_POST["ns"])
    &&isset($_POST["gt"])
    &&isset($_POST["email"]))
{//1.lay du lieu
  $tendangnhap = $_POST["user"];
  $mkhau =$_POST["pass"];
  $nlmkhau = $_POST["nlpass"];
  $hoten =$_POST["ten"];
  $ngaysinh =$_POST["ns"];
  $gioitinh =$_POST["gt"];
  $email = $_POST["email"];
  //2.Kết nối với csdl
  $conn = new mysqli("localhost", "root", "","ltweb")or die("Không kết nối được");
  //3.Chọn bảng mã cho kết nối 
  //mysqli_query($conn, "set names 'utf8'");
 
  //4. Xây dựng câu lệnh truy vấn
  $caulenh1="INSERT INTO taikhoan(TenDangNhap,MatKhau) VALUES('".$tendangnhap."','".$mkhau."')";
  $caulenh2="INSERT INTO thongtin(TenDangNhap, MatKhau ,HoTen, NgaySinh, GioiTinh, DiaChi) VALUES ('".$tendangnhap."','".$mkhau."','".$hoten."','".$ngaysinh."','".$gioitinh."','".$email."')";
  //5. Thực hiện câu lệnh 
  if ($mkhau == $nlmkhau)
    {//Truy vấn xem đã có tai khoản cần đăng ký trong dữ liệu chưa?
	    $lenhkttrung = "select * from taikhoan where TenDangNhap ='".$tendangnhap."'";
	    $kqkttrung = $conn->query($lenhkttrung); 
	    if($dong = $kqkttrung->fetch_array())
        {
	     echo("Tài khoản đã tồn tại, vui lòng đăng ký tên tài khoản khác");
        }
        else
        {
	        if($kql = $conn->query($caulenh1) && $kq2 = $conn->query($caulenh2))
            {
                echo "Chúc mừng bạn đăng ký thành công";
                header('location:index.php');
            }
	        else
		        echo"Đăng ký thành công ";
        }
    }
    else
    {
	    echo "Mật khẩu không đúng ";
    }
  //6. Đóng kết nối
  $conn->close();
  }
?>
<html>
<head>
<title>Đăng ký khách hàng</title>
<meta charset = "UTF8">
</head>
<body>
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
   <table align = "center" border = "0">
		<font> 
		<tr style = "color:teal"><td align="center" colspan ="2"><font size = 6>Đăng ký Sinh Viên</font></td></tr>
		<tr style = "color:teal"><td bgcolor = "white" colspan ="2"><font size = 5>Thông tin đăng nhập</font></td></tr>
		<tr><td>Tên đăng nhập</td> <td><input type ="text" name = "user" placeholder = "Tên đăng nhập" align ="right"></td></tr>
		<tr><td>Mật khẩu </td><td><input type ="password" name ="pass" placeholder = "Mật khẩu"></td></tr>
		<tr><td>Nhập lại mật khẩu </td><td><input type ="password" name ="nlpass" placeholder = "Nhập lại mật khẩu"></td></tr>
		<tr style = "color:teal"><td bgcolor ="white" colspan ="2"><font size =5>Thông tin chi tiết cá nhân</td></tr>
		<tr><td>Họ tên Sinh Viên </td><td><input type ="text" name = "ten" placeholder ="Họ tên" align ="right"></td></tr>
		<tr><td>Ngày sinh </td><td><input type ="text" name = "ns" placeholder ="ngày sinh" align ="right"></td></tr>
		<tr><td>Giới tính </td><td><input type ="radio" name = "gt" value ="Nam">Nam<input type ="radio" name = "gt" value ="Nữ">Nữ</td></tr>
		<tr><td>Địa chỉ email </td><td><input type ="text" name = "email" placeholder ="địa chỉ"></td></tr>
		<tr style = "color:White"><td align = "center"><input type = "submit" value = "Đăng Ký"></td></tr>
	</table>
</form>
</body>
</html>
<?php
load_footer();
?>