<?php
// update_profile.php

// Include database connection


// Start session to get interviewer ID
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data from POST request
    $name = $_POST['interviewerName'];
    $email = $_POST['interviewerEmail'];
    $phone = $_POST['interviewerPhone'];
    $bio = $_POST['interviewerBio'];

    // Assuming the interviewer is authenticated and the interviewer ID is stored in the session
    $userid = $_SESSION['userid'];  // interviewer ID should be set upon login

    // Update query to save profile changes in the database
    $sql = "UPDATE interviewers SET name = ?, email = ?, phone = ?, bio = ? WHERE id = ?";
    
    // Prepare the query
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the query (s = string, i = integer)
        $stmt->bind_param("ssssi", $name, $email, $phone, $bio, $interviewerId);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect or show success message
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
