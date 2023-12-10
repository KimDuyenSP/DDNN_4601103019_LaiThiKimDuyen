<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - TRANG CHỦ</title>
    <style>
        .availability-form
        {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) 
        {
            .availability-form
                {
                    margin-top: 25px;
                    padding: 0 35px;
                } 
        }
    </style>
</head>
<body class="bg-light">

    <!--Thiết kế đầu trang-->
    <?php require('inc/header.php'); ?> 
    
    <!--Băng truyền ảnh -->

    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php 
                    $res = selectAll('carousel');
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $path = CAROUSEL_IMG_PATH;
                        echo <<<data
                                <div class="swiper-slide">
                                    <img src="$path$row[image]" class="w-100 d-block" />
                                </div>
                        data;
                    }
                ?>
            </div>
        </div>
    </div>

    <!--Kiểm tra biểu mẫu phòng trống đặt chỗ --->

    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Kiểm tra phòng trống</h5>
                <form action="rooms.php">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Thời gian nhận phòng</label>
                            <input type="date" class="form-control shadow-none" name="checkin" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Thời gian trả phòng</label>
                            <input type="date" class="form-control shadow-none" name="checkout" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Người lớn</label>
                                <select class="form-select shadow-none" name="adult">
                                    <?php
                                        $guests_q = mysqli_query($con,"SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` 
                                            FROM `rooms` WHERE `status`='1' AND `removed`='0'");
                                        $guests_res = mysqli_fetch_assoc($guests_q);

                                        for($i=1;$i<=$guests_res['max_adult']; $i++)
                                        {
                                            echo"<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Trẻ em</label>
                                <select class="form-select shadow-none" name="children">
                                    <?php

                                        for($i=1;$i<=$guests_res['max_children']; $i++)
                                        {
                                            echo"<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <input type="hidden" name="check_availability">
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Tìm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Phòng của chúng tôi --->

    <h2 class="mt-5 pt-4 md-4 text-center fw-bold h-font">PHÒNG CỦA CHÚNG TÔI</h2>
    <div class="container">
        <div class="row">

        <?php
            $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

            while($room_data = mysqli_fetch_assoc($room_res))
            {
                //Lấy thông tin tiện nghi của phòng

                $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                    INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                    WHERE rfea.room_id = '$room_data[id]'");
                
                $features_data = "";
                while($fea_row = mysqli_fetch_assoc($fea_q))
                {
                    $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fea_row[name]
                    </span>";
                }

                //Lấy thông tin cơ sở vật chất của phòng

                $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                    INNER JOIN `room_facilities` rfea ON f.id = rfea.facilities_id 
                    WHERE rfea.room_id = '$room_data[id]'");
                
                $facilities_data = "";
                while($fac_row = mysqli_fetch_assoc($fac_q))
                {
                    $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fac_row[name]
                    </span>";
                }

                //Lấy hình ảnh thu nhỏ của phòng

                $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                    WHERE `room_id`='$room_data[id]' 
                    AND `thumb`='1'");

                if(mysqli_num_rows($thumb_q)>0)
                {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                } 

                $book_btn = "";

                if(!$settings_r['shutdown'])
                {
                    $login=0;
                    if(isset($_SESSION['login']) && $_SESSION['login']==true)
                        {
                            $login=1;
                        }
                    $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Đặt ngay</button>";                  
                }

                //In thẻ thông tin phòng

                echo <<<data
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="$room_thumb" class="card-img-top">
                            <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6 class="mb-4">$room_data[price] VNĐ/đêm</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Đặc điểm</h6>
                                    $features_data
                                </div>
                                <div class="facilities mb-4">
                                    <h6 class="mb-1">Tiện nghi</h6>
                                    $facilities_data
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">Số lượng khách</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[adult] người lớn
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[children] trẻ em
                                    </span>
                                </div>
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Đánh giá</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                    
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    $book_btn
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">Chi tiết</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                data;

            }
        ?> 
        <div class="col-lg-12 text-center mt-5">
            <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Thêm phòng >>> </a>
        </div>
    </div>


    <!--Cơ sở vật chất của chúng tôi --->
    <h2 class="mt-5 pt-4 md-4 text-center fw-bold h-font">CƠ SỞ VẬT CHẤT CỦA CHÚNG TÔI</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php
                $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res))
                {
                    echo<<<data
                        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3 ">
                            <img src="$path$row[icon]" width="60px" >
                            <h5 class="mt-3">$row[name]</h5>
                        </div>
                    data;
                }
            ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Thêm cơ sở vật chất >>> </a>
            </div>
        </div>
    </div>

    <!--Nhận xét từ khách hàng-->
    <h2 class="mt-5 pt-4 md-4 text-center fw-bold h-font">NHẬN XÉT TỪ KHÁCH HÀNG</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/Users/user1.png" width="30px">
                    <h6 class="m-0 ms-2">Takamiko</h6>
                </div>
                <p>
                    "Khách sạn này tuyệt vời!
                    Dịch vụ tận tâm, phòng sạch sẽ và thoải mái. 
                    Tôi rất hài lòng."
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                </div>
              </div>
              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/Users/user3.png" width="30px">
                    <h6 class="m-0 ms-2">SumiLava</h6>
                </div>
                <p>
                    "Khách sạn này xuất sắc! 
                    Dịch vụ tuyệt vời, phòng đẹp và thoải mái. 
                    Tôi rất hài lòng."
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                </div>
              </div>
              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/Users/user2.png" width="30px">
                    <h6 class="m-0 ms-2">PhiQuang</h6>
                </div>
                <p>
                    "Khách sạn tuyệt vời. 
                    Tôi rất hài lòng về dịch vụ chuyên nghiệp và tận tâm từ đội ngũ nhân viên. 
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                </div>
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="col-lg-12 text-center mt-5">
            <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Tìm hiểu thêm >>> </a>
        </div>
    </div>

    <!--Liên hệ với chúng tôi-->
    
    <h2 class="mt-5 pt-4 md-4 text-center fw-bold h-font">LIÊN HỆ</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height= "320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Gọi cho chúng tôi</h5>
                    <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <?php
                        if($contact_r['pn2']!='')
                        {
                            echo<<<data
                                <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                                    <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
                                </a>
                            data;
                        }
                    ?>
                    
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Theo dõi chúng tôi</h5>
                    <?php 
                        if($contact_r['tw']!='')
                        {
                            echo<<<data
                                <a href="$contact_r[tw]" class="d-inline-block mb-3">
                                    <span class="badge bg-light text-dark fs-6 p-2">
                                        <i class="bi bi-twitter me-1"></i> Twitter
                                    </span>
                                </a>
                                <br>
                            data;
                        }
                    ?>
                    
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--Thiết kế chân trang-->
    <?php require('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper-container", 
        {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: 
            {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        var swiper = new Swiper(".swiper-testimonials", 
        {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3", 
            loop: true,
            coverflowEffect: 
            {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: 
            {
                el: ".swiper-pagination",
            },
            breakpoints: 
            {
                320: 
                {
                    slidesPerView: 1,
                },
                640: 
                {
                    slidesPerView: 1,
                },
                768: 
                {
                    slidesPerView: 2,
                },
                1024: 
                {
                    slidesPerView: 3,
                },
            }
        });
  </script>
</body>
</html> 