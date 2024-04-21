<?php
include '../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $intro_name = $_POST['intro_name'];
    $intro_description = $_POST['intro_description'];
    $intro_date_of_birth = $_POST['intro_date_of_birth'];
    $intro_role = $_POST['intro_role'];
    $intro_dialect = $_POST['intro_dialect'];

    // Check if file was uploaded without errors
    if(isset($_FILES["intro_image"]) && $_FILES["intro_image"]["error"] == 0){
        $file_name = $_FILES["intro_image"]["name"];
        $file_tmp = $_FILES["intro_image"]["tmp_name"];
        $file_size = $_FILES["intro_image"]["size"];
        
        // Get file extension
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions = array("jpg","jpeg","png","gif");

        if(in_array($file_ext, $extensions) === false){
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Upload file to uploads directory
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            
            // SQL query to insert data into the database
            $sql = "INSERT INTO intro (name, description, dob, role, dialect, image) 
                    VALUES (?, ?, ?, ?, ?, ?)";
    
            $stmt = $Conn->prepare($sql);
            $stmt->execute([$intro_name, $intro_description, $intro_date_of_birth, $intro_role, $intro_dialect, "uploads/" . $file_name]);
    
            if ($stmt) {
                echo "New record created successfully";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error: " . $errorInfo[2]; 
            }
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<?php include '../includes/adminheader.php';?>

<style>
    .row{
       margin-left: auto;
    }
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">INTRODUCTION SECTION</h4>
                    <p class="card-description">
                        Add, delete, and update introduction information
                    </p>
                    <form method="post" action="contact.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="intro_name">Name</label>
                            <input type="text" class="form-control" id="intro_name" name="intro_name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="intro_description">Description</label>
                            <textarea class="form-control" id="intro_description" name="intro_description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="intro_date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" id="intro_date_of_birth" name="intro_date_of_birth">
                        </div>
                        <div class="form-group">
                            <label for="intro_role">Role</label>
                            <input type="text" class="form-control" id="intro_role" name="intro_role" placeholder="Enter role">
                        </div>
                        <div class="form-group">
                            <label for="intro_dialect">Dialect</label>
                            <input type="text" class="form-control" id="intro_dialect" name="intro_dialect" placeholder="Enter dialect">
                        </div>
                        <div class="form-group">
                            <label for="intro_image">Image</label>
                            <input type="file" class="form-control" id="intro_image" name="intro_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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
