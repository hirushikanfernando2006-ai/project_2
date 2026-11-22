<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMBS Green Campus - Manage Students</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { 
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('campus.jpg') no-repeat center center fixed; 
            background-size: cover;
            min-height: 100vh; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            padding: 30px 20px; 
         }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 900px; margin: auto; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .campus-header { text-align: center; color: #2ecc71; font-weight: 700; font-size: 28px; letter-spacing: 1px; margin-bottom: 5px; text-transform: uppercase; }
        h2 { color: #2c3e50; margin-bottom: 20px; font-weight: 500; font-size: 18px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #edf2f7; }
        th { background: #f8fafc; color: #4a5568; font-weight: 600; }
        td { color: #2d3748; }
        .btn-delete { background-color: #e74c3c; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: bold; transition: background 0.3s; }
        .btn-delete:hover { background-color: #c0392b; }
        .nav-links { display: flex; justify-content: space-between; margin-top: 25px; font-size: 14px; }
        .nav-links a { color: #2ecc71; text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>

<div class="container">
    <div class="campus-header">IMBS Green Campus</div>
    <h2>Manage Registered Students</h2>

    <?php
    $conn = new mysqli("localhost", "root", "", "university_db");

    if (isset($_GET['delete_nic'])) {
        $delete_nic = $_GET['delete_nic'];
        if ($conn->query("DELETE FROM students WHERE nic = '$delete_nic'") === TRUE) {
            echo "<p style='color: #2ecc71; font-weight: bold; margin-bottom: 15px; text-align: center;'>Student record deleted successfully!</p>";
        }
    }

    $result = $conn->query("SELECT * FROM students");

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>NIC</th><th>Name</th><th>Course</th><th>Phone</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nic'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td><a href='manage.php?delete_nic=" . $row['nic'] . "' class='btn-delete' onclick='return confirm(\"Are you sure?\");'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='margin-top: 20px; color: #7f8c8d; text-align: center;'>No students registered in the system yet.</p>";
    }
    $conn->close();
    ?>

    <div class="nav-links">
        <a href="register.php">← Go to Registration</a>
        <a href="search.php">Go to Search →</a>
    </div>
</div>

</body>
</html>