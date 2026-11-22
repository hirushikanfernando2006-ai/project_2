<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMBS Green Campus - Search Student</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { 
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('image2.jpg') no-repeat center center fixed; 
            background-size: cover;
            min-height: 100vh; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            padding: 30px 20px; 
        } 
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .campus-header { text-align: center; color: #2ecc71; font-weight: 700; font-size: 26px; letter-spacing: 1px; margin-bottom: 5px; text-transform: uppercase; }
        h2 { color: #2c3e50; margin-bottom: 20px; font-weight: 500; text-align: center; font-size: 18px; }
        .search-box { display: flex; gap: 10px; margin-bottom: 25px; }
        .search-box input { flex: 1; padding: 12px; border: 1px solid #dcdcdc; border-radius: 6px; font-size: 15px; }
        .search-box button { background: #2ecc71; color: white; border: none; padding: 0 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .search-box button:hover { background: #27ae60; }
        .result-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        .result-table th, .result-table td { padding: 12px 15px; border-bottom: 1px solid #edf2f7; text-align: left; }
        .result-table th { background-color: #f8fafc; color: #4a5568; width: 35%; font-weight: 600; }
        .result-table td { color: #2d3748; }
        .nav-links { display: flex; justify-content: space-between; margin-top: 25px; font-size: 14px; }
        .nav-links a { color: #2ecc71; text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>

<div class="container">
    <div class="campus-header">IMBS Green Campus</div>
    <h2>Search Student Details</h2>
    <form action="search.php" method="GET" class="search-box">
        <input type="text" name="search_nic" placeholder="Enter Student NIC Number" required>
        <button type="submit">Search</button>
    </form>

    <?php
    if (isset($_GET['search_nic'])) {
        $conn = new mysqli("localhost", "root", "", "university_db");
        $search_nic = $_GET['search_nic'];
        $sql = "SELECT * FROM students WHERE nic = '$search_nic'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<table class='result-table'>";
            echo "<tr><th>NIC Number</th><td>" . $row['nic'] . "</td></tr>";
            echo "<tr><th>Full Name</th><td>" . $row['name'] . "</td></tr>";
            echo "<tr><th>Gender</th><td>" . $row['gender'] . "</td></tr>";
            echo "<tr><th>Address</th><td>" . $row['address'] . "</td></tr>";
            echo "<tr><th>Phone</th><td>" . $row['phone'] . "</td></tr>";
            echo "<tr><th>Email</th><td>" . $row['email'] . "</td></tr>";
            echo "<tr><th>Course</th><td>" . $row['course'] . "</td></tr>";
            echo "</table>";
        } else {
            echo "<p style='color: #e74c3c; text-align: center; font-weight: 500;'>No student found with this NIC.</p>";
        }
        $conn->close();
    }
    ?>
    
    <div class="nav-links">
        <a href="register.php">← Registration Form</a>
        <a href="manage.php">Manage System →</a>
    </div>
</div>

</body>
</html>