<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
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
<body>
<div class="firstSection">
<div class="leftSection">
    

   
    <form id="form1" action="edit_employee.php" method="GET">
    <h1>Edit Employee</h1>
        <label for="search-name">Enter Name of the Employee to Edit:</label>
        <input type="text" id="search-name" name="search_name" required>
        <button type="submit">Search</button>
        
    </form>
    </div>
    <div class="rightSection">
        <img src="web.webp" alt="image">
    </div>
</div>

    <div class="firstSection">
    <div class="leftSection">

    <?php
    if (isset($_GET['search_name'])) {
        $search_name = $_GET['search_name'];

        
        $conn = new mysqli('localhost', 'root', '', 'employee_management');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM employees WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $search_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
         
            $employee = $result->fetch_assoc();
            ?>
            <hr>
            

           
            <form id="form2" action="update_employee.php" method="POST">
            <h2>Edit Details</h2>
                <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

                <label for="name">Name:</label> 
                <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $employee['email']; ?>" required><br><br>

                <label for="position">Position:</label>
                <input type="text" id="position" name="position" value="<?php echo $employee['position']; ?>" required><br><br>

                <label for="department">Department:</label>
                <input type="text" id="department" name="department" value="<?php echo $employee['department']; ?>" required><br><br>

                <button type="submit">Update Employee</button>
               
            </form>
            </div>
    <div class="rightSection">
        <img src="web.webp" alt="image">
    </div>
</div>
            <?php
        } else {
            echo "No employee found with the name: $search_name";
        }

        $conn->close();
    }
    ?>
</body>
</html>

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


.firstSection {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 40px;
    gap: 20px;
}

.firstSection > div {
    width: 45%; 
}


form {
    background-color: rgba(3, 5, 29, 0.8);
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0px 10px 30px rgba(17, 9, 129, 0.6);
    max-width: 385px;
    width: 100%;
}

form h1 {
    color: #4a0e66;
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.8em;
    font-weight: bold;
}

label {
    font-weight: bold;
    margin-top: 10px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0 16px;
    background-color: #333;
    border: 1px solid #525050;
    border-radius: 5px;
    color: #e0e0e0;
}

input[type="text"]:focus,
input[type="email"]:focus {
    outline: none;
    border-color: #4a0e66;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    font-size: 1em;
    background-color: #4a0e66;
    color: #202020;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #4a0e66;
}


.rightSection img {
    width: 100%;
    max-width: 450px; 
    height: auto;
    border-radius: 8px;
}


@media (max-width: 768px) {
    .firstSection {
        flex-direction: column; 
        gap: 20px;
    }

    .firstSection > div {
        width: 100%; 
    }

    form {
        width: 90%; 
    }

    nav ul a {
        font-size: 16px; 
        margin: 5px;
    }
}

</style>
</html>