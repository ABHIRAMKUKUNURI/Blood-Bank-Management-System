<?php
session_start();
include("config.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	</head>
	<body>

<?php include("admin_topnav.php"); ?>
<div class="container"  style='margin-top:70px'>
	<div class="row">
		<div class="col-sm-3">
			<?php include("admin_side_nav.php");?>
		</div>
		<div class="col-sm-9" >
			<h3 class='text-primary'><i class="fa fa-bed"></i> Patient Details </h3><hr>    
		<div class="row">
		<?php 
		
			if(isset($_POST["submit"]))
			{
				$id=$_GET['id'];
				$cdate=$_POST["CDATE"];
				$status=$_POST["STATUS"];
				if($cdate=="")
				{
					$cdate="0000-00-00";
					$status=1;
				}
			$sql="UPDATE request_blood SET CDATE='{$cdate}',STATUS='{$status}' WHERE ID='{$id}'";
				if($con->query($sql))
				{
					
					$s= "<div class='alert alert-success fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success : </strong> Status Updated Success.</div>";
				}
			
			}
			
		
		if(isset($_GET["id"]))
		{
			$sql="SELECT * FROM recepientdetails WHERE ID=".$_GET["id"];
			$result=$con->query($sql);
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				
		?>

			
		</div>
		<div class="col-md-8">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<td><?php echo $row["fname"];?></td>
			</tr>
			<tr>
				<th>Blood</th>
				<td><?php echo $row["blood_group"];?></td>
			</tr>
			<tr>
				<th>UNIT</th>
				<td><?php echo $row["BUNIT"];?></td>
			</tr>
			<tr>
				<th>Hospital</th>
				<td><?php echo $row["refhosp"];?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $row["city"];?></td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td><?php echo $row["pin"];?></td>
			</tr>
			<tr>
				
			</tr>
			
			<tr>
				<th>Address</th>
				<td><?php echo $row["adress"];?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $row["email"];?></td>
			</tr>
			<tr>
				<th>Contact</th>
				<td><?php echo $row["mobnum"];?></td>
			</tr>
			
			<tr>
				<th>Status</th>
				<td><?php 
				if($row["STATUS"]==0)
				{
					echo "<b>Pending</b>";
				}
				else if($row["STATUS"]==1)
				{
					echo "<b>Not Completed</b>";
				}	
				else if($row["STATUS"]==2)
				{
					echo "<b>Completed</b>";
				}
					
					
					?></td>
			</tr>
			
		</table>
		</div>
		<div class="col-md-6">
		<h3 class='text-primary'></h3>
		<hr>
			<a href='admin_need_blood.php' class='btn btn-primary '>Back Page</a>
		</form>
		</div>
		<?php
			}
		}	
		else
		{
		echo "<script>window.open('admin_donor.php','_self');</script>";
		}

		?>	
					
		</div>
		</div>
	</div>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
  

	</body>
</html>