<?php

include('../includes/conn.php');

// Function to fetch a specific education entry based on ID
function fetchEducationEntry($id) {
    global $Conn;
    $sql = "SELECT * FROM education WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update an education entry
function updateEducationEntry($id, $year_range, $institution, $description) {
    global $Conn;
    $sql = "UPDATE education SET year_range = ?, institution = ?, description = ? WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$year_range, $institution, $description, $id]);
}

// Handle form submission for updating an education entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $year_range = $_POST['year_range'];
    $institution = $_POST['institution'];
    $description = $_POST['description'];

    if (updateEducationEntry($id, $year_range, $institution, $description)) {
        header("Location: education.php");
        exit();
    } else {
        echo "Error updating entry.";
    }
}

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the education entry based on the provided ID
    $entry = fetchEducationEntry($id);
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
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Education Entry</h4>
                    <form method="post" action="">
                        <!-- Hidden input field to store the entry ID -->
                        <input type="hidden" name="id" value="<?php echo $entry['id']; ?>">
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

