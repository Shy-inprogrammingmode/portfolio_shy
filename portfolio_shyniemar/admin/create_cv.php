<?php
include '../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_FILES["cv_file"]) && $_FILES["cv_file"]["error"] == 0){
        $file_name = $_FILES["cv_file"]["name"];
        $file_tmp = $_FILES["cv_file"]["tmp_name"];
        $file_size = $_FILES["cv_file"]["size"];
        

        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        
        $sql = "INSERT INTO cv (cv_file) 
                VALUES (?)";

        $stmt = $Conn->prepare($sql);
        $stmt->execute(["uploads/" . $file_name]);

        if ($stmt) {
            echo "New CV added successfully";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2]; 
        }
    } else {
        echo "Sorry na uwu.";
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
                    <h4 class="card-title">ADD NEW CV</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cv_file">CV File</label>
                            <input type="file" class="form-control" id="cv_file" name="cv_file">
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
