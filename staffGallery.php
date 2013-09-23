<html>
<head>
<style>
h3{
font-weight: bold;
}
#search{
float: right;
}

</style>


</head>
<body>

<h1> Welcome to the Staff Gallery </h1>

<br/>
    <form action="searchProfessors.php" method="GET" id="search">
	Search by First or Last Name: <br/>
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
<br/>



<?php //Create connection
$con = mysqli_connect("pc name","sql username","","moodle");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con, "SELECT * FROM `mdl_user` WHERE `id` > 2");

while($row = mysqli_fetch_array($result))
{

//echo "Picture: ".$row['picture']."<br/>";
echo "Name: ".$row['firstname']." ".$row['lastname']. "<br/>";
echo "<a href=/moodle/user/profile.php?id=".$row['id'].">Click Here for Profile</a><br/>";
echo "Email: ".$row['email']."<br/>";
echo "Phone: ".$row['phone1']."<br/>";
echo "Address: ".$row['address']."<br/><br/>";



//$id = $row.['id'];
//<img border="0" src="/images/pulpit.jpg" alt="Pulpit rock" width="304" height="228">
//echo "<img border='0'src='/moodle/pluginfile.php?'".$row.['id']. "width='304' height='228'>";

}

mysqli_close($con);


?>





</body>
</html>