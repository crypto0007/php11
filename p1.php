<?php
	$con=mysqli_connect("localhost:3309","root","","stddb");
	$qry="select u_id,name from register";
	$res=mysqli_query($con,$qry);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<label for="name">Username</label>
		<select id="name" onchange="myFunction()">
			<?php
				while($row=mysqli_fetch_array($res))
				{
			?>
			<option value="<?php echo $row['u_id']; ?>"><?php echo $row['name']; ?></option>
			<?php
				}
			?>

		</select>
		<br><br>
		<table border="1">
			<tr>
				<td>name</td>
				<td>mobile no</td>
				<td>email</td>
				<td>city</td>
			</tr>
			<tr id="data"></tr>
		</table>
		<br><br>
		<input type="button" id='hidebtn' name='hidebtn' value='Hide'>
		<input type="button" id='showbtn' name='showbtn' value='show'>
	</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	function myFunction()
	{
		var id=document.getElementById("name").value;
		xmlHttp=new XMLHttpRequest();
		xmlHttp.onreadystatechange=function()
		{
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
					document.getElementById("data").innerHTML=this.responseText;
			}
		};
		xmlHttp.open("Post","data.php?id="+id,"true");
		xmlHttp.send();
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#hidebtn").click(function(){
				$("#data").hide();
		})
	});

	$(document).ready(function(){
		$("#showbtn").click(function(){
				$("#data").show();
		})
	});
</script>
</html>