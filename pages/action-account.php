<?php
    include 'components/header.php';
    include 'components/menu-list.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_admin WHERE account_id = $id;";

        $result = $conn->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $username = $row['username'];
            $role = $row['role'];
        }
    }

    // Pagination variables
    $limit = 10; // Number of records to show per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    $offset = ($page - 1) * $limit; // Offset for database query

    // Query to fetch the data with pagination
    $sql = "SELECT * FROM tb_log WHERE id_account = $id ORDER BY timestap DESC LIMIT $offset, $limit";
    $result = $conn->query($sql);

    // Query to count the total number of records
    $countSql = "SELECT COUNT(*) as total FROM tb_log WHERE id_account = $id";
    $countResult = $conn->query($countSql);
    $countRow = $countResult->fetch_assoc();
    $totalRecords = $countRow['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $limit);
?>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?php echo $username; ?> Action History</h2>
                </div>
            </div>
        </div>

        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                        
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row = $result->fetch_assoc()) {
                                            
                                    ?>
                                    <tr>
                                        <td><?php echo $row['action'] ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($row['timestap'])); ?></td>
                                        <td><span class="text-ellipsis"><?php echo date("H:i:s", strtotime($row['timestap'])); ?></span></td>
                                    </tr>
                                    <?php
                                            
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-5 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">Showing <?php echo $offset + 1; ?>-<?php echo $offset + $result->num_rows; ?> of <?php echo $totalRecords; ?> items</small>
                                </div>
                                <div class="col-sm-7 text-right text-center-xs" style="font-size: 1.25rem;">
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <?php
                                            // Previous page link
                                            if ($page > 1) {
                                                echo '<li><a href="?id=' . $id . '&page=' . ($page - 1) . '"><i class="fa fa-chevron-left" style="margin-right: 20px;"></i></a></li>';
                                            }

                                            // Next page link
                                            if ($page < $totalPages) {
                                                echo '<li><a href="?id=' . $id . '&page=' . ($page + 1) . '"><i class="fa fa-chevron-right"></i></a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </section>
        </section>

    </div>
</div>




                    

<?php
    include 'components/footer.php';
?>