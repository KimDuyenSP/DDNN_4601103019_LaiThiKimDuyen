<?php

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['get_bookings']))
    {
        $frm_data = filteration($_POST);

        $limit = 1;
        $page = $frm_data['page'];
        $start = ($page-1) * $limit;



        $query = "SELECT bo.*, bd.* FROM `booking_order` bo
            INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
            WHERE (bo.booking_status='booked' OR bo.booking_status='cancelled')
            AND (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?)
            ORDER BY bo.booking_id DESC";
            
        
        $res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%"],'sss');

        $limit_query = $query ." LIMIT $start,$limit";
        $limit_res = select($limit_query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%"],'sss');


        $i=1;
        $table_data = "";

        while($data = mysqli_fetch_assoc($res))
        {
            $date = date("d-m-Y",strtotime($data['datentime']));
            $checkin = date("d-m-Y",strtotime($data['check_in']));
            $checkout = date("d-m-Y",strtotime($data['check_out']));

            if($data['booking_status']=='booked')
            {
                $status_bg = 'bg-success';
            }
            else if($data['booking_status']=='cancelled')
            {
                $status_bg = 'bg-danger';
            }
            else
            {
                $status_bg = 'bg-warning text-dark';
            }

            $table_data .="
                <tr>
                    <td>$i</td>
                    <td>
                        <span class='badge bg-primary'>
                            Order ID: $data[order_id]
                        </span>
                        <br>
                        <b>Tên:</b> $data[user_name]
                        <br>
                        <b>SĐT:</b> $data[phonenum]
                    </td>
                    <td>
                        <b>Phòng:</b> $data[room_name]
                        <br>
                        <b>Giá:</b> đ$data[price]    
                    </td>
                    <td>
                        <b>Ngày nhận:</b> $checkin
                        <br>
                        <b>Ngày trả:</b> $checkout
                        <br>
                        <b>Tiền:</b> $data[total_pay]
                        <br>
                        <b>Ngày:</b> $date
                    </td>
                    <td>
                        <span class='badge $status_bg'>$data[booking_status]</span>
                    </td>
                </tr>
            ";

            $i++;
        }

        $output = json_encode(["table_data"=>$table_data]);

        echo $output;
    }

?>