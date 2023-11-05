<?php
  session_start();
  if($_SESSION["username"]){
    echo "Welcome, ".$_SESSION['username']."!";
  }
   else {
	   header("location: index.php");
}
   
?>
<?php
$connect = mysqli_connect("127.0.0.1", "root", "","details"); // Establishing Connection with Server
//or die("Cant Connect to database");  Selecting Database from Server
if (!$connect) {
  die('Could not connect: ' . mysqli_error());
}
if(isset($_POST['submit']))
{ 
$fullname = $_POST['Fname']." ".$_POST['Lname'];
//$lname = $_POST['Lname'];
$USN = $_POST['USN'];
$sun = $_SESSION["username"];
$phno = $_POST['Num'];
$email = $_POST['Email'];
$date = $_POST['DOB'];
$cursem = $_POST['Cursem'];
$branch = $_POST['Branch'];
$per = $_POST['Percentage'];
$puagg = $_POST['Puagg'];
$beaggregate = $_POST['Beagg'];
$back = $_POST['Backlogs'];
$hisofbk = $_POST['History']; 
$detyear = $_POST['Dety'];
if($USN !=''||$email !='')
{
	if($USN == $sun)
    {
		$myqu = "INSERT INTO `details`.`basicdetails` ( `FullName`, `USN`, `Mobile`, `Email`, `DOB`, `Sem`, `Branch`, `SSLC`, `PU/Dip`, `BE`, `Backlogs`, `HofBacklogs`, `DetainYears`, `Approve`) 
		VALUES ('$fullname', '$USN', '$phno', '$email', '$date', '$cursem', '$branch', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$detyear', '0')";
    if($query = mysqli_query($connect,$myqu))
    {
				echo "<center>Details has been received successfully...!!</center>";
      }
	  
     
		else echo "FAILED";
}

else{
	  echo "<center>enter your USN only...!!</center>";
}
}
}
?>


<?php
$connect = mysqli_connect("127.0.0.1", "root", "","details"); // Establishing Connection with Server
//or die("Cant Connect to database");  Selecting Database from Server
if (!$connect) {
  die('Could not connect: ' . mysqli_error());
}
if(isset($_POST['update']))
{ 
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$USN = $_POST['USN'];
$sun = $_SESSION["username"];
$phno = $_POST['Num'];
$email = $_POST['Email'];
$date = $_POST['DOB'];
$cursem = $_POST['Cursem'];
$branch = $_POST['Branch'];
$per = $_POST['Percentage'];
$puagg = $_POST['Puagg'];
$beaggregate = $_POST['Beagg'];
$back = $_POST['Backlogs'];
$hisofbk = $_POST['History']; 
$detyear = $_POST['Dety'];

if($USN !=''||$email !='')
{
	if($USN == $sun)
	{
		
	$sql = "SELECT * FROM `details`.`basicdetails` WHERE `USN`='$USN'";
	$qury = mysqli_query($connect,$sql);
	if(mysqli_num_rows($qury) == 1)
	{
        $qu = "UPDATE `details`.`basicdetails` SET `FirstName`='$fname', `LastName`='$lname', `Mobile`='$phno', `Email`='$email', `DOB`='$date', `Sem`='$cursem', `Branch`= '$branch', `SSLC`='$per', `PU/Dip`='$puagg', `BE`='$beaggregate', `Backlogs`='$back', `HofBacklogs`='$hisofbk', `DetainYears`='$detyear' ,`Approve`='0'
		WHERE `basicdetails`.`USN` = '$USN'";
		if($query = mysqli_query($connect,$qu))
               {
				echo "<center>Data Updated successfully...!!</center>";
               }
	  
            else echo "<center>FAILED</center>";
		
	}	
	else echo "<center>NO record found for update</center>";
	}
else
	echo "<center>Enter your USN only</center>";
}
}
?>