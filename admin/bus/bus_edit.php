<div class="container-fluid">
<?php
$title = 'Edit Bus';
include('../header.php');
?>
    <h1>Edit Bus</h1>
    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $bus_id = $_GET['bus_id'];
    $result_bus = mysqli_query($conn, "SELECT * FROM bus WHERE bus_id = '$bus_id'");
    $row_bus = mysqli_fetch_assoc($result_bus);
    $result = mysqli_query($conn, "SELECT * FROM bus_operator");
    ?>
    <form action="bus_update.php" method="post">
    <input type="hidden" name="bus_id" value="<?php echo $bus_id?>">
    <label for="bus_operator_name">Bus Operator Name:</label>
    <select name = 'bus_operator_id' requred>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <option <?php if ($row_bus['bus_operator_id'] == $row['bus_operator_id'] ) echo 'selected' ; ?> value="<?php echo $row['bus_operator_id']?>"><?php echo $row['bus_operator_name']?></option>
    <?php endwhile;?>
    </select>
    <br>
    <label for="no_of_seat">No of Seat:</label>
    <input type="number" name="no_of_seat" id="" required min="1" value="<?php echo $row_bus['no_of_seat'] ?>"><br>
    <label for="bus_type">Type:</label>
    <?php echo $row_bus['type'] ?>
    <select name = 'bus_type' requred>
    <option value="Standard" <?php if ($row_bus['type'] == 'Standard') echo 'selected' ; ?> >Standard</option>
    <option value="VIP" <?php if ($row_bus['type'] == 'VIP') echo 'selected' ; ?> >VIP</option>
    </select>
    <br>
    <input type="submit" value="Update Bus">
    </form>
<?php include('../footer.php');?>
</div>