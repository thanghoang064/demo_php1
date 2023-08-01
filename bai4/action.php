<?php

if (!isset($_FILES["fileupload"])) {
    echo "Không tồn tại file để upload";
    die();
}

// kiểm tra xem file upload có lỗi không
if ($_FILES["fileupload"]["error"] != 0) {
    echo "Dữ liệu upload bị lỗi";
    die();
}

$target_dir  = "uploads/";

$target_file =  $target_dir.$_FILES["fileupload"]["name"];

$allowUpload = true;

//lấy phần mở rộng của file (Tức là đuôi file sau dấu chấm)
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// kích cỡ lớn nhất mà file có thể upload đơn vị là bytes
$maxfilesize = 80000;

// những kiểu đuôi file mà được chấp nhận
$allowtype = ['jpg','png','jpeg','gif'];

if (isset($_POST['btn-submit']))  {
    // kiểm tra xem có phải là ảnh ko nếu là ảnh trả về true ngược lại
    // không là ảnh sẽ trả về false
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    if ($check == true) {
        echo "Đây là file ảnh";
    } else {
        echo "Đây ko là file ảnh";
        $allowUpload = false;
    }
    //kiểm tra nếu file đã tồn tại thì sẽ ko cho phép up nữa
    if (file_exists($target_file)) {
        echo "Tên file đã tồn tại trên server ko được ghi đè";
        $allowUpload = false;
    }
    //kiếm tra kích thước file không vượt quá giời hạn cho phép
    if ($_FILES["fileupload"]["size"] > $maxfilesize) {
          echo "Không được upload ảnh lớn hơn ".$maxfilesize."(Bytes)";
          $allowUpload = false;
    }
    if (!in_array($imageFileType,$allowtype)) {
        echo "Không được upload những ảnh có định dạng khác jpq,png,jpeg,gif";
        $allowUpload = false;
    }
    if ($allowUpload == true) {
        //xử lý di chuyển file tạm vào thư mục cần lưu trữ
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_file)) {
            echo "Upload ảnh thành công tại ". $target_file;
        }
    }

       //kiểm tra kiểu file ko nằm trong định dạng cho phép
}

    ?>