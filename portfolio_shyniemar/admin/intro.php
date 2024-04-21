<?php 
include('../includes/adminheader.php');
include '../includes/conn.php';

$sql = "SELECT * FROM intro";
$stmt = $Conn->query($sql);

?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">INTRODUCTION SECTION</h4>
                    <p class="card-description">
                        MANAGE INTRODUCTION
                    </p>
                    <h4 class="card-title mt-5"> </h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date of Birth</th>
                                    <th>Role</th>
                                    <th>Dialect</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if $stmt is not null
                                if ($stmt !== false) {
                                    // Check if any rows were returned
                                    if ($stmt->rowCount() > 0) {
                                        // Loop through the fetched data and display it
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td>" . $row['dob'] . "</td>";
                                            echo "<td>" . $row['role'] . "</td>";
                                            echo "<td>" . $row['dialect'] . "</td>";
                                            echo "<td><img src='" . $row['image'] . "' alt='Image'></td>";
                                            echo "<td>
                                                    <a href='edit_intro.php?id=" . $row['id'] . "' class='btn btn-sm btn-info'>Edit</a>
                                                    <a href='delete_intro.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No data found</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Error fetching data</td></tr>";
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
