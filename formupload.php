<?php
require 'site.php';
load_top();
load_header();
load_menu();

if(isset($_SESSION['SID']))
{
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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        chọn tệp để gửi
        <input type="file" name="myfile">
        <input type="submit" value="gửi tệp" name="submit">
    </form>
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