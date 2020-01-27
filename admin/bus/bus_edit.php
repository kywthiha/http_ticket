<div class="container-fluid">
    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $bus_id = $_GET['bus_id'];
    $result_bus = mysqli_query($conn, "SELECT * FROM bus WHERE bus_id = '$bus_id'");
    $row_bus = mysqli_fetch_assoc($result_bus);
    $result = mysqli_query($conn, "SELECT * FROM bus_operator");
    ?>
    <?php
    $title = 'Edit Bus';
    include('../header.php');
    ?>
    <section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Bus</h3>
                </div>
                <form action="bus_update.php" method="post" role="form">
                    <input type="hidden" name="bus_id" value="<?php echo $bus_id?>">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bus_operator_name">Bus Operator Name:</label>
                            <select class="form-control selectpicker" name ="bus_operator_id" id="bus_operator_name" data-live-search="true"
                                    title="Select a location" name="destination_id" required>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <option data-tokens="<?php echo $row['bus_operator_name'] ?>" <?php if ($row_bus['bus_operator_id'] == $row['bus_operator_id'] ) echo 'selected' ; ?> value="<?php echo $row['bus_operator_id']?>"><?php echo $row['bus_operator_name']?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bus_type">Bus Type:</label>
                            <select name = 'bus_type' class="form-control selectpicker" title="Select Type" requred>
                                <option value="Standard" <?php if ($row_bus['type'] == 'Standard') echo 'selected' ; ?> >Standard</option>
                                <option value="VIP" <?php if ($row_bus['type'] == 'VIP') echo 'selected' ; ?> >VIP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_of_seat">No of Seat:</label>
                            <input type="number" name="no_of_seat" required min="1" value="<?php echo $row_bus['no_of_seat'] ?>"  class="form-control" required min="1" min="1" max="100" step="1">

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update Bus">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
<?php include('../footer.php');?>
</div>