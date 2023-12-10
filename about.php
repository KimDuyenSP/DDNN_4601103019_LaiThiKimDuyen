<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php  require('inc/links.php'); ?> 
    <title><?php echo $settings_r['site_title'] ?> - GIỚI THIỆU</title>
    <style>
        .box
        {
          border-top-color: var(--teal) !important;  
        }
    </style>
</head>
<body class="bg-light">

    <!--Thiết kế đầu trang-->
    <?php  require('inc/header.php'); ?> 
    
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center ">GIỚI THIỆU VỀ CHÚNG TÔI</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Khách sạn này mang đến trải nghiệm lưu trú chất lượng cao với phòng nghỉ hiện đại, nhà hàng sang trọng và các tiện ích tiện nghi. 
            Với vị trí thuận lợi và dịch vụ chuyên nghiệp, khách sạn cam kết đáp ứng nhu cầu của khách hàng và mang đến sự thoải mái và hài lòng.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lava Sumi</h3>
            <p>
                Chủ tịch khách sạn là một người lãnh đạo tài ba, với tầm nhìn chiến lược và đam mê sâu sắc về ngành dịch vụ lưu trú. 
                Với kinh nghiệm và sự sáng tạo, bà đã xây dựng khách sạn thành một điểm đến đáng mong đợi, tập trung vào chất lượng dịch vụ, tiện nghi và trải nghiệm của khách hàng. 
                Bà luôn đặt sự hài lòng của khách hàng lên hàng đầu và nỗ lực không ngừng nhằm đáp ứng và vượt qua mong đợi của họ. 
                Nhờ tinh thần lãnh đạo xuất sắc, chủ tịch đã thành công trong việc đem lại thành công và danh tiếng cho khách sạn.
            </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/about/about.png" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/phong.svg" width="70px">
                    <h4 class="mt-3">100+ <br> PHÒNG</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/khach.svg" width="70px">
                    <h4 class="mt-3">200+ <br> KHÁCH</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/danhgia.svg" width="70px">
                    <h4 class="mt-3">150+ <br> ĐÁNH GIÁ</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/nhanvien.svg" width="70px">
                    <h4 class="mt-3">200+ <br> NHÂN VIÊN</h4>
                </div>
            </div>
            </div>
        </div>

    </div>

    <h3 class="my-5 fw-bold h-font text-center">ĐỘI NGŨ QUẢN LÝ</h3>
    
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php 
                    $about_r = selectAll('team_details');
                    $path = ABOUT_IMG_PATH;
                    while($row = mysqli_fetch_assoc($about_r))
                    {
                        echo<<<data
                            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                                <img src="$path$row[picture]" class="w-100">
                                <h5 class="mt-2">$row[name]</h5>
                            </div>
                        data;
                    }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!--Thiết kế chân trang-->
    <?php require('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", 
        {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
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