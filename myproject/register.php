<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMBS Green Campus - Student Registration</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        /* 1. මෙතනින් පසුබිම් පින්තූරය (Background Image) ලෙස ඔබේ campus.jpg පින්තූරය එකතු කර ඇත */
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
        
        /* ලියාපදිංචි වීමේ පෝරමයේ කොටස (කිසිදු වෙනසක් කර නොමැත) */
        .form-container { 
            background: white; 
            padding: 40px; 
            border-radius: 12px; 
            width: 100%; 
            max-width: 550px; 
            box-shadow: 0 8px 24px rgba(0,0,0,0.3); 
        }
        
        .campus-header { text-align: center; color: #2ecc71; font-weight: 700; font-size: 28px; letter-spacing: 1px; margin-bottom: 5px; text-transform: uppercase; }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; font-weight: 500; font-size: 18px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #5a738e; font-size: 14px; font-weight: 500; }
        input[type="text"], input[type="email"], input[type="tel"], select, textarea { width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 6px; font-size: 15px; transition: all 0.3s ease; background-color: #fcfcfc; }
        input:focus, select:focus, textarea:focus { border-color: #2ecc71; outline: none; background-color: #fff; box-shadow: 0 0 8px rgba(46,204,113,0.2); }
        .radio-group { display: flex; gap: 20px; margin-top: 5px; }
        .radio-group label { display: flex; align-items: center; gap: 8px; cursor: pointer; color: #2c3e50; }
        
        button { width: 100%; padding: 14px; background: #2ecc71; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background 0.3s ease; margin-top: 10px; }
        button:hover { background: #27ae60; }
        
        .nav-links { display: flex; justify-content: space-between; margin-top: 20px; font-size: 14px; }
        .nav-links a { color: #2ecc71; text-decoration: none; font-weight: 500; }
        .nav-links a:hover { text-decoration: underline; }

        /* පෝරමයට යටින් ඇති පින්තූරයේ කොටස */
        .image-container {
            text-align: center; 
            margin-top: 25px; 
            width: 100%;
            max-width: 550px;
        }
        .image-container img {
            width: 100%; 
            border-radius: 12px; 
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            border: 3px solid white; 
        }
    </style>
</head>
<body>

    <div class="form-container">
        <div class="campus-header">IMBS Green Campus</div>
        <h2>Student Registration Form</h2>
        <form action="submit.php" method="POST">
            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" id="nic" name="nic" placeholder="e.g., 199912345678 or 991234567V" required>
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                    <label><input type="radio" name="gender" value="Female"> Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Permanent Address</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="e.g., 0771234567" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com" required>
            </div>
            <div class="form-group">
                <label for="course">Select Course</label>
                <select id="course" name="course" required>
                    <option value="" disabled selected>Choose a course</option>
                    <option value="Foundation in IT">Foundation in Information Technology</option>
                    <option value="Diploma in Computer Science">Diploma in Computer Science</option>
                    <option value="BSc in Information Technology">BSc in Information Technology</option>
                </select>
            </div>
            <button type="submit">Register Student</button>
        </form>
        
        <div class="nav-links">
            <a href="search.php">Search Student</a>
            <a href="manage.php">Manage Students</a>
        </div>
    </div>

    

</body>
</html>