<?php
include '../includes/conn.php';

// Check if the social link ID is provided in the URL
if (isset($_GET['id'])) {
    $social_link_id = $_GET['id'];
    
    // Query to fetch the social link details from the database
    $sql = "SELECT platform, link FROM social_links WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$social_link_id]);
    $social_link_row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if the social link exists
    if ($stmt->rowCount() > 0) {
        $platform = $social_link_row['platform'];
        $link = $social_link_row['link'];
    } else {
        // Redirect to manage page if social link does not exist
        header("Location: manage_social_links.php");
        exit();
    }
} else {
    // Redirect to manage page if social link ID is not provided
    header("Location: manage_social_links.php");
    exit();
}
?>

<?php include '../includes/adminheader.php';?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT SOCIAL LINK</h4>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="platform">Platform</label>
                            <input type="text" class="form-control" id="platform" name="platform" value="<?php echo $platform; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link" value="<?php echo $link; ?>" required>
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