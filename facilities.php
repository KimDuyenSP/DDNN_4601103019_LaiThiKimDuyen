<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  require('inc/links.php'); ?> 
    <title><?php echo $settings_r['site_title'] ?> - CƠ SỞ VẬT CHẤT</title>
    <style>
        .pop:hover
        {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">

    <!--Thiết kế đầu trang-->
    <?php  require('inc/header.php'); ?> 
    
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center ">CƠ SỞ VẬT CHẤT CỦA CHÚNG TÔI</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Khách sạn này có cơ sở vật chất hiện đại và tiện nghi, bao gồm các phòng nghỉ rộng rãi và thoải mái, nhà hàng, quầy bar, v.v. <br> 
            Ngoài ra, khách sạn cũng có các dịch vụ như dịch vụ phòng 24 giờ, dịch vụ giặt là, truyền hình cáp và Wifi.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <?php
                $res = selectAll('facilities');
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res))
                {
                    echo<<<data
                        <div class="col-lg-4 col-md-6 mb-5 px-4">
                            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="$path$row[icon]" width="40px" height="40px">
                                    <h5 class="m-0 ms-3">$row[name]</h5>
                                </div>
                                <p>$row[description]</p>
                            </div>
                        </div>
                    data;
                }
            ?>
        </div>
    </div>

    <!--Thiết kế chân trang-->
    <?php require('inc/footer.php'); ?>

</body>
</html> 