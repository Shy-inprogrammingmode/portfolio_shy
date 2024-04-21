<?php
include '../includes/conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year_range = $_POST['year_range'];
    $institution = $_POST['institution'];
    $description = $_POST['description'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO education (year_range, institution, description) 
            VALUES (?, ?, ?)";

    $stmt = $Conn->prepare($sql);
    $stmt->execute([$year_range, $institution, $description]);

    if ($stmt) {
        echo "New record created successfully";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2]; 
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
                        <h4 class="card-title">EDUCATION SECTION</h4>
                        <p class="card-description">
                            Add, delete, and update education information
                        </p>
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
