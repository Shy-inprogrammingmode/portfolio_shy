<?php 
include('../includes/adminheader.php');
include '../includes/conn.php';

// Query to fetch social links data from the database
$sql = "SELECT * FROM social_links";
$stmt = $Conn->query($sql);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MANAGE SOCIAL LINKS</h4>
                    <p class="card-description">Manage your social links here.</p>
                    <div class="mb-4">
                        <a href="add_social_link.php" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Platform</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($stmt !== false) {
                                    if ($stmt->rowCount() > 0) {
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['platform'] . "</td>";
                                            echo "<td>" . $row['link'] . "</td>";
                                            echo "<td>
                                                    <a href='edit_social_link.php?id=" . $row['id'] . "' class='btn btn-sm btn-info'>Edit</a>
                                                    <a href='delete_social_link.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No data found</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Error fetching data</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
