<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<h1> Search Results </h1>

<?php //Create connection
$con = mysqli_connect("pc name","sql username","","moodle");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$query = $_GET['query']; 
        $raw_results = mysqli_query($con, "SELECT * FROM `mdl_user` WHERE `firstname` = '$query' OR `lastname` ='$query'") or die(mysql_error());

		 
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
		  $count =(mysqli_num_rows($raw_results));
		  echo "There were ". $count . " record('s) found. <br/><br/>";
		  
		  while($row = mysqli_fetch_array($raw_results)){   
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            echo "Name: " . $row['firstname']." ". $row['lastname']."<br/>";
			echo "<a href=/moodle/user/profile.php?id=".$row['id'].">Click Here for Profile</a><br/>";
			echo "Email: ".$row['email']."<br/>";
			echo "Phone: ".$row['phone1']."<br/>";
			echo "Address: ".$row['address']."<br/><br/>";	
            
			}
		}
             
        else{ // if there is no matching rows do following
            echo "No results";
        }
		

mysqli_close($con);
?>


