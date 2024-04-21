<?php
include '../includes/conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $skill_name = $_POST['skill_name'];
    $tech_skills= $_POST['tech_skills'];

    $sql = "INSERT INTO technical (category, skill_name, tech_skills) 
            VALUES (?, ?, ?)";

    $stmt = $Conn->prepare($sql);
    $stmt->execute([$category, $skill_name, $tech_skills]);

    if ($stmt) {
        echo "New technical skill created successfully";
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
                    <h4 class="card-title">TECHNICAL SKILLS SECTION</h4>
                    <p class="card-description">
                        Add, delete, and update technical skills information
                    </p>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="Software Skills">Software Skills</option>
                                <option value="Coding Skills">Coding Skills</option>
                                <option value="tech Skills">Tech Skills</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- <label for="tech_skills">Technical Skills</label> -->
                            <input type="hidden" class="form-control" id="tech_skills" name="tech_skills" placeholder="Enter technical skills">
                        </div>

                        <div class="form-group">
                            <label for="skill_name">Skill Name</label>
                            <input type="text" class="form-control" id="skill_name" name="skill_name" placeholder="Enter skill name">
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
