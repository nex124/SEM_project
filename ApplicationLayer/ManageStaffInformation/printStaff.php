<?php
	require_once '../../BusinessServiceLayer/controller/staffController.php';	
	$staff = new staffController();

	$staff->viewMyInfo();//Call view myInfo function

	//Call add function
	if(isset($_POST['add']))
	{ 
	  	$staff->add();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<title>IVMS | UpdateStaffInformation</title>
	
	<!-- HEADER-->

</head>
<body>
	
<form action="" method="post" align="center">
		ID Number : <input style="width: 50%" type="text" name="id" placeholder="enter staff ID"> 
	<input class="button" type="submit" name="print" value="  Print  ">
	<input class="button" type="button" value="  Back  " onclick="document.location='myInfo.php'">
<div style="background-color:white; padding-bottom: 10%; margin :5px; margin-top: 10px">
	<hr>
<h3 style="text-align: center">Inventory Management System</h3>
<h3 style="text-align: center">Faculty Of Computing</h3>
<h3 style="text-align: center">Universiti Malaysia Pahang</h3>
<hr>
<br><br>
<!--Table to display my information-->
	<table class="center">
	<?php
		$link = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($link, "myDatabase");

		if(isset($_POST['print']))
		{
			$id = $_POST['id'];
			$sql = "SELECT * FROM staff WHERE id='$id'";
	    	$sql_run = mysqli_query($link, $sql);


	    	while($row = mysqli_fetch_array($sql_run))
	    	{
	    	?>
	    	
	    <form action="" method="post">
		<tr>
			<th>Name</th>
			<td width="100%"><?php echo $row['name']; ?></td>
			<td rowspan="8" ><i class="fa fa-user" style="font-size: 150px; padding-left: 30%;"></i>
				</td>
		</tr>
		<tr>
			<th>ID Number</th>
			<td><?php echo $row['id']; ?></td>
		</tr>
		<tr>
			<th>Phone Number</th>
			<td><?php echo $row['phone']; ?></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><?php echo $row['address']; ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $row['email']; ?></td>
		</tr>
		<tr>
			<th>Office Tel</th>
			<td><?php echo $row['officeTel']; ?></td>
		</tr>
		<tr>
			<th>Office Fax</th>
			<td><?php echo $row['officeFax']; ?></td>
		</tr>
		<tr>
			<th>Group</th>
			<td><?php echo $row['groupsList']; ?></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center">
			<i class="fa fa-edit"></i>
			<button class="button"onclick="window.print()">Print</button>
			<input class="button" type="button" value="Close" onclick="document.location='myInfo.php'">
			</td>
		</tr>
		</form>
		<?php
			}
		}
	?>
		
	</table>
</div>
<!-- FOOTER-->
</div>


</body>
</html>