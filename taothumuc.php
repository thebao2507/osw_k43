<?php
require 'site.php';
load_top();
load_header();
load_menu();

if(isset($_SESSION['SID']))
{

 //   mkdir("E:\/flower", 0700);
 //   echo "da tao thu muc";

    $dirname = $_SESSION['SID'];

    if (!file_exists($dirname)) {
        mkdir("E:\/".$dirname, 0777);
        echo "Tạo thư mục thành công";
    //    exit;
    } else {
        echo "Thư mục đã tồn tại";
    }

}
else
{
	echo "Mời đăng nhập.";
}
load_footer();
?>