    <?php 
    include('../includes/adminheader.php');
    include '../includes/conn.php';

    function fetchResumeEntries() {
        global $Conn;
        $sql = "SELECT * FROM resume";
        $stmt = $Conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteResumeEntry($id) {
        global $Conn;
        $sql = "DELETE FROM resume WHERE id = ?";
        $stmt = $Conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if (deleteResumeEntry($id)) {
            echo "Entry deleted successfully.";
        } else {
            echo "Error deleting entry.";
        }
    }

    $entries = fetchResumeEntries();
    ?>

<style>
    .card{
        max-width: 100%;
        overflow-y: auto;
    }
</style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-15 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Resume Entries</h4>
                        <p class="card-description">
                            Add, delete, and update resume entries
                        </p>
                        <div class="mb-4">
                        <a href="create_resume.php" class="btn btn-primary">Add New</a>
                         </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Year Range</th>
                                    <th>Institution</th>
                                    <th>Description</th>
                                    <th>hashtags</th>
                                    <th>dialect</th>
                                    <th>fluency</th>
                                    <th>hobbies</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($entries as $entry): ?>
                                    <tr>
                                        <td><?php echo $entry['category']; ?></td>
                                        <td><?php echo $entry['year_range']; ?></td>
                                        <td><?php echo $entry['institution']; ?></td>
                                        <td><?php echo $entry['description']; ?></td>
                                        <td><?php echo $entry['hashtags']; ?></td>
                                        <td><?php echo $entry['dialect']; ?></td>
                                        <td><?php echo $entry['fluency']; ?></td>
                                        <td><?php echo $entry['hobbies']; ?></td>
                                        <td>
                                            <a href="?action=delete&id=<?php echo $entry['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="edit_resume.php?id=<?php echo $entry['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
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
