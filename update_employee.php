<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $department = $_POST['department'];


    $conn = new mysqli('localhost', 'root', '', 'employee_management');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "UPDATE employees SET name = ?, email = ?, position = ?, department = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $name, $email, $position, $department, $id);

    if ($stmt->execute()) {
        echo "Employee details updated successfully.";
        header("Location: display_employees.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
