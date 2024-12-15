<?php

$db = new mysqli("localhost", "root", "", "employee_management");


if($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['delete-email'];

    
    $check_query = "SELECT * FROM employees WHERE email = '$email'";


    $result = $db->query($check_query);

    if($result->num_rows > 0) {
        
        $delete_query = "DELETE FROM employees WHERE email = '$email'";

        
        if($db->query($delete_query) === TRUE) {
            echo "Employee record deleted successfully.";
            header("Location: display_employees.php");
        } else {
            echo "Error: " . $db->error;
        }
    } else {
       
        echo "This email is not found in the database.";
    }
}
?>
