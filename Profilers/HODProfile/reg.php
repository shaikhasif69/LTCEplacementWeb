<?php
   $connect = mysqli_connect("127.0.0.1", "root", "","placement"); // Establishing Connection with Server
    // or die("Cant Connect to database");  Selecting Database from Server
    if (!$connect) {
      die('Could not connect: ' . mysqli_error($connect));
  }

 
   
if(isset($_POST['submit']))
{ 
  
 $Name = $_POST['Fullname'];
$Branch = $_POST['Branch'];
 $password = $_POST['PASSWORD'];
 $repassword = $_POST['repassword'];
 $Email = $_POST['Email'];

  

 $check = mysqli_query($connect,"SELECT * FROM hlogin WHERE Username='".$Name."'") or die("Check Query");
 if(mysqli_num_rows($check) == 0) 
 {
  if($repassword == $password)
  {
    
    
    if($query = mysqli_query($connect,"INSERT INTO hlogin(Username ,Password,Email, Branch) VALUES ('$Name', '$password','$Email', '$Branch')"))
    {
                       echo "<center> You have registered successfully...!! Go back to  </center>";
					             echo "<center><a href='index.php'>Login here</a> </center>";
					   
    }
    else {
        echo "data is not been submitted!";
    }
  }
   else
    {
       echo "<center>Your password do not match</center>";
    }
   }
   else
   {
       echo "<center>This Username already exists</center>"; 
  }
}
?>