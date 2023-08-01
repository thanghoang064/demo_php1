//Khai báo 1 mảng liên hợp 2 chiều gồm các thông
//tin sau :
(ma_sv,ten_sv,nam_sinh,diem_toan,diem_ly,diem_hoa)
- Giả lập khoảng 5 phần tử cho mảng
- Yêu cầu hiển thị thông tin mảng vừa giả lập
ra table trong html gồm những thông tin sau:
Mã sinh viên |Tên Sinh Viên |Tuổi| Toán| Lý| Hóa |Điểm TB|Xếp Loại
- Biết tuổi  = Lấy năm hiện tại - năm sinh
+ get current year in php
- Điểm TB = Toán + Lý + Hóa /3
- Xếp loại :
+ Điểm TB >=0 và điểm TB < 4 => Yếu (Hiển thị màu đỏ tại hàng của bảng)
+ Điểm TB >=4 và điểm TB < 6 => Trung bình (Hiển thị màu vảng tại hàng của bảng)
+ Điểm TB >=6 và điểm TB < 8 => Khá (Hiển thị màu blue tại hàng của bảng)
+ Điểm TB >= 8 và điểm TB <= 10 => Giỏi( hiển thị màu xanh )