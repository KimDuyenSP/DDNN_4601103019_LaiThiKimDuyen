<?php
    require('inc/essentials.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG QUẢN TRỊ VIÊN - BẢNG ĐIỀU KHIỂN</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            Bảng điều khiển của bạn có thể bao gồm các phần sau: Phòng, Người dùng và Cài đặt.
            <br>
                1. Phòng:
                <br>- Danh sách phòng: Hiển thị danh sách các phòng đang tồn tại trong hệ thống. Bạn có thể xem, thêm, chỉnh sửa hoặc xóa các phòng.
                <br>- Thống kê phòng: Cung cấp thông tin tổng quan về số lượng phòng, trạng thái, số lượng người dùng trong mỗi phòng, v.v.
                <br>- Tạo phòng mới: Cho phép bạn tạo phòng mới bằng cách cung cấp thông tin như tên phòng, mô tả, quyền hạn, v.v.
            <br>
                2. Người dùng:
                <br>- Danh sách người dùng: Hiển thị danh sách các người dùng trong hệ thống. Bạn có thể xem, thêm, chỉnh sửa hoặc xóa người dùng.
                <br>- Quyền hạn người dùng: Quản lý quyền hạn của người dùng trong hệ thống. Bạn có thể thay đổi quyền hạn, gán vai trò, v.v.
                <br>- Thống kê người dùng: Cung cấp thông tin tổng quan về số lượng người dùng, tình trạng tài khoản, hoạt động gần đây, v.v.
            <br>
                3. Cài đặt:
                <br>- Cấu hình hệ thống: Cho phép bạn cấu hình các thiết lập chung của hệ thống, ví dụ như cài đặt định dạng ngày tháng, ngôn ngữ, v.v.
                <br>- Quản lý cấp phép: Điều chỉnh quyền truy cập và cấp phép cho người dùng và vai trò trong hệ thống.
                <br>- Giao diện: Cho phép bạn tùy chỉnh giao diện bằng cách thay đổi màu sắc, hình nền, v.v.
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php') ?>
</body>
</html>