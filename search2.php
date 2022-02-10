<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <LINk type="text/css" rel="stylesheet" href="style1.css"></LINk>
</head>
<body>
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
$City=$_POST['City'];
$BLOOD_GROUP=$_POST['bgroup'];
$sql="SELECT * FROM `donordetails` WHERE city='$City' && blood_group='$BLOOD_GROUP'";

$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc())
{
echo " email ".$row["email"]."-Name ".$row["First_Name"]."-Phone number: ".$row["Mobile_Number"]. "-City: ".$row["City"]."-Blood Group: ".$row["BLOOD_GROUP"]."<br>";}
}
else
{
echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>