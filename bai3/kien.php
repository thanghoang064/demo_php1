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
    <form method="GET" action="" >
        <input type="text" name="hihi" value="">
        <input type="submit" value="Gửi" name="abc">
    </form>
<?php
    if (isset($_GET['abc'])) {
        echo print_r($_GET);
        die;
        echo 123;
    }
?>
</body>
</html>