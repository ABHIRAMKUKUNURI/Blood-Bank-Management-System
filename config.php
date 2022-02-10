<?php 

$con=new mysqli("localhost","root","","blood-bank");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>