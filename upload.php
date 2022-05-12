<?php
require 'site.php';
load_top();
load_header();
load_menu();
// $destination_path = 'E:\uploads/'; file được lưu đến ổ E folder upload
/*if (($_FILES['myfile']['type'] == 'image/gif') || 
    ($_FILES['myfile']['type'] == 'image/jpeg') && 
    ($_FILES['myfile']['size'] < 5120000)) 
{*/
if(isset($_POST["submit"])) 
{
    $dirname = $_SESSION['SID'];
    if (!file_exists($dirname)) {
        mkdir("E:/".$dirname, 0777);
        //echo "Tạo thư mục thành công";
        //exit;
        $tenthumuc = $dirname;
        $destination_path = 'E:'.$tenthumuc.'/';
        $target_path = $destination_path.basename($_FILES['myfile']['name']);
        if(move_uploaded_file(
            $_FILES['myfile']['tmp_name'],
            $target_path))
        { echo "đã nộp file thành công"; }
    } else {
        $tenthumuc = $dirname;
        $destination_path = 'E:'.$tenthumuc.'/';
        $target_path = $destination_path.basename($_FILES['myfile']['name']);
        if(move_uploaded_file(
            $_FILES['myfile']['tmp_name'],
            $target_path))
        { echo "đã nộp file thành công"; }
    }
}
load_footer();
?>
	