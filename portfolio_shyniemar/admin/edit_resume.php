<?php 

include '../includes/conn.php';

function fetchResumeEntry($id) {
    global $Conn;
    $sql = "SELECT * FROM resume WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateResumeEntry($id, $category, $year_range, $institution, $description,$hashtags, $dialect = null, $fluency = null, $hobbies = null) {
    global $Conn;
    $sql = "UPDATE resume SET category = ?, year_range = ?, institution = ?, description = ?, hashtags = ?, dialect = ?, fluency = ?, hobbies = ? WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$category, $year_range, $institution, $description, $hashtags, $dialect, $fluency, $hobbies, $id]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $year_range = $_POST['year_range'];
    $institution = $_POST['institution'];
    $description = $_POST['description'];

    // Check if the category is 'Languages' or 'Hobbies' and get their respective values
    $dialect = isset($_POST['dialect']) ? $_POST['dialect'] : null;
    $fluency = isset($_POST['fluency']) ? $_POST['fluency'] : null;
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : null;
    $hashtags = isset($_POST['hashtags']) ? $_POST['hashtags'] : null;

    if (updateResumeEntry($id, $category, $year_range, $institution, $description,  $hashtags, $dialect, $fluency, $hobbies)) {
        header("Location: resume.php");
        exit();
    } else {
        echo "Error updating entry.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $entry = fetchResumeEntry($id);
    if (!$entry) {
        echo "Entry not found.";
        exit();
    }
} else {
    echo "Entry ID not provided.";
    exit();
}
?>

<?php 
include('../includes/adminheader.php');?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Resume Entry</h4>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $entry['id']; ?>">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $entry['category']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="year_range">Year Range</label>
                            <input type="text" class="form-control" id="year_range" name="year_range" value="<?php echo $entry['year_range']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="institution">Institution</label>
                            <input type="text" class="form-control" id="institution" name="institution" value="<?php echo $entry['institution']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?php echo $entry['description']; ?></textarea>
                        </div>
                        <!-- Conditional display for languages -->
                        <?php if ($entry['category'] === 'Languages'): ?>
                            <div class="form-group">
                                <label for="dialect">Dialect</label>
                                <input type="text" class="form-control" id="dialect" name="dialect" value="<?php echo $entry['dialect']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="fluency">Fluency</label>
                                <input type="text" class="form-control" id="fluency" name="fluency" value="<?php echo $entry['fluency']; ?>">
                            </div>
                        <?php endif; ?>
                        <!-- Conditional display for hobbies -->
                        <?php if ($entry['category'] === 'Hobbies'): ?>
                            <div class="form-group">
                                <label for="hobbies">Hobbies</label>
                                <input type="text" class="form-control" id="hobbies" name="hobbies" value="<?php echo $entry['hobbies']; ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ($entry['category'] === 'Hashtags'): ?>
                            <div class="form-group">
                                <label for="hashtags">Hashtags</label>
                                <input type="text" class="form-control" id="hashtags" name="hashtags" value="<?php echo $entry['hashtags']; ?>">
                            </div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-primary">Update</button>
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
