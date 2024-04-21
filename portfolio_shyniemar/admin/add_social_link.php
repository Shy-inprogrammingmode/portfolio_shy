<?php
include '../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $platform = $_POST['platform'];
    $link = $_POST['link'];

    $sql = "INSERT INTO social_links (platform, link) VALUES (?, ?)";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$platform, $link]);

    if ($stmt) {
        echo "New social link added successfully";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2];
    }
}
?>

<?php include '../includes/adminheader.php';?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD NEW SOCIAL LINK</h4>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="platform">Platform</label>
                            <select class="form-control" id="platform" name="platform" required>
                                <option value="github">GitHub</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link" required>
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
