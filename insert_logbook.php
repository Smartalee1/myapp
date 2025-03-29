<?php
// Database connection details
$servername = "localhost"; // Server name (usually localhost)
$username = "root";        // Default username for XAMPP
$password = "";            // Default password for XAMPP (empty)
$dbname = "logbook";       // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ip_address = $_POST['ip_address'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $country = $_POST['country'];
    $isp = $_POST['isp'];
    $device_type = $_POST['device_type'];
    $operating_system = $_POST['operating_system'];
    $browser = $_POST['browser'];

    // SQL query to insert data
    $sql = "INSERT INTO logbook (ip_address, city, region, country, isp, device_type, operating_system, browser)
            VALUES ('$ip_address', '$city', '$region', '$country', '$isp', '$device_type', '$operating_system', '$browser')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>New record inserted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logbook Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Logbook Entry Form</h2>
    <form method="POST" action="">
        <label for="ip_address">IP Address:</label>
        <input type="text" id="ip_address" name="ip_address" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="region">Region:</label>
        <input type="text" id="region" name="region" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>

        <label for="isp">ISP:</label>
        <input type="text" id="isp" name="isp" required>

        <label for="device_type">Device Type:</label>
        <input type="text" id="device_type" name="device_type" required>

        <label for="operating_system">Operating System:</label>
        <input type="text" id="operating_system" name="operating_system" required>

        <label for="browser">Browser:</label>
        <input type="text" id="browser" name="browser" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html> 