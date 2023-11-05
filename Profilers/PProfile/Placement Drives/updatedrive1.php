<?php
$connect = mysqli_connect("127.0.0.1", "root", "","details"); // Establishing Connection with Server
//or die("Cant Connect to database");  Selecting Database from Server
if (!$connect) {
  die('Could not connect: ' . mysqli_error());
}
if(isset($_POST['submit']))
{ 
$usn = $_POST['usn'];
echo "$usn";
$name = $_POST['sname'];
$comname = $_POST['comname'];
$date = $_POST['Date'];
$attend = $_POST['Attendance'];
$wt = $_POST['WrittenTest'];
$gd = $_POST['GD'];
$tech = $_POST['Tech'];
$placed = $_POST['Placed'];
$qu="INSERT INTO updatedrive(USN, Name, CompanyName, Date, Attendence, WT, GD, Techical, Placed)
VALUES('$usn', '$name', '$comname', '$date', '$attend', '$wt', '$gd', '$tech', '$placed')";
if($query = mysqli_query($connect,$qu))
        {
                      echo "<center>Data Inserted successfully...!!</center>";
		}
		else
		{ 
	       echo "<center>FAILED</center>";
	    }
}
?>