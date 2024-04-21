<?php
include '../includes/conn.php'; 

// Function to fetch all technical skills
function fetchTechnicalSkills() {
    global $Conn;
    $sql = "SELECT * FROM technical";
    $stmt = $Conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a technical skill
function deleteTechnicalSkill($id) {
    global $Conn;
    $sql = "DELETE FROM technical WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$id]);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "Deleting skill with ID: $id"; // Add this line for debugging
    if (deleteTechnicalSkill($id)) {
        echo "Technical skill deleted successfully.";
    } else {
        echo "Error deleting technical skill.";
    }
}

// Function to update a technical skill
function updateTechnicalSkill($id, $category, $skill_name, $tech_skills) {
    global $Conn;
    $sql = "UPDATE technical SET category = ?, skill_name = ?, tech_skills = ? WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$category, $skill_name, $tech_skills, $id]);
}

// Handling form submission to add new technical skill
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $skill_name = $_POST['skill_name'];
    $tech_skills = $_POST['tech_skills'];

    $sql = "INSERT INTO technical (category, skill_name, tech_skills) VALUES (?, ?, ?)";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$category, $skill_name, $tech_skills]);

    if ($stmt) {
        echo "New technical skill created successfully";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2]; 
    }
}

// Fetch all technical skills
$technicalSkills = fetchTechnicalSkills();
?>

<?php include '../includes/adminheader.php'; ?>
<!-- 
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
                                <option value="Tech Skills">Tech Skills</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tech_skills">Technical Skills</label>
                            <input type="text" class="form-control" id="tech_skills" name="tech_skills" placeholder="Enter technical skills">
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
    </div> -->
    
    <!-- Display existing technical skills in a table -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Technical Skills</h4>
                    <div class="mb-4">
                        <a href="create_technical.php" class="btn btn-primary">Add New</a>
                         </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Skill Name</th>
                                <th>Technical Skills</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($technicalSkills as $skill): ?>
                                <tr>
                                    <td><?php echo $skill['category']; ?></td>
                                    <td><?php echo $skill['skill_name']; ?></td>
                                    <td><?php echo $skill['tech_skills']; ?></td>
                                    <td>
                                        <a href="?action=delete&id=<?php echo $skill['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="edit_technical.php?id=<?php echo $skill['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
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
