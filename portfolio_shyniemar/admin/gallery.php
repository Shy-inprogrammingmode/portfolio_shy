<?php
include '../includes/conn.php';

// Function to fetch all gallery images
function fetchGalleryImages() {
    global $Conn;
    $sql = "SELECT * FROM gallery";
    $stmt = $Conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a gallery image
function deleteGalleryImage($id) {
    global $Conn;
    $sql = "DELETE FROM gallery WHERE id = ?";
    $stmt = $Conn->prepare($sql);
    return $stmt->execute([$id]);
}


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteGalleryImage($id)) {
        echo "Entry deleted successfully.";
    } else {
        echo "Error deleting entry.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_FILES["gallery_image"]) && $_FILES["gallery_image"]["error"] == 0){
        $file_name = $_FILES["gallery_image"]["name"];
        $file_tmp = $_FILES["gallery_image"]["tmp_name"];
        $file_size = $_FILES["gallery_image"]["size"];
        
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpg","jpeg","png","gif");

        if(in_array($file_ext, $extensions) === false){
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
            
            $sql = "INSERT INTO gallery (gallery_image) 
                    VALUES (?)";
    
            $stmt = $Conn->prepare($sql);
            $stmt->execute([ "uploads/" . $file_name]);
    
            if ($stmt) {
                echo "New record created successfully";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error: " . $errorInfo[2]; 
            }
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Handling delete operation
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteGalleryImage($id)) {
        echo "Image deleted successfully.";
    } else {
        echo "Error deleting image.";
    }
}

// Fetch all gallery images
$galleryImages = fetchGalleryImages();
?>

<?php include '../includes/adminheader.php';?>

<style>
    .row{
       margin-left: auto;
    }
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">GALLERY SECTION</h4>
                    <p class="card-description">
                        Add, delete, and update gallery images
                    </p>
                    <div class="mb-4">
                        <a href="create_gallery.php" class="btn btn-primary">Add New</a>
                         </div>
                    <!-- <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gallery_image">Image</label>
                            <input type="file" class="form-control" id="gallery_image" name="gallery_image" onchange="previewImage()">
                        </div>
                        <div class="form-group" id="imagePreviewContainer" style="display: none;">
                            <label>Image Preview</label>
                            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px;">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Display existing gallery images in a table -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Gallery Images</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($galleryImages as $image): ?>
                                <tr>
                                    <td><img src="<?php echo $image['gallery_image']; ?>" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="?action=delete&id=<?php echo $image['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="edit_gallery.php?id=<?php echo $image['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
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

<script>
    // Function to preview the selected image
    function previewImage() {
        var fileInput = document.getElementById('gallery_image');
        var imagePreview = document.getElementById('imagePreview');
        var imagePreviewContainer = document.getElementById('imagePreviewContainer');

        // Check if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = 'block'; // Display the image preview container
            }

            reader.readAsDataURL(fileInput.files[0]); // Convert selected image to data URL
        } else {
            imagePreview.src = '#';
            imagePreviewContainer.style.display = 'none';

(); // Hide the image preview container if no file is selected
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
