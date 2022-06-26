<?php
	require_once '../../BusinessServiceLayer/controller/BookController.php';	

	$edit = new controller();

	if(isset($_POST['edit']))
	{
  		$edit->edit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/allExcludeLogin.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<title>IVMS | Edit Booking</title>
	<style>
	body {
  margin: 0;
}

		table{
		text-align: left;
		width: 35%;
		margin-left: auto;
        margin-right: auto;
        margin-top: -170px;
	}

		input[type=text],[type=date],select[name=status]  {
		  width: 100%;
		  height: 33px;
		  margin: 8px 0px;
		  margin-left: 0px;
		  box-sizing: border-box;
		}

		input[type=file]{
		  width: 100%;
		  height: 33px;
		  margin: 8px 0px;
		  padding-top: 7px;
		  box-sizing: border-box;
		}

		th{
			width: 20%;
		}

		.size{width:100%; height: 100px}

		.button{
			width: 25%;
			height: 40px;
		}
		.footer{
			height:85px;
		}
		.activeNav {
		  background-color: #7EDADB;
		}

		.auditmenu a{
			width: 10%;
			height: 40px;
		}
		
	</style>
	<!-- 1. HEADER-->
	<div class="header" >
	<h1>Booking</h1>
	</div>
	<!-- SAMPAI SINI -->
</head>
<body>
	<!-- 2. NAVIGATION BAR-->
  <ul>

      <li><a href="http://localhost/ivms/login/Admin%20login/h.php">HOME</a></li>
	  <li><a class="activeNav" href="http://localhost/IVMS/ApplicationLayer/BookItem/BookItem.php">BOOKING</a></li>
	  <li style="float:right"><a href="http://localhost/ivms/login/">LOGOUT</a></li>
	</ul>
	<!--SAMPAI SINI-->
	
	<br><br>
<div style="background-color:white; padding-bottom: 8%; margin-left:0px; margin-right:0px; margin-top: 25px"  >
<h2><center><br><br><br>&nbsp EDIT BOOKING LIST</center></h2>

<!--FORM-->
<!--TO EDIT DATA-->
<form action="" method="post" name="frmUser">
	<table>

		<tr>
			<th>Booking ID:</th>
			<td width="100%"><input type="text" name="BookingID" placeholder="Booking ID"><td>
		</tr>
		<tr>
			<th>Staff ID:</th>
			<td width="100%"><input type="text" name="id" placeholder="Staff ID"></td>
		</tr>
		<tr>
			<th>Item ID:</th>
			<td width="100%"><input type="text" name="ItemID" placeholder="Item ID"></td>
		</tr>
        <tr>
			<th>Item Quantity:</th>
			<td width="100%"><input type="text" name="ItemQuantity" placeholder="Item Quantity"></td>
		</tr>
		<tr>
			<th>Booking Date:</th>
			<td><input width="100%" type="date" name="DateBooking"></td>
		</tr>
        <tr>
			<th>Booking Time:</th>
			<td input width="100%"><input type="time" name="BookingTime"></td>
		</tr>
        <tr>
			<th>Pickup Date:</th>
			<td><input width="100%" type="date" name="PickUpDate"></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center; padding-top: 10px;">
			<i class="fa fa-save" style="padding-right: 10px;"></i> <input class="button" type="submit" name="edit" value="Submit">
			</td>
		</tr>
	
		</form>
	</table>
<!--FORM-->

</div>

</body>
</html>