<?php
include '../includes/conn.php';

$contact = null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM contact WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$contact_id]);

    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql_select = "SELECT * FROM contact WHERE id = ?";
    $stmt_select = $Conn->prepare($sql_select);
    $stmt_select->execute([$id]);
    $contact = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($contact) {
        $contact_name = $_POST['contact_name'];
        $contact_email = $_POST['contact_email'];
        $contact_subject = $_POST['contact_subject'];
        $contact_message = $_POST['contact_message'];

        if (isset($_FILES["contact_image"]) && $_FILES["contact_image"]["error"] == 0) {
            $file_name = $_FILES["contact_image"]["name"];
            $file_tmp = $_FILES["contact_image"]["tmp_name"];
            $file_size = $_FILES["contact_image"]["size"];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $extensions = array("jpg", "jpeg", "png", "gif");

            if (in_array($file_ext, $extensions)) {
                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                $contact_image = "uploads/" . $file_name;
            }
        } else {
            $contact_image = $_POST['current_image'];
        }

        $sql_update = "UPDATE contact SET contact_name = ?, contact_email = ?, contact_subject = ?, contact_message = ? WHERE id = ?";
        $stmt_update = $Conn->prepare($sql_update);
        $stmt_update->execute([$contact_name, $contact_email, $contact_subject, $contact_message, $id]);

        if ($stmt_update) {
            header("Location: inquiries.php");
            exit();
        } else {
            echo "Error updating contactduction data";
        }
    } else {
        echo "contactduction not found";
    }
}
?>

<?php include '../includes/adminheader.php';?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit contactduction</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($contact['id']) ? $contact['id'] : ''; ?>">
                        <div class="form-group">
                            <label for="contact_name">Name</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name" value="<?php echo isset($contact['contact_name']) ? $contact['contact_name'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Email</label>
                            <textarea class="form-control" id="contact_email" name="contact_email" rows="3"><?php echo isset($contact['contact_email']) ? $contact['contact_email'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contact_subject">Subject</label>
                            <input type="text" class="form-control" id="contact_subject" name="contact_subject" value="<?php echo isset($contact['contact_subject']) ? $contact['contact_subject'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact_message">Message</label>
                            <input type="text" class="form-control" id="contact_message" name="contact_message" value="<?php echo isset($contact['contact_message']) ? $contact['contact_message'] : ''; ?>">
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="contact.php" class="btn btn-secondary">Back</a>
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
