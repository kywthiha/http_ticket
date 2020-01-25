<?php 
$title = "Route List";
include('../header.php');
?>
<h1>Route List</h1>
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$sql = "SELECT * FROM route";
$result = mysqli_query($conn, $sql);
?>
<ul>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<li title="<?php echo $row['title'] ?>">
<?php echo $row['title'] ?> [<a href="route_delete.php?r_id=<?php echo $row['r_id']?>" onclick="return confirm('Are you sure?')">Delete</a>] [<a href="route_edit.php?r_id=<?php echo $row['r_id']?>">Edit</a>]
<ul>
<?php
$route_id = $row['r_id'];
$sql1 = "SELECT * FROM route_detail INNER JOIN city ON city.c_id = route_detail.city_id WHERE route_id = $route_id ORDER BY route_detail.location ASC";
$result1 = mysqli_query($conn, $sql1);
while($row1 = mysqli_fetch_assoc($result1)):
?>
<li>
<?php echo $row1['c_name'] ?>
</li>
<?php endwhile;?>
</ul>
</li>
<?php endwhile; ?>
</ul>
<a href="route_new.php" class="new">New Route</a>
<?php include('../footer.php')?>