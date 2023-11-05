<?php
session_start();
$connect = mysqli_connect("127.0.0.1", "root", "","placement"); // Establishing Connection with Server
    //or die("Cant Connect to database");  Selecting Database from Server
    if (!$connect) {
      die('Could not connect: ' . mysqli_error());
  }

  $USN = $_POST['USN'];
  $Question = $_POST['Question'];
  $Answer = $_POST['Answer'];
  $qu= "SELECT * FROM slogin WHERE USN='".$USN."'";
  $check = mysqli_query($connect, $qu) or die("Check Query");
 if(mysqli_num_rows($check) != 0) 
 {
	 $row = mysqli_fetch_assoc($check);
	 $dbQuestion = $row['Question'];
	 $dbAnswer = $row['Answer'];
  if($dbQuestion == $Question && $dbAnswer==$Answer) 
  {
     $_SESSION['reset'] = $USN;
	   header("location: Reset password.php");
	   
  }
  else {
	  echo "<center>Failed! Incorrect Credentials</center>";
 
/*  else
 {
 echo "<center> Enter Something Correctly Champ!!! </center>"; */
    $query ="INSERT INTO slogin(Fullname, USN ,PASSWORD,Email,Question,Answer) VALUES ('$Name', '$USN', '$password','$Email','$Question','$Answer')";
    if($query = mysqli_query($connect,))
    {
                       echo "<center> You have registered successfully...!! Go back to  </center>";
					             echo "<center><a href='index.php'>Login here</a> </center>";
					   
    }

   else
    {
       echo "<center>Your password do not match</center>";
    }
   }
   /*else
   {
       echo "<center>This USN already exists</center>"; 
  }*/
 }
?>