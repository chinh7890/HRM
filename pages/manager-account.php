<?php

include 'components/header.php';
include 'components/menu-list.php';
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Account List</h2>
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo "<div class='alert alert-success alert-dismissable'>";
                        echo "Update success.";
                        echo "</div>";
                        unset($_SESSION['success_message']);
                    }

                    ?>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">

            <!-- ============================================================== -->
            <!-- data table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <th>Actions</th>
                                    <th>Account Id</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("../connect.php");
                                    $sql = "SELECT * FROM tb_admin";

                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="btn-group ml-auto">
                                                    <a href="./update-account.php?id=<?php echo $row["account_id"] ?>" class="btn btn-sm btn-outline-light mr-1"><i class="fa fa-eye"></i></a>

                                                    <!-- <a data-toggle="modal" data-target="#exampleModal" data-id="" class="btn btn-sm btn-outline-light"><i class="far fa-trash-alt"></i></a> -->

                                                </div>
                                            </td>
                                            <td><?php echo $row['account_id']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['role']; ?></td>




                                        </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Actions</th>
                                        <th>Account Id</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end data table  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © -----------. All rights reserved. Dashboard by <a
                                href="https://colorlib.com/wp/">Colorlib</a>.
                        </div> -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>

<?php
include 'components/footer.php';
?>