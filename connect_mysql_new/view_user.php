<?php
require 'connect.php';
$sql = "SELECT * FROM user";
// hứng toàn bộ dữ liệu từ trên database nhả xuống
$result = $conn->query($sql)->fetchAll();

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
    <button type="button" onclick="location.href='add_user.php';" >Thêm</button>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>ảnh</td>
            <td>Trạng thái</td>
            <td>Xử lý</td>
        </tr>
        <?php
        foreach ($result as $key=>$value){
        ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><img width="100px" height="100px" src="img/<?php echo  $value['hinh'];?>"></td>
            <td><?php echo $value['trang_thai'] == 1 ? "Mở" : "Khóa"; ?></td>
            <td><button type="button" onclick="location.href='edit_user.php?id=<?php echo $value['id']; ?>';" >Sửa</button>
               <a href="javascript:confirmDeleTe('delete_user.php?id=<?php echo $value['id']; ?>')">Xóa</a>
            </td>
        </tr>
        <?php
        }
                ?>
    </table>
</body>
<script>
    function confirmDeleTe(delUrl) {
        if (confirm("Bạn có muốn xóa không ?")) {
            document.location = delUrl;
        }
    }
</script>
</html>