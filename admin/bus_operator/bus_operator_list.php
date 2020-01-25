<?php 
$title = "Bus Operator List";
include('../header.php');
?>
<h1>Bus Operator List</h1>
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$result = mysqli_query($conn, "SELECT * FROM bus_operator");
?>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone No</th>
<th>Action</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $row['bus_operator_name'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['phone_no'] ?></td>
    <td>
    <a href="bus_operator_edit.php?bus_operator_id=<?php echo $row['bus_operator_id']?>">Edit</a>
    <a href="bus_operator_delete.php?bus_operator_id=<?php echo $row['bus_operator_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<br>
<a href="bus_operator_new.php" class="new">New Bus Operator</a>
<?php include('../footer.php')?>