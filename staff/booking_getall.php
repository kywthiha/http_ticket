<?php
require_once('../admin/configs/config.php');
if(!isset($_GET['departure_date'],$_GET['bus_operator_id'])){
    die("Un authorize");
}
$departure_date = $_GET['departure_date'];
$bus_operator_id = $_GET['bus_operator_id'];
$query = "SELECT traveller.traveller_name,traveller.email,traveller.phone_no,booking.departure_date,schedule.departure_time,route.title,bus_operator.bus_operator_name,bus.no_of_seat,bus.type,booking.status,booking.staff_id,GROUP_CONCAT(ticket.seat_no) AS ticket_seat_no 
 FROM booking 
INNER JOIN traveller ON traveller.traveller_id = booking.traveller_id AND booking.departure_date = '$departure_date'
INNER JOIN booking_detail ON booking_detail.booking_id = booking.booking_id 
INNER JOIN ticket ON ticket.t_id = booking_detail.ticket_id 
INNER JOIN schedule ON schedule.s_id = ticket.schedule_id 
INNER JOIN bus ON bus.bus_id = schedule.bus_id 
INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id AND bus_operator.bus_operator_id = '$bus_operator_id'
INNER JOIN route ON route.r_id = schedule.route_id 
GROUP BY booking.booking_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if ($row){
    echo json_encode($row);
}