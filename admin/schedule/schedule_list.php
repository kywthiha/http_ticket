<?php 
$title = "Schedule List";
include('../header.php');
?>
<h1>Schedule List</h1>
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$result = mysqli_query($conn, "SELECT * FROM schedule INNER JOIN route ON route.r_id = schedule.route_id INNER JOIN bus ON bus.bus_id = schedule.bus_id INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id");
?>
<table>
<tr>
<th>Schedule ID</th>
<th>Route</th>
<th>Bus</th>
<th>Departure Time</th>
<th>Arrival Time</th>
<th>Price</th>
<th>Action</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $row['s_id'] ?></td>
    <td><?php echo $row['title'] ?></td>
    <td><?php echo $row['bus_operator_name'] ?>_<?php echo $row['bus_id'] ?> (<?php echo $row['type'] ?>)</td>
    <td><?php echo $row['departure_time'] ?></td>
    <td><?php echo $row['arrival_time'] ?></td>
    <td><?php echo $row['price'] ?></td>
    <td>
    <a href="schedule_edit.php?s_id=<?php echo $row['s_id']?>">Edit</a>
    <a href="schedule_delete.php?s_id=<?php echo $row['s_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<br>
<a href="schedule_new.php" class="new">New Schedule</a>
<?php include('../footer.php')?>