<?php
include '../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $description = $_POST['description'];

    if(isset($_FILES["project_image"]) && $_FILES["project_image"]["error"] == 0){
        $file_name = $_FILES["project_image"]["name"];
        $file_tmp = $_FILES["project_image"]["tmp_name"];
        $file_size = $_FILES["project_image"]["size"];
        
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpg","jpeg","png","gif");

        if(in_array($file_ext, $extensions) === false){
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            
            $sql = "INSERT INTO project (category, description, project_image) 
                    VALUES (?, ?, ?)";
    
            $stmt = $Conn->prepare($sql);
            $stmt->execute([$category, $description, "uploads/" . $file_name]);
    
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
                    <h4 class="card-title">PROJECTS SECTION</h4>
                    <p class="card-description">
                        Add, delete, and update PROJECTS 
                    </p>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category">CATEGORY</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="project_image">Project image</label>
                            <input type="file" class="form-control" id="project_image" name="project_image">
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
