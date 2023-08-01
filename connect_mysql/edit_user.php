<?php
require 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id = '$id'";
//fetch chỉ trả ra 1 dòng dữ liệu tương đương với mảng
//liên hợp 1 chiều
$row = $conn->query($sql)->fetch();
if (isset($_POST["edit_user"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $sql_update = "UPDATE user SET name = '$name',email ='$email',status ='$status' WHERE id = '$id'";
    $conn->exec($sql_update);
    //lệnh để nhảu về trang bất kỳ
    header("location: view_user.php");
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
        Name <input type="text" name="name" value="<?php echo $row['name'];?>">
        </br>
        Email <input type="text" name="email" value="<?php echo $row['email'];?>"></br>
        Status
        <select name="status">
            <option value="1" <?php echo $row['status'] == 1 ?'selected':'';?>>Mở</option>
            <option value="0" <?php echo $row['status'] == 0 ?'selected':'';?>>Khóa</option>
        </select></br>

        <input type="submit" name="edit_user" value="Edit">
    </form>
</body>
</html>
