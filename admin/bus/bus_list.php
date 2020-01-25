<div class="container-fluid">
<?php
$title = 'Bus List';
include('../header.php');
?>
<h1 class="h1">Bus List</h1>
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$result = mysqli_query($conn, "SELECT * FROM bus INNER JOIN bus_operator ON bus.bus_operator_id = bus_operator.bus_operator_id");
?>
<table>
<tr>
<th>Bus ID</th>
<th>Bus Name</th>
<th>No of Seat</th>
<th>Type</th>
<th>Action</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $row['bus_id'] ?></td>
    <td><?php echo $row['bus_operator_name'] ?></td>
    <td><?php echo $row['no_of_seat'] ?></td>
    <td><?php echo $row['type'] ?></td>
    <td>
    <a href="bus_edit.php?bus_id=<?php echo $row['bus_id']?>">Edit</a>
    <a href="bus_delete.php?bus_id=<?php echo $row['bus_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<br>

<a href="bus_new.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New Bus</a>
<?php include("../footer.php");?>
</div>