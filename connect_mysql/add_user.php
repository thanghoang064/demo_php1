<?php
require "connect.php";
//tạo ra 1 mảng chứa lỗi
$errors = [];
if (isset($_POST["add_user"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    if (empty($name)) {
        $errors['name_empty'] = "Mời nhập vào tên";
    }
    if (isset($_FILES['f_hinh_anh'])) {
        $target_dir    = "img/";
        $name_image = $_FILES["f_hinh_anh"]["name"];
        $target_file   = $target_dir . $name_image;
        $allowUpload   = true;
        //lay ra phan mo rong cua hinh anh lay duoi sau dau cham
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $allowtypes = ["jpg","png","jpeg","gif"];
        if (!in_array($imageFileType,$allowtypes)){
            $errors['img_type'] = "Chi duoc upload cac dinh dang JPG, PNG,JPEG,GIF";
            $allowUpload = false;
        }
        if ($allowUpload == true) {
            //chuyển ảnh vào đúng thư mục
            move_uploaded_file($_FILES["f_hinh_anh"]["tmp_name"],$target_file);
        }

    }
    if (!$errors) {
        $sql = "INSERT INTO user VALUES(null,'$name','$email','$status','$name_image') ";
        $result = $conn->exec($sql);
        echo "Thêm mới người dùng thành công";
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
    <form method="POST" action="" enctype="multipart/form-data">
        Name <input type="text" name="name">
        <?php echo isset($errors['name_empty']) ? $errors['name_empty'] :""; ?>
        </br>
        Email <input type="text" name="email"></br>
        Cate User
        <select name="status">
                <option value="1">Mở</option>
                <option value="0">Khóa</option>
        </select></br>
        <input type="file" name="f_hinh_anh">
        <?php echo isset($errors['img_type']) ? $errors['img_type'] :""; ?>
        <input type="submit" name="add_user" value="Add">
    </form>

</body>
</html>