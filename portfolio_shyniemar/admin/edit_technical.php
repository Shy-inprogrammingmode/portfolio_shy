<?php 

include '../includes/conn.php';

// Function to fetch a specific technical skill
function fetchTechnicalSkill($id) {
    global $Conn;
    $sql = "SELECT * FROM technical WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update a technical skill
function updateTechnicalSkill($id, $category, $skill_name, $tech_skills) {
    global $Conn;
    $sql = "UPDATE technical SET category = ?, skill_name = ?, tech_skills = ? WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$category, $skill_name, $tech_skills, $id]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $skill_name = $_POST['skill_name'];
    $tech_skills = $_POST['tech_skills'];

    if (updateTechnicalSkill($id, $category, $skill_name, $tech_skills)) {
        header("Location: technical.php");
        exit();
    } else {
        echo "Error updating technical skill.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $skill = fetchTechnicalSkill($id);
    if (!$skill) {
        echo "Technical skill not found.";
        exit();
    }
} else {
    echo "Technical skill ID not provided.";
    exit();
}
?>
<?php 
include('../includes/adminheader.php');
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Technical Skill</h4>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $skill['id']; ?>">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="Software Skills" <?php echo ($skill['category'] === 'Software Skills') ? 'selected' : ''; ?>>Software Skills</option>
                                <option value="Coding Skills" <?php echo ($skill['category'] === 'Coding Skills') ? 'selected' : ''; ?>>Coding Skills</option>
                                <option value="Tech Skills" <?php echo ($skill['category'] === 'Tech Skills') ? 'selected' : ''; ?>>Tech Skills</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skill_name">Skill Name</label>
                            <input type="text" class="form-control" id="skill_name" name="skill_name" value="<?php echo $skill['skill_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tech_skills">Technical Skills</label>
                            <input type="text" class="form-control" id="tech_skills" name="tech_skills" value="<?php echo $skill['tech_skills']; ?>">
                        </div>
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
