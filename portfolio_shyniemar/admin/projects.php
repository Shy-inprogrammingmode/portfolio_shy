<?php 

include '../includes/conn.php';

// Query to fetch PROJECT data from the database
$sql = "SELECT * FROM project";
$stmt = $Conn->query($sql);


function deleteproject($id) {
    global $Conn;
    $sql = "DELETE FROM project WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$id]);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteproject($id)) {
        echo "Entry deleted successfully.";
    } else {
        echo "Error deleting entry.";
    }
}
?>

<?php
include('../includes/adminheader.php');
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PROJECT SECTION</h4>
                    <p class="card-description">
                        MANAGE PROJECT
                    </p>
                    <div class="mb-4">
                        <a href="../admin/create_projects.php" class="btn btn-primary">Add new</a>
                    </div>
                    <h4 class="card-title mt-5"> </h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Description</th>
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
                                            echo "<td>" . $row['category'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td><img src='" . $row['project_image'] . "' alt='Image'></td>";
                                            echo "<td>
                                                    <a href='?action=delete&id=" . $row['id'] . "' class='btn btn-sm btn-info'>Edit</a>
                                                    <a href='delete_project.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
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
