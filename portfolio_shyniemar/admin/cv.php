<?php 
include('../includes/adminheader.php');
include '../includes/conn.php';

$sql = "SELECT * FROM cv";
$stmt = $Conn->query($sql);



?>


<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MANAGE CVs</h4>
                    <p class="card-description">
                        MANAGE CVs
                    </p> <div class="mb-4">
                        <a href="create_cv.php" class="btn btn-primary">Add New</a>
                         </div>
                    <h4 class="card-title mt-5"> </h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CV File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($stmt !== false) {
                                    if ($stmt->rowCount() > 0) {
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['cv_file'] . "</td>";
                                            echo "<td>
                                                    <a href='edit_cv.php?id=" . $row['id'] . "' class='btn btn-sm btn-info'>Edit</a>
                                                    <a href='delete_cv.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                                    </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No data found</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Error fetching data</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
</body>
</html>
