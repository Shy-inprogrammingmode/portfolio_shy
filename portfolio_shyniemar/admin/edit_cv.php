<?php 

include '../includes/conn.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_cv.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM cv WHERE id = ?";
$stmt = $Conn->prepare($sql);
$stmt->execute([$id]);
$cv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cv) {
    header("Location: manage_cv.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["cv_file"]) && $_FILES["cv_file"]["error"] == 0) {
        $file_name = $_FILES["cv_file"]["name"];
        $file_tmp = $_FILES["cv_file"]["tmp_name"];
        $file_size = $_FILES["cv_file"]["size"];

        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        
        $sql = "UPDATE cv SET cv_file = ? WHERE id = ?";
        $stmt = $Conn->prepare($sql);
        $stmt->execute(["uploads/" . $file_name, $id]);

        if ($stmt) {
            echo "CV updated successfully";
            header("Location: cv.php");
            exit();
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2]; 
        }
    } else {
        echo "Sorry, there was an error uploading your CV file.";
    }
}
?>
<?php  include('../includes/adminheader.php');?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit CV</h4>
                    <div class="mb-4">
                        <a href="manage_cv.php" class="btn btn-primary">Back to Manage CVs</a>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cv_file">CV File</label>
                            <input type="file" class="form-control" id="cv_file" name="cv_file" value="<?php echo $cv['cv_file']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update CV</button>
                    </form>
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
