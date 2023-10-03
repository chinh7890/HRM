<?php

include 'components/header.php';
include 'components/menu-list.php';

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_admin WHERE account_id = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $roleacc = $row['role'];
    }
}
?>
<div class="dashboard-wrapper">
    <div class"container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Update Account</h2>
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo "<div class='alert alert-error alert-dismissable'>";
                        echo "Update error!";
                        echo "</div>";
                        unset($_SESSION['error_message']);
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

                        <form action="./update-account-handle.php?id=<?php echo $id; ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name Account</label>

                                <input type="text" class="form-control" id="exampleFormControlInput1" disabled name="username" placeholder="<?php echo $username; ?>" value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="role">

                                    <?php
                                    $roleList = array(
                                        array('role' => 'user'),
                                        array('role' => 'admin'),
                                        array('role' => 'super'),
                                    );
                                    ?>
                                    <?php foreach ($roleList as $role) : ?>
                                        <option value="<?php echo $role['role']; ?>" <?php echo ($role['role'] == $roleacc) ? 'selected' : ''; ?>><?php echo $role['role']; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>



                        </form>

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

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>

<?php
include 'components/footer.php';
?>