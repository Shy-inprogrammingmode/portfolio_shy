<?php
include 'includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_subject = $_POST['contact_subject'];
    $contact_message = $_POST['contact_message'];

  
            // SQL query to insert data into the database
            $sql = "INSERT INTO contact (contact_name, contact_email, contact_subject, contact_message) 
                    VALUES (?, ?, ?, ?)";
    
            $stmt = $Conn->prepare($sql);
            $stmt->execute([$contact_name, $contact_email, $contact_subject, $contact_message]);
    
            if ($stmt) {
                echo "New record created successfully";
            } 
              header("Location: index.php");
              exit();
}
?>