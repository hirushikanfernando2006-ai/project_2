<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { 
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('campus.jpg') no-repeat center center fixed; 
            background-size: cover;
            min-height: 100vh; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            padding: 20px; 
        }
        .status-container { 
            background: white; 
            padding: 40px; 
            border-radius: 12px; 
            width: 100%; 
            max-width: 450px; 
            box-shadow: 0 8px 24px rgba(0,0,0,0.3); 
            text-align: center;
        }
        .icon { font-size: 60px; margin-bottom: 15px; font-weight: bold; }
        .icon.success { color: #2ecc71; }
        .icon.error { color: #e74c3c; }
        h2 { color: #2c3e50; margin-bottom: 10px; font-weight: 600; font-size: 24px; }
        p { color: #7f8c8d; margin-bottom: 25px; font-size: 15px; line-height: 1.5; }
        .btn-back { 
            display: inline-block; 
            padding: 12px 30px; 
            background: #3498db; 
            color: white; 
            text-decoration: none; 
            border-radius: 6px; 
            font-size: 15px; 
            font-weight: bold; 
            transition: background 0.3s ease; 
        }
        .btn-back:hover { background: #2980b9; }
    </style>
</head>
<body>

<div class="status-container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli("localhost", "root", "", "university_db");

        if ($conn->connect_error) {
            die("<div class='icon error'>×</div><h2>Connection Failed</h2><p>" . $conn->connect_error . "</p>");
        }

        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "INSERT INTO students (nic, name, gender, address, phone, email, course) 
                VALUES ('$nic', '$name', '$gender', '$address', '$phone', '$email', '$course')";

        if ($conn->query($sql) === TRUE) {
            // සාර්ථක වූ විට පෙන්වන කොටස (Success Card)
            echo "<div class='icon success'>✓</div>";
            echo "<h2>Student Registered Successfully!</h2>";
            echo "<p>දත්ත සාර්ථකව දත්ත පද්ධතියට (Database) ඇතුළත් විය.</p>";
        } else {
            // අසාර්ථක වූ විට පෙන්වන කොටස (Failed Card)
            echo "<div class='icon error'>×</div>";
            echo "<h2>Registration Failed</h2>";
            echo "<p>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    } else {
        echo "<div class='icon error'>×</div>";
        echo "<h2>Invalid Request</h2>";
        echo "<p>Please submit the registration form correctly.</p>";
    }
    ?>
    <a href="register.php" class="btn-back">Go Back</a>
</div>

</body>
</html>

