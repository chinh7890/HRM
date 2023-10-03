<?php
include 'components/header.php';
include 'components/menu-list.php';





?>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Action History</h2>
                </div>
            </div>
        </div>

        <section id="main-content" style="height: 500px; overflow-y: scroll;">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Name Account</th>
                                        <th>Actions</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_log ORDER BY timestap DESC";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['name_account'] ?></td>
                                            <td><?php echo $row['action'] ?></td>
                                            <td><span class="text-ellipsis"><?php echo date("H:i:s", strtotime($row['timestap'])); ?></span></td>
                                            <td><?php echo date("d/m/Y", strtotime($row['timestap'])); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </section>

    </div>
</div>






<?php
include 'components/footer.php';
?>