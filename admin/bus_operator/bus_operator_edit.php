
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$bus_operator_id = $_GET['bus_operator_id'];
$result = mysqli_query($conn, "SELECT * FROM bus_operator WHERE bus_operator_id = $bus_operator_id");
$row = mysqli_fetch_assoc($result);
?>
<?php
$title = "Edit Bus Operator";
include('../header.php');?>
<section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Bus Operator</h3>
                </div>
                <form action="bus_operator_update.php" method="post" role="form">
                    <input type="hidden" name="bus_operator_id" value="<?php echo $row['bus_operator_id']?>">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bus_operator_name">Name:</label>
                            <input class="form-control" type="text" name="bus_operator_name" required value="<?php echo $row['bus_operator_name']?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" required value="<?php echo $row['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone no:</label>
                            <input type="tel" class="form-control" name="phone_no" id="" required  value="<?php echo $row['phone_no']?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Operator" class="btn btn-primary">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
<?php include('../footer.php')?>