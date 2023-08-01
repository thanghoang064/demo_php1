<?php
if (!isset($_FILES["fileupload"])) {
    echo "không tồn tại file upload";
    die();
}
//kiểm tra file ảnh upload lên có bị lỗi ko
if ($_FILES["fileupload"]["error"] != 0) {
    echo "dữ liệu upload bị lỗi";
    die();
}
// thư mục sẽ lưu ảnh vào đó
$target_dir = "uploads/";
//đường dẫn đến file được lưu
$target_file = $target_dir.$_FILES['fileupload']['name'];

$allowUpload = true;

// hàm lấy ra phần mở rộng của file (đuôi file sau dấu chấm)
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// kích cớ lớn nhất quy định được phép upload (bytes)
$maxfilesize = 80000;
//mảng quy định những đuôi file được phép upload
$allowType = ['jpg','png','jpeg','gif'];

if (isset($_POST["btn-submit"])) {
    // check xem có phải là ảnh ko sử dụng hàm getimagessize
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    // nếu đúng là ảnh check sẽ là true ngược lại check sẽ là false
    if ($check == true) {
        echo "Đây là file ảnh";
    } else {
        echo "Đây ko là file ảnh";
        $allowUpload  = false;
    }

    // kiểm tra nếu tên ảnh đã tồn tại thì ko cho upload tiếp
    if (file_exists($target_file)) {
        echo "file đã tồn tại trên server không được ghi đè";
         $allowUpload  = false;
    }
    // kiểm tra kích thước file upload ko vượt quá giới hạn
    if ($_FILES['fileupload']['size']  > $maxfilesize) {
        echo "file đã vượt quá kích thước cho phép";
        $allowUpload  = false;
    }
    // kiểm tra đuôi file có hợp lệ ko
    if (!in_array($imageFileType,$allowType)) {
        echo "Đuôi file ko hợp lệ "  ;
         $allowUpload  = false;
    }
    if ($allowUpload == true) {
        // xử lý di chuyển file vào trong thư mục upload
        if (move_uploaded_file($_FILES['fileupload']['tmp_name'],$target_file)) {
            echo "Upload file thành công tại ".$target_file;
        }
    }

}


?>