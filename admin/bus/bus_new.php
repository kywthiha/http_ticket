<div class="container-fluid">
    
<?php 
$title ='New Bus Operator';
include('../header.php');
?>
    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM bus_operator");
    ?>
    <h1>New Bus Operator</h1>
    <form action="bus_add.php" method="post">
    <label for="bus_operator_name">Bus Operator Name:</label>
    <select name = 'bus_operator_id' requred>
    <option value="" selected disabled hidden>Choose City</option>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <option value="<?php echo $row['bus_operator_id']?>"><?php echo $row['bus_operator_name']?></option>
    <?php endwhile;?>
    </select>
    <br>
    <label for="no_of_seat">No of Seat:</label>
    <input type="number" name="no_of_seat" id="" required min="1"><br>
    <label for="bus_type">Type:</label>
    <select name = 'bus_type' requred>
    <option value="Standard">Standard</option>
    <option value="VIP">VIP</option>
    </select>
    <br>
    <input type="submit" value="Add Operator">
    </form>
<?php include("../footer.php");?>
</div>