<?php
include '../includes/conn.php'; 

// Function to fetch all education entries
function fetchEducationEntries() {
    global $Conn;
    $sql = "SELECT * FROM education";
    $stmt = $Conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete an education entry
function deleteEducationEntry($id) {
    global $Conn;
    $sql = "DELETE FROM education WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$id]);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteEducationEntry($id)) {
        echo "Entry deleted successfully.";
    } else {
        echo "Error deleting entry.";
    }
}

// Handling form submission to add new education entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year_range = $_POST['year_range'];
    $institution = $_POST['institution'];
    $description = $_POST['description'];

    $sql = "INSERT INTO education (year_range, institution, description) VALUES (?, ?, ?)";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$year_range, $institution, $description]);

    if ($stmt) {
        echo "New record created successfully";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2]; 
    }
}

// Fetch all education entries
$educationEntries = fetchEducationEntries();
?>

<?php include '../includes/adminheader.php'; ?>
<!-- 
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="year_range">Year Range</label>
                            <input type="text" class="form-control" id="year_range" name="year_range" placeholder="Enter year range">
                        </div>
                        <div class="form-group">
                            <label for="institution">Institution</label>
                            <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter institution name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Display existing education entries in a table -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Education</h4>
                    <div class="mb-4">
                        <a href="create_education.php" class="btn btn-primary">Add New</a>
                         </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Year Range</th>
                                <th>Institution</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($educationEntries as $entry): ?>
                                <tr>
                                    <td><?php echo $entry['year_range']; ?></td>
                                    <td><?php echo $entry['institution']; ?></td>
                                    <td><?php echo $entry['description']; ?></td>
                                    <td>
                                        <!-- Delete button -->
                                        <a href="?action=delete&id=<?php echo $entry['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        <!-- Edit button (link to edit_education.php) -->
                                        <a href="edit_education.php?id=<?php echo $entry['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
