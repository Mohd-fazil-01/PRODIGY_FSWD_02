<?php
$db = new mysqli('localhost', 'root', '', 'employee_management'); // Database connection


if ($db->connect_error) {
    echo "Connection is not established";
}
else {
   
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       
        $username = $_POST['username'];
        $password = $_POST['password'];

       
        $check = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $response = $db->query($check);

        
        if ($response) {
            
            if ($response->num_rows == 1) {
                echo "Login successful"; 
                header("Location: dashboard.html");
            } else {
                echo "Login failed - Incorrect username or password."; 
            }
        } else {
            echo "Query failed: " . $db->error; 
        }
    } else {
        echo "USER UNAUTHORIZED"; 
    }
}
?>
