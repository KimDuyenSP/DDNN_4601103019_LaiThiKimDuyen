<?php

    //Dữ liệu này được sử dụng cho mục đích phía giao diện người dùng (FE)

    define('SITE_URL','http://127.0.0.1/HOTEL_BOOKING/');
    define('ABOUT_IMG_PATH',SITE_URL.'images/about/');
    define('CAROUSEL_IMG_PATH',SITE_URL.'images/carousel/');
    define('FACILITIES_IMG_PATH',SITE_URL.'images/facilities/');
    define('ROOMS_IMG_PATH',SITE_URL.'images/rooms/');
    define('USERS_IMG_PATH',SITE_URL.'images/users/');



    //Quá trình tải lên phía máy chủ cần dữ liệu này (BE)

    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/HOTEL_BOOKING/images/');
    define('ABOUT_FOLDER','about/');
    define('CAROUSEL_FOLDER','carousel/');
    define('FACILITIES_FOLDER','facilities/');
    define('ROOMS_FOLDER','rooms/');
    define('USERS_FOLDER','users/');

    // sendgrid api Key

    define('SENDGRID_API_KEY',"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");


    function adminLogin()
    {
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true))
        {
            echo"<script>
                window.location.href='index.php';
            </script>";
            exit;
        }
        
    }


    function  redirect($url)
    {
        echo"<script>
            window.location.href='$url';
        </script>";
        exit;
    }


    function alert($type,$msg)
    {
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

    function uploadImage($image,$folder)
    {
        $valid_mime = ['image/jpg','image/png','image/webp'];
        $img_mime = $image['type'];

        if(!in_array($img_mime,$valid_mime))
        {
            return 'inv_img'; //invalid image mime or format (Định dạng hoặc loại tệp hình ảnh không phù hợp)
        }
        else if(($image['size']/(1024*1024))>=2)
        {
            return 'inv_size'; //invalid size greater than 2mb (Kích thước tệp vượt quá giới hạn 2MB)
        }
        else
        {
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".$ext";
            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
            if(move_uploaded_file($image['tmp_name'],$img_path))
            {
                return $rname;
            }
            else{
                return 'upd_failed';
            }
        }
    }

    function deleteImage($image,$folder)
    {
        if(unlink(UPLOAD_IMAGE_PATH.$folder.$image))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function uploadSVGImage($image,$folder)
    {
        $valid_mime = ['image/svg+xml'];
        $img_mime = $image['type'];

        if(!in_array($img_mime,$valid_mime))
        {
            return 'inv_img'; //invalid image mime or format (Định dạng hoặc loại tệp hình ảnh không phù hợp)
        }
        else if(($image['size']/(1024*1024))>=1)
        {
            return 'inv_size'; //invalid size greater than 2mb (Kích thước tệp vượt quá giới hạn 1MB)
        }
        else
        {
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".$ext";
            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
            if(move_uploaded_file($image['tmp_name'],$img_path))
            {
                return $rname;
            }
            else{
                return 'upd_failed';
            }
        }
    }

    function uploadUserImage($image)
    {
        $valid_mime = ['image/jpeg','image/png','image/webp','image/webp'];
        $img_mime = $image['type'];

        if(!in_array($img_mime,$valid_mime))
        {
            return 'inv_img'; //invalid image mime or format (Định dạng hoặc loại tệp hình ảnh không phù hợp)
        }
        else
        {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";
            $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER . $rname;

            $img_data = file_get_contents($image['tmp_name']);

            if ($img_data !== false) {
                if ($ext == 'png' || $ext == 'PNG') {
                    $img_path = str_replace('.jpeg', '.png', $img_path);
                } else if ($ext == 'webp' || $ext == 'WEBP') {
                    $img_path = str_replace('.jpeg', '.webp', $img_path);
                }

                if (file_put_contents($img_path, $img_data) !== false) {
                    return $rname;
                }
            }
            return 'upd_failed';
        }
    }

    
?>