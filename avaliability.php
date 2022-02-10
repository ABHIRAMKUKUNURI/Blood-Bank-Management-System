<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="blood-bank";


$conn = mysqli_connect($server_name,$username ,$password,$database_name);
if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}
$inCity=$_POST["city"];
$inBloodgroup=$_POST["bgroup"];
$sql="select * from donar reg where (city='".$inCity."' && bgroup='".$inBloodgroup."')";
echo " <center><table border='1px'><tr><th>Email </th>";
echo " <th>Name </th>";
echo " <th>Mobile </th>";
echo " <th>City </th>";
echo " <th>Blood Group </th>";

$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo " <tr><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["phn"]."</td><td>".$row["city"]."</td><td>".$row["bgroup"]."</td></tr>";
}
echo "</table></center>";
}
else
{
?>
	<script type="text/javascript">alert('No data found !!!');</script>
<?php	
	echo" NO RESULTS! ";
}
mysqli_close($conn);
?>