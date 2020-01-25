<?php 
$title = "City list";
include('../header.php');
?>
<h1>City List</h1>
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$result = mysqli_query($conn, "SELECT * FROM city");
?>
<ul>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<li title="<?php echo $row['c_name'] ?>">
<?php echo $row['c_name'] ?> [<a href="city_delete.php?c_id=<?php echo $row['c_id']?>" onclick="return confirm('Are you sure?')">Delete</a>] [<a href="city_edit.php?c_id=<?php echo $row['c_id']?>">Edit</a>]
</li>
<?php endwhile; ?>
</ul>
<a href="city_new.php" class="new">New City</a>
<?php include('../footer.php')?>