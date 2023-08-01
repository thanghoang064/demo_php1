<?php
// Kiểm tra có dữ liệu fileupload trong $_FILES không
// Nếu không có thì dừng

if (!isset($_FILES["fileupload"]))
{
    echo "Dữ liệu không đúng cấu trúc";
    die;
}

// Kiểm tra dữ liệu có bị lỗi không
if ($_FILES["fileupload"]['error'] != 0)
{
    echo "Dữ liệu upload bị lỗi";
    die;
}

// Đã có dữ liệu upload, thực hiện xử lý file upload

//Thư mục bạn sẽ lưu file upload
$target_dir    = "uploads/";
//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
$target_file   = $target_dir . $_FILES["fileupload"]["name"];

$allowUpload   = true;

//lay ra phan mo rong cua hinh anh lay duoi sau dau cham
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//dung luong toi thieu co the upload
$maxfilesize = 800000;
// tao ra mang gom nhung loai file cho phep upload
$allowtypes = ["jpg","png","jpeg","gif"];

if(isset($_POST['btn-submit'])) {
    //kiem tra xem co phai la anh khong bang ham getimagesize
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    // bien check nay tra ve true thi day la file anh
    // nguoc lai tra ve false thi khong phai la file anh
    if ($check == true) {
        echo "Day la file anh";
        $allowUpload = true;
    } else {
        echo "Day khong la file anh";
        $allowUpload = false;
    }
    // kiem tra neu file da ton tai thi khong cho phep ghi them
    if (file_exists($target_file)) {
        echo "Ten file da ton tai tren server, khong duoc ghi de";
        $allowUpload = false;
    }
    // kiem tra kich thuoc file upload khong duoc vuot qua gioi han
    if ($_FILES["fileupload"]["size"] > $maxfilesize ) {
        echo "Khong duoc upload anh lon hon".$maxfilesize."(Byte)";
        $allowUpload = false;
    }
    // kiem tra kieu file
    if (!in_array($imageFileType,$allowtypes)){
        echo "Chi duoc upload cac dinh dang JPG, PNG,JPEG,GIF";
        $allowUpload = false;
    }
    if ($allowUpload == true) {
        // xu ly di chuyen anh tu may tinh sang server
        //dung ham move_upload_file
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_file)) {
            echo "Upload file".$_FILES["fileupload"]['name']." 
            thanh cong .file luu tai ".$target_file;
        } else {
            echo "Co loi xay ra khi upload";
        }
    }
}

?>