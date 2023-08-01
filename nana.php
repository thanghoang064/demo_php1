<?php
// Hàm nhận một hàm callback làm đối số
function doSomething($callback) {
// Thực hiện một số công việc
echo "Doing something...<br>";

// Gọi hàm callback được truyền vào
$callback();
}

// Hàm callback
function myCallback() {
echo "Callback function called!<br>";
}

// Gọi hàm doSomething và truyền hàm myCallback làm callback
doSomething('myCallback');