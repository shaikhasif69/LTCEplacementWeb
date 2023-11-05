<?php
session_start();
if (isset($_SESSION['pusername'])) {
    // User is logged in
} else {
    header("location: index.php");
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add any necessary meta tags, styles, or scripts here -->
</head>
<body>
<center>
    <?php
    // Establish a MySQL connection
    $connection = mysqli_connect('127.0.0.1', 'root', '','details');

    if (!$connection) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $cname = mysqli_real_escape_string($connection, $_POST['cname']);
        $date = mysqli_real_escape_string($connection, $_POST['date']);

        $query1 = "SELECT COUNT(Attendence) FROM updatedrive WHERE Attendence=1 AND CompanyName='$cname' AND Date='$date'";
        $result1 = mysqli_query($connection, $query1);
        $data1 = mysqli_fetch_assoc($result1);

        echo "<br>Number of Students Attended&nbsp:&nbsp";
        echo $data1['COUNT(Attendence)'];

        $query2 = "SELECT COUNT(WT) FROM updatedrive WHERE WT=1 AND CompanyName='$cname' AND Date='$date'";
        $result2 = mysqli_query($connection, $query2);
        $data2 = mysqli_fetch_assoc($result2);

        echo "<br>Number of Students Cleared WT&nbsp:&nbsp";
        echo $data2['COUNT(WT)'];

        $query3 = "SELECT COUNT(GD) FROM updatedrive WHERE GD=1 AND CompanyName='$cname' AND Date='$date'";
        $result3 = mysqli_query($connection, $query3);
        $data3 = mysqli_fetch_assoc($result3);

        echo "<br>Number of Students Cleared GD&nbsp:&nbsp";
        echo $data3['COUNT(GD)'];

        $query4 = "SELECT COUNT(Techical) FROM updatedrive WHERE Techical=1 AND CompanyName='$cname' AND Date='$date'";
        $result4 = mysqli_query($connection, $query4);
        $data4 = mysqli_fetch_assoc($result4);

        echo "<br>Number of Students Cleared Technical&nbsp:&nbsp";
        echo $data4['COUNT(Techical)'];

        $query5 = "SELECT COUNT(Placed) FROM updatedrive WHERE Placed=1 AND CompanyName='$cname' AND Date='$date'";
        $result5 = mysqli_query($connection, $query5);
        $data5 = mysqli_fetch_assoc($result5);

        echo "<br>Number of Students Placed&nbsp:&nbsp";
        echo $data5['COUNT(Placed)'];
    }

    // Close the MySQL connection
    mysqli_close($connection);
    ?>
</center>
</body>
</html>
