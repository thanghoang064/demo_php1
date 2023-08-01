<?php
require 'connect.php';
$query = "select * from user";
$result = $conn->query($query)->fetchAll();
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
<header>
</header>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Status</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        <?php
            foreach ($result as $key=>$value) {
        ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['status']; ?></td>
            <td><button type="button" onclick="location.href='edit_user.php?id=<?php echo  $value['id']; ?>'">Sửa</button>

            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <footer></footer>
</body>

</html>