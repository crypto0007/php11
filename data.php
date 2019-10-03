<?php
	$id=$_REQUEST['id'];
	$con=mysqli_connect("localhost:3309","root","","stddb");
	$qry="select * from register where u_id=".$id;
	$res=mysqli_query($con,$qry);
	while($row=mysqli_fetch_array($res))
	{
		echo "<td>".$row['name']."</tr>";
		echo "<td>".$row['mobile_no']."</tr>";
		echo "<td>".$row['email']."</tr>";
		echo "<td>".$row['city']."</tr>";
	}
?>