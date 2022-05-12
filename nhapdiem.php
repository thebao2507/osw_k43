<meta charset="utf8">
<?php
require 'site.php';
load_top();
load_header();
load_menu();
if(isset($_SESSION['SID']) &&  isset($_SESSION['Tensinhvien']))
{
	if (isset($_POST['msv']) && isset($_POST['tensv']) && isset($_POST['mahp']))
	{
		$msv = $_POST['msv'];
		$tsv = $_POST['tensv'];
		$mhp = $_POST['mahp'];
		$thp = $_POST['tenhp'];
		$dcc = $_POST['dcc'];
		$dgk = $_POST['dgk'];
		$dt = $_POST['dt'];


		//1. Kết nối dữ liệu
		$conn = new mysqli("localhost", "root", "", "ltweb")
				or die("Không kết nối được");

		//2. Chọn bảng mã cho kết nối
		//mysqli_query($conn, "set names 'utf8'");

		$xl="";
		$diemhocphan=0.1*$dcc+0.2*$dgk+0.7*$dt;
		if($diemhocphan>=9)
			{$xl="A+";}
		elseif ($diemhocphan>=8)
			{$xl="A";}
		elseif ($diemhocphan>=7)
			{$xl="B+";}
		elseif ($diemhocphan>=6)
			{$xl="B";}
		elseif ($diemhocphan>=5)
			{$xl="C";}
		elseif ($diemhocphan>=4)
			{$xl="D";}
		else
			{$xl="F";}

		//3. Xây dựng câu lệnh truy vấn
		$sqlcomd = "INSERT INTO bangdiem(MASV, TENSV, MAHP, TENHP, CC, GK, CK, TONGDIEM, XEPLOAI)
					VALUES ('".$msv."', '".$tsv."', '".$mhp."', '".$thp."', ".$dcc.", ".$dgk.", ".$dt.", ".$diemhocphan.", '".$xl."')";

		//4. Thực hiện truy vấn
		/*$result = mysqli_query($conn, $sqlcomd)
				or die("Truy vấn không được");*/

		//5. Xử lý kết quả trả về

		/*	if(($result = mysqli_query($conn, $sqlcomd)))
				echo "Nhập điểm xong";
			else
				echo "Chưa nhập xong";
		*/	
			
			$truyvantrung = "select * from bangdiem
					where MASV='".$msv."' and MAHP='".$mhp."'";
			$kqtruyvan = $conn->query($truyvantrung);
			if($dong = $kqtruyvan->fetch_array())
			{
				echo "Điểm học phần $thp của sinh viên $tsv đã được nhập rồi, mời nhập điểm của sinh viên khác";
			}
			else
			{
				if(($result = $conn->query($sqlcomd)))
                {
                    echo "Nhập điểm xong";
                }
				else
					echo "Chưa nhập xong";
                header('location:index.php');
			}
			//thêm thông báo phải đăng nhập để nhập điểm.

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
    <title>Document</title>
</head>
<body>
    <!--<div id="if2f2">
	 dangnhapthongtin.php, dulieudangnhap.php -->
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<table align="center" border="0">
				<tr><td colspan="2" align="center"><B>NHẬP ĐIỂM CHO SINH VIÊN<B></td></tr>
				<tr><td>Nhập mã số sinh viên:</td><td><input type="text" name="msv" 
						value="<?php echo $_SESSION['SID']; ?>" readonly="true"></td></tr>
				<tr><td>Tên sinh viên:</td><td><input type="text" name="tensv"
						value="<?php echo $_SESSION['Tensinhvien']; ?>" readonly="true"></td></tr>
				<tr><td>Mã học phần:</td><td><input type="text" name="mahp"><b></b></td></tr>
				<tr><td>Tên học phần:</td><td><input type="text" name="tenhp"><b></b></td></tr>
				<tr><td>Điểm chuyên cần:</td><td><input type="text" name="dcc"><b></b></td></tr>
				<tr><td>Điểm giữa kì:</td><td><input type="text" name="dgk"><b></b></td></tr>
				<tr><td>Điểm thi:</td><td><input type="text" name="dt"><b></b></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Lưu" name="btl"></td></tr>
			</table>
		</form>
	<!--</div>-->
</body>
</html>
<?php
    }
    else
    {
	    echo "Mời đăng nhập.";
    }
    load_footer();
?>