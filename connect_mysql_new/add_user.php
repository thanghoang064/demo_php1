<?php
require 'connect.php';
$error = [];
if (isset($_POST['btn-submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $trang_thai = $_POST['trang_thai'];
    if (empty($name)) {

        $error['email'] = "Bạn chưa nhập email";
    }
    if (isset($_FILES['f_hinh_anh'])) {
        //Thư mục bạn sẽ lưu file upload
        $target_dir    = "img/";
        $name_img = $_FILES["f_hinh_anh"]["name"];
//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file   = $target_dir .$name_img;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $allowtypes = ["jpg","png","jpeg","gif"];
        // kiem tra kieu file
        $allowUpload = true;
        if (!in_array($imageFileType,$allowtypes)){
            $error['img_type'] = "Chi duoc upload cac dinh dang JPG, PNG,JPEG,GIF";
            $allowUpload = false;
        }
        if ($allowUpload == true) {
            //di chuyển hình ảnh vào trong thư mục
            move_uploaded_file($_FILES["f_hinh_anh"]["tmp_name"],$target_file);
        }
    }
    if (!$error) {
        $sql = "INSERT INTO user VALUES (null,'$name','$email','$trang_thai','$name_img')";
        $conn->exec($sql);
        echo "Thêm người dùng thành công";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Name <input type="text" name="name" value="">
        <?php echo isset($error['email']) ?  $error['email'] :""; ?>
        </br>
        Email <input type="email" name="email" value=""></br>
        Trạng thái
        <select name="trang_thai">
            <option value="1">Mở</option>
            <option value="0">Khóa</option>
        </select>
        Hình ảnh
        <input type="file" name="f_hinh_anh">
        <?php echo isset($error['img_type']) ?  $error['img_type']:""; ?>
        <input type="submit" name="btn-submit" value="Thêm">
    </form>

</body>
</html>