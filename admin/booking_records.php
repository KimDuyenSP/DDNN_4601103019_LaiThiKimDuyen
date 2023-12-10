<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG QUẢN TRỊ VIÊN - BẢN GHI ĐẶT PHÒNG</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Bản ghi đặt phòng</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                    <div class="text-end mb-4">
                        <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Tìm kiếm">
                    </div>

                    <div class="text-responsive">
                        <table class="table table-hover border text-center" style="min-width: 1000px;">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Tên phòng</th>
                                    <th scope="col">Đặt phòng</th>
                                    <th scope="col">Tình trạng</th>                                    
                                </tr>
                            </thead>
                            <tbody id="table-data">
                            </tbody>
                        </table>
                    </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php require('inc/scripts.php'); ?>

    <script src="scripts/booking_records.js"></script>
    
</body>
</html>