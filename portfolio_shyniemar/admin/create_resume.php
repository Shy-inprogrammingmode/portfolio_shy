<?php
include '../includes/conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $year_range = $_POST['year_range'];
    $institution = $_POST['institution'];
    $description = $_POST['description'];
    $hashtags = $_POST['hashtags'];
    $dialect = $_POST['dialect'];
    $fluency = $_POST['fluency'];
    $hobbies = $_POST['hobbies'];

    $sql = "INSERT INTO resume (category, year_range, institution, description, hashtags, dialect, fluency, hobbies) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $Conn->prepare($sql);
    $stmt->execute([$category, $year_range, $institution, $description, $hashtags, $dialect, $fluency, $hobbies]);

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
                    <h4 class="card-title">EXPERIENCES & ACTIVITIES SECTION</h4>
                    <p class="card-description">
                        Add, delete, and update experiences and activities information
                    </p>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="Experiences">Experiences</option>
                                <option value="Activities">Activities</option>
                                <option value="Hashtags">Hashtags</option>
                                <option value="Languages">Languages</option>
                                <option value="Hobbies">Hobbies</option>
                            </select>
                        </div>
                        <div class="form-group" id="yearRangeInput">
                            <label for="year_range">Year Range</label>
                            <input type="text" class="form-control" id="year_range" name="year_range" placeholder="Enter year range">
                        </div>
                        <div class="form-group" id="institutionInput">
                            <label for="institution">Institution</label>
                            <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter institution name">
                        </div>
                        <div class="form-group" id="descriptionInput">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group" id="hashtagsInput" style="display: none;">
                            <label for="hashtags">Hashtags</label>
                            <input type="text" class="form-control" id="hashtags" name="hashtags" placeholder="Enter hashtags (comma-separated)">
                        </div>
                        <div class="form-group" id="dialectInput" style="display: none;">
                            <label for="dialect">Dialect</label>
                            <input type="text" class="form-control" id="dialect" name="dialect" placeholder="Enter dialect">
                        </div>
                        <div class="form-group" id="fluencyInput" style="display: none;">
                            <label for="fluency">Fluency</label>
                            <input type="text" class="form-control" id="fluency" name="fluency" placeholder="Enter fluency">
                        </div>
                        <div class="form-group" id="hobbiesInput" style="display: none;">
                            <label for="hobbies">Hobbies</label>
                            <input type="text" class="form-control" id="hobbies" name="hobbies" placeholder="Enter hobbies">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // logic para ha catogorizing
    document.getElementById("category").addEventListener("change", function() {
        var yearRangeInput = document.getElementById("yearRangeInput");
        var institutionInput = document.getElementById("institutionInput");
        var descriptionInput = document.getElementById("descriptionInput");
        var hashtagsInput = document.getElementById("hashtagsInput");
        var dialectInput = document.getElementById("dialectInput");
        var fluencyInput = document.getElementById("fluencyInput");
        var hobbiesInput = document.getElementById("hobbiesInput");

        if (this.value === "Hashtags") {
            yearRangeInput.style.display = "none";
            institutionInput.style.display = "none";
            descriptionInput.style.display = "none";
            dialectInput.style.display = "none";
            fluencyInput.style.display = "none";
            hobbiesInput.style.display = "none";
            hashtagsInput.style.display = "block";
        } else if (this.value === "Languages") {
            yearRangeInput.style.display = "none";
            institutionInput.style.display = "none";
            descriptionInput.style.display = "none";
            hashtagsInput.style.display = "none";
            fluencyInput.style.display = "block";
            dialectInput.style.display = "block";
            hobbiesInput.style.display = "none";
        } else if (this.value === "Hobbies") {
            yearRangeInput.style.display = "none";
            institutionInput.style.display = "none";
            descriptionInput.style.display = "none";
            hashtagsInput.style.display = "none";
            fluencyInput.style.display = "none";
            dialectInput.style.display = "none";
            hobbiesInput.style.display = "block";
        } else {
            yearRangeInput.style.display = "block";
            institutionInput.style.display = "block";
            descriptionInput.style.display = "block";
            hashtagsInput.style.display = "none";
            fluencyInput.style.display = "none";
            dialectInput.style.display = "none";
            hobbiesInput.style.display = "none";
        }
    });
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
