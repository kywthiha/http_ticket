<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
require_once "../auth/standard_check_role.php";
$result = mysqli_query($conn, "SELECT * FROM bus_operator");
?>
<?php
$title = "Bus Operator List";
include('../header.php');
?>
<section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Bus Operator List <a class="btn-sm btn-primary" href="bus_operator_new.php"><i class="fa fa-plus"></i>New Bus Operator</a></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Bus Operator</a></li>
                                <li class="breadcrumb-item active">Bus Operator List</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main row -->
            <div class="row justify-content-center">
                <!-- Left col -->
                <section class="col-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <table id="admin_data_table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo $row['bus_operator_name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone_no'] ?></td>
                                        <td>
                                            <a href="bus_operator_edit.php?bus_operator_id=<?php echo $row['bus_operator_id']?>" class="btn-sm btn-primary">Edit</a>
                                            <a href="bus_operator_delete.php?bus_operator_id=<?php echo $row['bus_operator_id']?>" class="btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>

                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<?php include('../footer.php')?>