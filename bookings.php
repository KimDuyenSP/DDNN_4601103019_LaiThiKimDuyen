<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  require('inc/links.php'); ?> 
    <title><?php echo $settings_r['site_title'] ?> - ĐẶT PHÒNG</title>
</head>
<body class="bg-light">

    <!--Thiết kế đầu trang-->
    <?php  
        require('inc/header.php'); 
        if(!(isset($_SESSION['login']) && $_SESSION['login']==true))
        {
            redirect('index.php');
        }
    ?>

    <div class="container">
        <div class="row">
             
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">ĐẶT PHÒNG</h2>
                <div style="font-size: 14px">
                    <a href="index.php" class="text-secondary text-decoration-none">TRANG CHỦ</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">ĐẶT PHÒNG</a>
                </div>
            </div>


            <?php

                $query = "SELECT bo.*, bd.* FROM `booking_order` AS bo
                INNER JOIN `booking_details` AS bd ON bo.booking_id = bd.booking_id
                WHERE ((bo.booking_status='booked' OR bo.booking_status='cancelled' OR bo.booking_status='payment failed')
                AND bo.order_id=?)
                ORDER BY bo.booking_id DESC";
                
                $result = select($query,[$_SESSION['uId']],'i');

                while($data = mysqli_fetch_assoc($result))
                {
                    $date = date("d-m-Y",strtotime($data['datentime']));
                    $checkin = date("d-m-Y",strtotime($data['check_in']));
                    $checkout = date("d-m-Y",strtotime($data['check_out']));

                    $status_bg = "";
                    $btn = "";

                    if($data['booking_status']=='booked')
                    {
                        $status_bg = "bg-success";
                        $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Tải PDF</a>
                            <button type='button'  class='btn btn-outline-success btn-sm shadow-none'>
                                Đánh giá và nhận xét
                            </button>
                        ";
                    }
                    else if($data['booking_status'=='cancelled'])
                    {
                        $status_bg = "bg-danger";
                        $btn="<span class='badge bg-primary'>Trả tiền!</span>";
                    }
                    else
                    {
                        $status_bg = "bg-warning";
                        $btn="<a href='generate_pdf.php?gen_pdf&id=$data[booking_id] class='btn btn-dark btn-sm shadow-none'>Tải PDF</a>";
                    }
                    echo<<<bookings
                        <div class='col-md-4 px-4 mb-4'>
                            <div class='bg-white p-3 rounded shadow-sm'>
                                <h5 class='fw-bold'>$data[room_name]</h5>
                                <p>$data[price] đồng/đêm</p>
                                <p>
                                    <b>Ngày nhận: </b> $checkin <br>
                                    <b>Ngày trả: </b> $checkout
                                </p>
                                <p>
                                    <b>Giá: </b> $data[price] <br>
                                    <b>Mã hóa đơn: </b> $data[order_id]
                                    <b>Ngày: </b> $date
                                </p>
                                <p>
                                    <span class='badge $status_bg'>$data[booking_status]</span>
                                </p>
                                $btn;
                            </div>
                        </div>
                    bookings;
                }

            ?>
            
        </div>
    </div>

    <!--Thiết kế chân trang-->
    <?php require('inc/footer.php'); ?>

</body>
</html> 