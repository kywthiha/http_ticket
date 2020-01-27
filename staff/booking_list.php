<?php
session_start();
require_once("../admin/configs/config.php");
require_once "auth/staff_role_check.php";
?>
<?php
$title = "Booking List";
require_once "header.php";
$operator_id = $_SESSION['staff_staff']['operator_id'];
$query = "SELECT traveller.traveller_name,traveller.email,traveller.phone_no,booking.departure_date,schedule.departure_time,route.title,bus_operator.bus_operator_name,bus.no_of_seat,bus.type,booking.status,booking.staff_id,GROUP_CONCAT(ticket.seat_no) AS ticket_seat_no 
 FROM booking 
INNER JOIN traveller ON traveller.traveller_id = booking.traveller_id 
INNER JOIN booking_detail ON booking_detail.booking_id = booking.booking_id 
INNER JOIN ticket ON ticket.t_id = booking_detail.ticket_id 
INNER JOIN schedule ON schedule.s_id = ticket.schedule_id 
INNER JOIN bus ON bus.bus_id = schedule.bus_id 
INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id AND bus_operator.bus_operator_id = '$operator_id'
INNER JOIN route ON route.r_id = schedule.route_id 
GROUP BY booking.booking_id";
$result = mysqli_query($conn, $query);

?>
    <div class="container" style="margin-top:2%;">
        <div class="row justify-content-center">
       <div class="col-md-10">
           <table class="table table-sm">
               <thead>
               <tr>
                   <th>Traveller</th>
                   <th>Date/Time</th>
                   <th>Route</th>
                   <th>Bus</th>
                   <th>Seat No</th>
                   <th>Status</th>
                   <th>Staff_ID</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                   <?php while($row = mysqli_fetch_assoc($result)):?>
               <tr>
                   <td>
                       <small >
                           <?php echo $row['traveller_name'] ?><br>
                           <?php echo $row['email'] ?><br>
                           <?php echo $row['phone_no']?>
                       </small>
                   </td>
                   <td>
                       <small>
                           <?php echo $row['departure_date'] ?><br>
                           <?php echo $row['departure_time'] ?>
                       </small>
                   </td>
                   <td>
                       <small>
                           <?php echo $row['title'] ?>
                       </small>
                   </td>
                   <td class="text-center">
                       <small>
                           <?php echo $row['bus_operator_name'] ?>
                           (<?php echo $row['type'] ?>)<br>
                           No of Seat: <?php echo $row['no_of_seat'] ?>
                       </small>
                   </td>
                   <td class="text-center">
                       <small>
                           <?php echo $row['ticket_seat_no'] ?>
                       </small>
                   </td>
                   <td class="text-center">
                       <small>
                           <?php if($row['status'] == 1): ?>
                               <p  class="text-success border-success">Confirm <span class="badge badge-success"><i class="fa fa-check"></i></span></p>
                           <?php elseif ($row['status'] == 0): ?>
                               <p  class="text-danger border-danger">Pending <span class="badge badge-danger"><i class="fa fa-circle"></i></span></p>
                           <?php endif;?>
                       </small>
                   </td>
                   <td class="text-center">
                       <small>
                           <?php if($row['staff_id']): ?>
                               <p  class="text-primary"><?php echo $row['staff_id'] ?></p>
                           <?php else: ?>
                               <p  class="text-danger border-danger">Online</p>
                           <?php endif;?>
                       </small>
                   </td>
               </tr>
               <?php endwhile; ?>
               </tr>
               </tbody>
           </table>
       </div>
        </div>
    </div>
<?php require_once "footer.php";?>