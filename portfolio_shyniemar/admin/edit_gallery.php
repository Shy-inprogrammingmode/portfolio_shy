<?php
include '../includes/conn.php'; 

// Function to fetch gallery image details by ID
function fetchGalleryImage($id) {
    global $Conn;
    $sql = "SELECT * FROM gallery WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update gallery image details
function updateGalleryImage($id, $image_path) {
    global $Conn;
    $sql = "UPDATE gallery SET gallery_image = ? WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$image_path, $id]);
}

// Function to upload a new file
function uploadNewFile($id, $file) {
    if(isset($file) && $file["error"] == 0){
        $file_name = $file["name"];
        $file_tmp = $file["tmp_name"];
        $file_size = $file["size"];
        
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpg","jpeg","png","gif");

        if(in_array($file_ext, $extensions) === false){
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            
            $image_path = "uploads/" . $file_name;

            if (updateGalleryImage($id, $image_path)) {
                return "New file uploaded successfully.";
            } else {
                return "Error updating gallery image.";
            }
        }
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $image_path = $_POST['image_path'];
    $new_file = $_FILES['new_file'];

    // Check if a new file is uploaded
    if (!empty($new_file['name'])) {
        $upload_result = uploadNewFile($id, $new_file);
        if ($upload_result === true) {
            header("Location: manage_gallery.php");
            exit();
        } else {
            echo $upload_result;
        }
    } else {
        if (updateGalleryImage($id, $image_path)) {
            header("Location: manage_gallery.php");
            exit();
        } else {
            echo "Error updating gallery image.";
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gallery_image = fetchGalleryImage($id);
    if (!$gallery_image) {
        echo "Gallery image not found.";
        exit();
    }
} else {
    echo "Gallery image ID not provided.";
    exit();
}
?>

<?php include '../includes/adminheader.php';?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Gallery Image</h4>
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $gallery_image['id']; ?>">
                        <div class="form-group">
                            <label for="image_path">Existing Image Path</label>
                            <input type="text" class="form-control" id="image_path" name="image_path" value="<?php echo $gallery_image['gallery_image']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="new_file">Upload New Image</label>
                            <input type="file" class="form-control" id="new_file" name="new_file" onchange="previewNewImage()">
                        </div>
                        <!-- Image preview container -->
                        <div class="form-group" id="imagePreviewContainer" style="display: none;">
                            <label>New Image Preview</label>
                            <img id="imagePreview" src="#" alt="New Image Preview" style="max-width: 100%; max-height: 200px;">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to preview the selected new image
    function previewNewImage() {
        var fileInput = document.getElementById('new_file');
        var imagePreview = document.getElementById('imagePreview');
        var imagePreviewContainer = document.getElementById('imagePreviewContainer');

        // Check if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = 'block'; // Display the image preview container
            }

            reader.readAsDataURL(fileInput.files[0]);
} else {
imagePreview.src = '#';
imagePreviewContainer.style.display = 'none'; // Hide the image preview container if no file is selected
}
}
</script>

<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
</body>
</html>