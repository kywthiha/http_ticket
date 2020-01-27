
<?php
require_once('../configs/auth.php');
require_once "../auth/standard_check_role.php";
?>
<?php
$title = "New Bus Operator";
include('../header.php');?>
    <section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Bus Operator</h3>
                </div>
                <form action="bus_operator_add.php" method="post" role="form">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bus_operator_name">Name:</label>
                            <input class="form-control" type="text" name="bus_operator_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" required><br>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone no:</label>
                            <input type="tel" class="form-control" name="phone_no" id="" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Operator" class="btn btn-primary">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
<?php include('../footer.php')?>