<?php
include 'db_connection.php'; 
$sql = "SELECT id, name, email, position, department FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    
</head>
<body>
<header>
        <nav>
            <div class="left">Welcome to Admin Dashboard</div>
            <div class="right">
                <ul>
                    <a href="display_employees.php">View Employees</a> 
                    <a href="add-employee.html">Add Employee</a> 
                    <a href="edit_employee.php">Edit Employee</a> 
                    <a href="delete.html">Delete Employee</a> 
                   
                    <a href="dashboard.html">Back to Dashboard</a>
                </ul>
            </div>
        </nav>
    </header>
    <h1>Employee List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['position'] . "</td>
                            <td>" . $row['department'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close(); 
            ?>
        </tbody>
    </table>
</body>

<style>    
   body {
    background-color: rgb(1, 1, 32);
    color: white;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}


nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100px;
    background-color: rgb(3, 3, 36);
    padding: 0 20px;
}

nav .left {
    font-size: 20px;
}

nav .right ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul a {
    text-decoration: none;
    color: white;
    margin: 0 15px;
    font-size: 18px;
}

nav ul a:hover {
    color: #00ff66; 
}


        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: solid black;
            padding: 8px;
            color:white;
        }
        th {
            background-color:blue;
            color: white;
            text-align: center;
        }
        tr:hover {
            background-color:darkblue;
        }
        h1{
            color:white;

        }

   

    </style>
</html>
