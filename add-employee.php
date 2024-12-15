<?php

$db = new mysqli('localhost', 'root', '', 'employee_management');


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $department = $_POST['department'];


    $check_email = "SELECT email FROM employees WHERE email = '$email'";
    $response = $db->query($check_email);

    if ($response->num_rows > 0) {
        echo "Employee with this email already exists.";
    } else {
        
        $insert_query = "INSERT INTO employees (name, email, position, department) VALUES ('$name', '$email', '$position', '$department')";

        if ($db->query($insert_query) === TRUE) {
            echo "Employee added successfully.";
            header("Location: display_employees.php ");
        } else {
            echo "Error: " . $db->error;
        }
    }
}
?>

