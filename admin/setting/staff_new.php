
<div class="container-fluid">
    <?php
    require_once "../configs/auth.php";
    require_once "../configs/config.php";
    require_once "../auth/admin_check_role.php";
    $title ='New Bus Operator';
    include('../header.php');
    $result = mysqli_query($conn, "SELECT * FROM bus_operator");
    ?>
    <section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title text-center">New Staff:</h3>
                </div>
                <form action="staff_add.php" method="post" role="form">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">User Name:</label>
                            <div class="col-sm-5">
                                <input type="text" name="name" class="form-control" id="inputEmail3" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-5">Role:</label>
                            <select class="form-control col-sm-5 selectpicker" id="role"
                                    title="Select a role" name="role" required>
                                <option value="admin">admin</option>
                                <option value="standard">standard</option>
                                <option value="operator">operator</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="bus_operator_name" class="col-sm-5">Bus Operator Name:</label>
                            <select disabled class="form-control col-sm-5" id="bus_operator_name"
                                    title="Select a operator" name="bus_operator_id" required>
                                <option value="" disabled selected>Select operator</option>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <option   value="<?php echo $row['bus_operator_id'] ?>"><?php echo $row['bus_operator_name'] ?></option>
                                <?php endwhile;?>
                                <select class="form-control selectpicker" name = 'bus_operator_id'  requred>

                                </select>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-5 col-form-label">Password:</label>
                            <div class="col-sm-5">
                                <input type="password" name="password" class="form-control" id="password" >
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Password Change">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("select#role").change(function () {
                let role = $(this).val();
                if (role == "operator"){
                    $('select#bus_operator_name').prop('disabled', false);
                }else{
                    $('select#bus_operator_name').prop('disabled', true);
                }
            });
        });
    </script>



    <?php include("../footer.php");?>
</div>