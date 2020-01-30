<div class="container-fluid">

    <?php
    require_once('configs/auth.php');
    require_once("configs/config.php");
    require_once "auth/standard_check_role.php";
    $result = mysqli_query($conn,"SELECT count(booking_id) as b_count FROM booking");
    $b_count = mysqli_fetch_assoc($result)['b_count'];
    $result = mysqli_query($conn,"SELECT count(r_id) as r_count FROM route");
    $route_count = mysqli_fetch_assoc($result)['r_count'];
    $result = mysqli_query($conn,"SELECT count(bus_id) as bus_count FROM bus");
    $bus_count = mysqli_fetch_assoc($result)['bus_count'];
    $result = mysqli_query($conn,"SELECT count(c_id) as c_count FROM city");
    $c_count = mysqli_fetch_assoc($result)['c_count'];
    ?>
    <?php
    $title ='Dashordr';
    include('header.php');
    ?>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $b_count?></h3>

                    <p>New Booking Today</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $route_count?></h3>

                    <p>Route</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $bus_count?></h3>

                    <p>Bus</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $c_count ?></h3>

                    <p>City</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>



    <?php include("footer.php");?>
</div>