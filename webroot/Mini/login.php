<?php  



/*


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecs417";
// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Checks connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}


*/



$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbpwd = getenv("DATABASE_PASSWORD");
$dbname = getenv("DATABASE_NAME");
// Creates connection
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
// Checks connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}







 if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 	$email = $_POST['email'];
 	$password = $_POST['pwd'];

 	$sql = "select * from USERS where email = '$email' and password = '$password' limit 1 ";
 	$result = mysqli_query($conn,$sql);
 

if(mysqli_num_rows($result) == 1  )
{
	session_start();
	header("location: ./blog.html");
}
else
{
	header("location: ./login.html");
}


 if ($conn->query($sql) === TRUE) {
 //YOUR CODE
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 $conn->close();
 }


 ?>