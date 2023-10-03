<?php
session_start();
include 'components/header.php';
?>
<!--  -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">

                        <h2 class="pageheader-title">Dashboard</h2>
                    </div>
                </div>
            </div>

            <div class="ecommerce-widget">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM tb_employee";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Employee</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count; ?>
                                    </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM tb_job_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Job Category</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM tb_team";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Team</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count ?>
                                    </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM tb_level";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Level</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count ?>
                                    </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM tb_position";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Position</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count; ?>
                                    </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM tb_location";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Location</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM tb_country";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Country</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count ?>
                                    </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM tb_contract";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Contract</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php echo $count ?>
                                    </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end total orders  -->
                    <!-- ============================================================== -->
                </div>


            </div>
        </div>
    </div>

</div>

<?php
include 'components/menu-list.php';
?>
</div>
<?php
include 'components/footer.php';
?>