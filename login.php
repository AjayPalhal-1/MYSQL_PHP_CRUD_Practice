<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP MySQL password is empty
$dbname = "login_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $sql = "INSERT INTO users (user, pass) VALUES ('$user', '$pass')";
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "New record created successfully!";
    } else {
        // Error inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Query the database to find the username and password
    // $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";

    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     // User found
    //     echo "Login successful!";
    // } else {
    //     // User not found
    //     echo "Invalid username or password.";
    // }
}

// Close connection
$conn->close();
?>
