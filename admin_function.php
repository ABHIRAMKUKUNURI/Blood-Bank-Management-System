<?php 
function load_donor($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>NAME</th>
				<th>GENDER</th>
				<th>BLOOD-GROUP</th>
				<th>AGE</th>
				<th>MOBILE</th>
				<th>ADDRESS</th>
				<th>View</th>
				<th>Delete</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['fname']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".$row['blood_group']."</td>";
									echo "<td>".$row['age']."</td>";
									echo "<td>".$row['mobnum']."</td>";
									echo "<td>".$row['adress']."</td>";
										
									echo "<td><a href='admin_view_donor.php?id=".$row['DONOR_ID']."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									echo "<td><a href='admin_delete_donor.php?id=".$row['DONOR_ID']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
									echo "</tr>";
								}
							}
							
						
				
			echo'</table>';

}

function load_patient($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Blood</th>
				<th>Unit</th>
				<th>Hospital</th>
				<!--<th>Reason</th>-->
				<th>R-Date</th>
				<!--<th>Status</th>-->
				<th>Update</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['fname']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".$row['blood_group']."</td>";
									echo "<td>".$row['BUNIT']."</td>";
									echo "<td>".$row['refhosp']."</td>";
									//echo "<td>".$row['REASON']."</td>";
									echo "<td>".$row['l_recieved']."</td>";
										
									
									echo "<td><a href='admin_view_request.php?id={$row['ID']}' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									
									
									echo "</tr>";
									
								}
							}
							else
							{
								echo "<div >No Blood Request Yet</div>";
							}
						
				
			echo'</table>';

}


?>
