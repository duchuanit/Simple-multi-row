<?php
$connect=mysqli_connect("localhost","root","","form");
// Begin Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// End Check connection
$sql = "SELECT * FROM tbl_name";// Select dữ liệu

$result = mysqli_query($connect, $sql);// kết nối
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]." - Age: " . $row["age"]. " - Job: " . $row["job"]."<br>";
    }
} else {echo "0 results";}

if(isset($_POST['submit_row']))
{
 $name=$_POST['name'];
 $age=$_POST['age'];
 $job=$_POST['job'];
 for($i=0;$i<count($name);$i++)
 {
  if($name[$i]!="" && $age[$i]!="" && $job[$i]!="")
  {
	$sql="INSERT INTO tbl_name (name,age,job) values('$name[$i]','$age[$i]','$job[$i]')";

	if (mysqli_query($connect, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}

  }
 }
}

?>