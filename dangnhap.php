<meta charset="utf8">
<?php
require 'site.php';
load_top();
load_header();
load_menu();

	/*if(isset($_COOKIE['user'])&&isset($_COOKIE['pass']))
	{
        echo "<br>Cookie đã đăng ký là: ".$_COOKIE['user']." - ".$_COOKIE['pass'];
		/*$ckuser = $_COOKIE['user'];
		$ckpass = $_COOKIE['pass'];
    }*/
	/*if(isset($_GET['delc'])&&($_GET['delc']==1))
	{
        setcookie("user","",time()-(86400*7));
        setcookie("pass","",time()-(86400*7));
        echo "<br><font color='red'>Bạn đã xóa cookie</font>";
    }*/



if (isset($_POST['username']) && isset($_POST['pass']))
{
	$tdn = $_POST['username'];
	$pas = $_POST['pass'];

	//1. Kết nối dữ liệu
	$conn = new mysqli("localhost", "root", "", "ltweb")
			or die("Không kết nối được");

	//2. Chọn bảng mã cho kết nối
	//mysqli_query($conn, "set names 'utf8'");

	//3. Xây dựng câu lệnh truy vấn
	$sqlcomd = "select * from taikhoan
				where TenDangNhap = '".$tdn."' and MatKhau = '".$pas."'";

	//4. Thực hiện truy vấn
	$result = $conn->query($sqlcomd)
			or die("Truy vấn không được");

	//5. Xử lý kết quả trả về
	/*if($row = mysqli_fetch_array($result))
	{
		echo("Đăng nhập thành công");
	//	header('location:tinhHaiSo.php');
	}
	else
	{
		echo("Tên đăng nhập hoặc mật khẩu không đúng");
	//	header('location:tiepTucDangKy.php');
	}*/
	if($row = $result->fetch_array())
	{
		$_SESSION['SID'] = $tdn;
		//lấy tên sinh viên từ bảng điểm
		/*$sqlcomd1="select * from tbbangdiem
				where MaSV = '".$tdn."'";*/
		$sqlcomd1 = "select * from thongtin
				where TenDangNhap = '".$tdn."'";
		$result1 = $conn->query($sqlcomd1)
			or die("Truy vấn không được");
		if($row1 = $result1->fetch_array())
		{
			//$_SESSION['Tensinhvien'] = $row1['TenSV'];
			$_SESSION['Tensinhvien'] = $row1['HoTen'];
			//Tensinhvien trong $_SESSION['Tensinhvien'] tự đặt
		}
		echo("Đăng nhập thành công");
		//$msg = "Đăng nhập thành công";
		header('location:index.php');
		//header('location:dulieudangnhap.php');
	}
	else
	{
		//$msg = "Tên đăng nhập hoặc mật khẩu không đúng";
		echo "Tên đăng nhập hoặc mật khẩu không đúng";
	}
	
	
	/*if(isset($_POST['remember'])&&($_POST['remember']))
	{
		setcookie("user",$tdn,time()+(86400*7));
		setcookie("pass",$pas,time()+(86400*7));
		//$msgcookie="<br>Đã ghi nhận lưu mật khẩu!";
		echo "<br>Đã ghi nhận lưu mật khẩu!";
	}
	if(isset($_COOKIE['user'])&&isset($_COOKIE['pass']))
	{
        echo "<br>Cookie đã đăng ký là: ".$_COOKIE['user']." - ".$_COOKIE['pass'];
		/*$ckuser = $_COOKIE['user'];
		$ckpass = $_COOKIE['pass'];
    }*/
	
	
	//6. Đóng kết nối
	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Hệ Thống</title>
</head>
<body>
    <div id="if2f2">
	<!-- dangnhapthongtin.php, dulieudangnhap.php -->
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<table align="center" border="0">
				<tr><td align="center"><B>Đăng nhập<B></td></tr>
				<tr><td><input type="text" name="username" placeholder="Tài khoản" >
								<!--value=<//?php echo "$ckuser"; ?>--> </td></tr>
				<tr><td><input type="password" name="pass" placeholder="Mật khẩu" ></td></tr>
				<tr><td><input type="checkbox" name="remember" value="1"><b><i>Nhớ mật khẩu</i></b></td></tr>
				<tr><td align="right"><input type="submit" value="Đăng nhập" name="btdn"></td></tr>
			</table>
			<!--<?php
				/*if(isset($msg)) echo $msg;
                if(isset($msgcookie)) echo $msgcookie;*/
			?>-->
			<!--<li>
				<a href="dulieudangnhap.php?delc=1">Xóa cookie</a>
			</li>-->
		</form>
	</div>
</body>
</html>

<?php
load_footer();
?>