<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
require_once "../auth/standard_check_role.php";
$result = mysqli_query($conn, "SELECT id,name,role,operator_id,staff_id,bus_operator_name FROM staff LEFT JOIN bus_operator ON bus_operator.bus_operator_id = staff.operator_id");
?>
<?php
$title = 'Staff List';
include('../header.php');
?>
<section class="content">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Staff List <a class="btn-sm btn-primary" href="staff_new.php"><i class="fa fa-plus"></i>New Staff</a></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Staff</a></li>
                            <li class="breadcrumb-item active">Staff List</li>
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
                                <th>Role</th>
                                <th>Operator</th>
                                <th>Staff ID</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                    <td><?php echo $row['bus_operator_name'] ?></td>
                                    <td><?php echo $row['staff_id'] ?></td>
                                    <td>
                                        <a class="btn-sm btn-danger" href="staff_delete.php?staff_id=<?php echo $row['id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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
<?php include("../footer.php");?>


