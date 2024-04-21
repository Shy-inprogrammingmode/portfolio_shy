<?php
// Include the connection file
include '../includes/conn.php';

// Initialize $intro variable
$intro = null;

// Check if ID is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $intro_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Query to fetch introduction data based on the ID
    $sql = "SELECT * FROM intro WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$intro_id]);

    // Fetch the introduction record
    $intro = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the introduction ID from the form
    $intro_id = $_POST['intro_id'];

    // Retrieve the existing introduction data from the database
    $sql_select = "SELECT * FROM intro WHERE id = ?";
    $stmt_select = $Conn->prepare($sql_select);
    $stmt_select->execute([$intro_id]);
    $intro = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($intro) {
        // Retrieve the updated form data
        $intro_name = $_POST['intro_name'];
        $intro_description = $_POST['intro_description'];
        $intro_date_of_birth = $_POST['intro_date_of_birth'];
        $intro_role = $_POST['intro_role'];
        $intro_dialect = $_POST['intro_dialect'];

        // Handle image upload
        if (isset($_FILES["intro_image"]) && $_FILES["intro_image"]["error"] == 0) {
            $file_name = $_FILES["intro_image"]["name"];
            $file_tmp = $_FILES["intro_image"]["tmp_name"];
            $file_size = $_FILES["intro_image"]["size"];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $extensions = array("jpg", "jpeg", "png", "gif");

            if (in_array($file_ext, $extensions)) {
                // Upload file to uploads directory
                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                // Update image path in the database
                $intro_image = "uploads/" . $file_name;
            }
        } else {
            // If no new image uploaded, use the current one
            $intro_image = $_POST['current_image'];
        }

        // Update the introduction data in the database
        $sql_update = "UPDATE intro SET name = ?, description = ?, dob = ?, role = ?, dialect = ?, image = ? WHERE id = ?";
        $stmt_update = $Conn->prepare($sql_update);
        $stmt_update->execute([$intro_name, $intro_description, $intro_date_of_birth, $intro_role, $intro_dialect, $intro_image, $intro_id]);

        if ($stmt_update) {
            // Redirect to the intro.php page after successful update
            header("Location: intro.php");
            exit();
        } else {
            // Handle error if update query fails
            echo "Error updating introduction data";
        }
    } else {
        // Handle error if introduction record not found
        echo "Introduction not found";
    }
}
?>

<?php include '../includes/adminheader.php';?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Introduction</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="intro_id" value="<?php echo isset($intro['id']) ? $intro['id'] : ''; ?>">
                        <div class="form-group">
                            <label for="intro_name">Name</label>
                            <input type="text" class="form-control" id="intro_name" name="intro_name" value="<?php echo isset($intro['name']) ? $intro['name'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="intro_description">Description</label>
                            <textarea class="form-control" id="intro_description" name="intro_description" rows="3"><?php echo isset($intro['description']) ? $intro['description'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="intro_date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" id="intro_date_of_birth" name="intro_date_of_birth" value="<?php echo isset($intro['dob']) ? $intro['dob'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="intro_role">Role</label>
                            <input type="text" class="form-control" id="intro_role" name="intro_role" value="<?php echo isset($intro['role']) ? $intro['role'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="intro_dialect">Dialect</label>
                            <input type="text" class="form-control" id="intro_dialect" name="intro_dialect" value="<?php echo isset($intro['dialect']) ? $intro['dialect'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="intro_image">Image</label>
                            <input type="file" class="form-control-file" id="intro_image" name="intro_image">
                            <input type="hidden" name="current_image" value="<?php echo isset($intro['image']) ? $intro['image'] : ''; ?>">
                            <?php if (!empty($intro['image'])): ?>
                                <img src="<?php echo $intro['image']; ?>" alt="Current Image" style="max-width: 200px; margin-top: 10px;">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="intro.php" class="btn btn-secondary">Back</a>
                    </form>
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
