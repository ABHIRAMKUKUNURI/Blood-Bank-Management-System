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
			<h3 class='text-primary'><i class="fa fa-users"></i> Donor Details </h3><hr>    
		<div class="row">
		<?php 
		if(isset($_GET["id"]))
		{
			$sql="SELECT * FROM donordetails WHERE DONOR_ID=".$_GET["id"];
			$result=$con->query($sql);
			//if($result->num_rows>0)
			if($result !== false && $result->num_rows > 0)
			{
				$row=$result->fetch_assoc();
				
		?>
		<!--<div class="col-md-4">
					<div class="panel">
					<div class="panel-body">
					<img src="</?php echo $row["DONOR_PIC"];?>" class="image-rounded" height="300px" width="100%">
			</div>-->
			</div>
			
		</div>
		<div class="col-md-8">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<td><?php echo $row["fname"];?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo $row["lname"];?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?php echo $row["gender"];?></td>
			</tr>
			<tr>
				<th>D.O.B</th>
				<td><?php echo $row["dob"];?></td>
			</tr>
			<tr>
				<th>Blood Group</th>
				<td><?php echo $row["blood_group"];?></td>
			</tr>
			<tr>
				<th>Body Weight</th>
			<td><?php echo $row["body_weight"];?></td> 
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $row["email"];?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo $row["adress"];?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $row["city"];?></td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td><?php echo $row["pin"];?></td>
			</tr>
			<!--<tr>
				<th>State</th>
				<td><//?php echo $row["STATE"];?></td>
			</tr>-->
	
			<tr>
				<th>Contact</th>
				<td><?php echo $row["mobnum"];?></td>
			</tr>
			
			<tr>
				<th>Last Donoted Date</th>
				<td><?php echo $row["l_donated"];?></td>
			</tr>
			
			<tr>
				<th>Status</th>
				<td><?php 
				
					$status=$row["STATUS"];
					if($status==0)
					{
						echo'<a href="admin_activate.php?id='.$row["DONOR_ID"].'" class="btn btn-sm btn-danger">Activate Now</a>';
					}
					else
					{
							echo'<a href="admin_deactivate.php?id='.$row["DONOR_ID"].'" class="btn btn-sm btn-success">Deactivate Now</a>';
					}
				
				?></td>
			</tr>
			
		</table>
		</div>
	
		
		<?php
			}
		}	
		else
		{
		echo "<script>window.open('admin_donor.php','_self');</script>";
		}

		?>	
			
	<!--	<form class="col-md-6" method="post" action="update_last.php">
			<div class="form-group">
				<label class="control-label text-primary" for="ldata">Last Donate Date</label>
				<input type="text"  placeholder="YYYY/MM/DD" required id="ldata" name="ldata"  class="form-control input-sm DATES">
			</div>
			<input type="hidden" name="id" value="<//?php echo $_GET["id"];?>">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
						
		</form>
	-->
		</div>
		</div>
	</div>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
  <script>
  </script>

	</body>
</html>