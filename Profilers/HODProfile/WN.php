<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("location: index.php");
    die("You must be logged in to view this page. <a href='index.php'>Click here</a>");
}

// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "placement";

// Create a new PDO connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve subject and message from the form
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Use prepared statements to insert the data
    $stmt = $conn->prepare("INSERT INTO notifications (subject, message) VALUES (:subject, :message)");
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);

    // Execute the prepared statement
    try {
        $stmt->execute();
        echo "Message inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
