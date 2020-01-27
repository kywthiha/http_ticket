<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$result = mysqli_query($conn, "SELECT * FROM bus INNER JOIN bus_operator ON bus.bus_operator_id = bus_operator.bus_operator_id");
?>
<?php
$title = 'Bus List';
include('../header.php');
?>
<section class="content">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bus List <a class="btn-sm btn-primary" href="bus_new.php"><i class="fa fa-plus"></i>New Bus</a></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bus</a></li>
                            <li class="breadcrumb-item active">Bus List</li>
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
                                <th>Bus ID</th>
                                <th>Bus Name</th>
                                <th>No of Seat</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['bus_id'] ?></td>
                                    <td><?php echo $row['bus_operator_name'] ?></td>
                                    <td><?php echo $row['no_of_seat'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td>
                                        <a class="btn-sm btn-primary" href="bus_edit.php?bus_id=<?php echo $row['bus_id']?>">Edit</a>
                                        <a class="btn-sm btn-danger" href="bus_delete.php?bus_id=<?php echo $row['bus_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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

