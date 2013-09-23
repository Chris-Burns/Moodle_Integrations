<html>
<head>

<title>students table</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

</head>
<body>
<div id="tabs">
<ul>


<?php //Create connection
$con = mysqli_connect("pc name","sql username","","moodle");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
//Find Courses from moodle
$course = mysqli_query($con, "SELECT * FROM mdl_course_categories");
while($row = mysqli_fetch_array($course))
{
$id = $row['id'];
$tId = $id -1;
$name = $row['name'];

echo '<li><a href="#tabs-'. $tId . '">'. $name. '</a></li>';

}
?>
</ul>

<div id="tabs-1">
<?php
$result = mysqli_query($con, "SELECT * FROM mdl_course WHERE category = '2'");
while($row = mysqli_fetch_array($result))
{
$title = "<h3> " . $row['fullname'] . "</h3>";
echo '<a href=/moodle/course/view.php?id='. $row['id']. '>'. $title .'</a>';
echo "Course ID:" . $row['shortname'];
echo "<p>" . $row['summary']. "</p>";
}

?>

</div>


<div id="tabs-2">
<?php 
$result2 = mysqli_query($con, "SELECT * FROM mdl_course WHERE category = '3'");
while($row = mysqli_fetch_array($result2))
{
$title = "<h3> " . $row['fullname'] . "</h3>";
echo '<a href=/moodle/course/view.php?id='. $row['id']. '>'. $title .'</a>';
echo "Course ID:" . $row['shortname'];
echo "<p>" . $row['summary']. "</p>";
}

?>

</div>

<div id="tabs-3">

<?php  
$result3 = mysqli_query($con, "SELECT * FROM mdl_course WHERE category = '4'");
while($row = mysqli_fetch_array($result3))  
{
$title = "<h3> " . $row['fullname'] . "</h3>";
echo '<a href=/moodle/course/view.php?id='. $row['id']. '>'. $title .'</a>';
echo "Course ID:" . $row['shortname'];
echo "<p>" . $row['summary']. "</p>";
}

mysqli_close($con);
?>     

</div>

</div>
</body>
</html>