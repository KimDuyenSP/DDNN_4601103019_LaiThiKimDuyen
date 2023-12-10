<?php

    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    session_start();
    if(!(isset($_SESSION['login']) && $_SESSION['login']==true))
        {
            redirect('index.php');
        }
    
    if(isset($_POST['pay_now']))
    {
        $ORDER_ID = 'ORD_'.$_SESSION['uId'].random_int(11111,99999999);
        $CUST_ID =  $_SESSION['uId'];
        $TXN_AMOUNT = $_SESSION['room']['payment'];

        $paramList = array();
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;

        $frm_data = filteration($_POST);

        $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) 
            VALUES (?,?,?,?,?)";
        insert($query1,[$CUST_ID,$_SESSION['room']['id'],$frm_data['checkin'],
            $frm_data['checkout'],$ORDER_ID],'issss');
        
        $booking_id = mysqli_insert_id($con);

        $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenum`, `address`) 
            VALUES (?,?,?,?,?,?,?)";
        insert($query2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],
            $TXN_AMOUNT,$frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'issssss');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thông báo đặt phòng thành công</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        
        .success-container {
            margin-top: 100px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
        
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        
        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        
        .emoji {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Đặt phòng thành công!</h1>
        <p>Cảm ơn bạn đã đặt phòng tại chúng tôi.</p>
        <div class="emoji">😊</div>
        <a href="index.php" class="button">Quay lại trang chủ</a>
    </div>
</body>
</html>