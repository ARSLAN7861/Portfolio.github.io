<?php
// Replace with your own database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PortFolio";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // Validate user input
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);

    // Insert user input into database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Thank you for contacting us! We will get back to you shortly.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 } 
                                                                                                                                                                                                                                                                                                                                                                            

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close connection
mysqli_close($conn);
?>
