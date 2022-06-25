<?php
require_once '../../BusinessServiceLayer/controller/itemController.php';

$inventory = new itemController();	

if(isset($_POST['Add']))
{
    $inventory->add();
}


if(isset($_POST['search']))
{

    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * , qtreceived * unitPrice as total FROM `inventory` WHERE CONCAT(`ItemID`, `itemName`, `dateOrder`, `companyName`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
else
{
 $query= "SELECT ItemID, itemName, qtorder, qtreceived, unitPrice, qtreceived * unitPrice as total, location, dateOrder, 
 dateArrived, companyName, companyAddress, senderName, truckPlateNo FROM inventory;"; 
 $search_result = filterTable($query);
}


 function filterTable($query)
 {
   $connection = mysqli_connect("localhost:3307","root","","mydatabase2"); 
   $filter_Result = mysqli_query($connection, $query);
   return $filter_Result;

 }

?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>IVMS | In-Item</title>
<style>

/* Header */
.header {
  text-align: center;
  background: #508585;
  color: white;
  font-size: 26px;
  font-family: cooper black;
  width:1732px;
  height:120px;
  padding: 2px 25px 7px;
}

/* Column(kotak putih) */
.column1 {
		  background-color: white;
		  margin-left: 0px; margin-right: 5px; margin-top: 10px;
		  float: left;
		  width:1732px;
		  padding: 0px 25px 7px;
		  height: 1000px;
		}
		
/* Delete Input */		
.col{
	width: 40%;
	position: center;

}

.userin{
	width: 30%;
	height: 33px;
}
		
/* Table */
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  margin-top: 35px;
}

th, td {
  padding: 10px;
  text-align: center;
}

th {
  background-color: black;
  color: white;
}

/* Navigation Bar */
ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #333;
		}

		li {
		  float: left;
		}

		li a {
		  display: block;
		  color: white;
		  font-family: cooper black;
		  text-align: center;
		  padding: 14px 20px;
		  text-decoration: none;
		}

		li a:hover:not(.active) {
		  background-color: #B6D5D5;
		}

		.activeNav {
		  background-color: #7EDADB;
		}
		
body{ background-color: #7EDADB }

/* Green Button */
.btn {
  border: none;
  background-color: inherit;
  padding: 14px 28px;
  font-size: 15px;
  cursor: pointer;
  display: inline-block;
  margin-top: 40px;
}

.success:hover {
  background-color: #b4d463;
  color: white;
}

.active, .btn:hover {
  background-color: #04AA6D;
  color: white;
}

/* Footer */
.footer{
        position: absolute;
		background-color: #508585;
		height: 50px;
		width:1732px;
		padding: 2px 25px 7px;
		top: 1075px;
        left: 7px;
	}
	
/* Dropdown Button */
.dropdown {
  position: relative;
  display: inline-block;
}
	
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

/* Dropdown Button */
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

</style>
</head>

<body>
<!--HEADER-->
<div class="header">
  <h1>INVENTORY MANAGEMENT SYSTEM</h1>
</div>

<!--NAVIGATION BAR-->
<ul>
  <li><a href="/SEM_PROJECT/login/Admin%20login/h.php">HOME</a></li>
  <li><a href="../ManageStaffInformation/myInfo.php">STAFF</a></li>
  <li><a class="activeNav" href="../ManageInventory/In_Item.php">INVENTORY</a></li>
  <li><a href="../ManageItemOrderList/Item%20Order%20List%20Home.php">ITEM ORDER LIST</a></li>
  <li style="float:right"><a href="http://localhost/ivms/login/">LOGOUT</a></li>
  <li style="float:right"><a href="../Audit%20Report/auditlist.php">AUDIT</a></li>
  <li style="float:right"><a href="../GenerateReport/GenerateReport.php">REPORT</a></li>
  </ul>

<!--COLUMN 1-->
<div class="column1">
<div>
<center>
<br>
  <div class="dropdown">
    <button class="dropbtn">Select an Option</button>
     <div id="myDropdown" class="dropdown-content">
       <a href="In_Item.php">In-Item</a>
       <a href="Out_Item.php">Out-Item</a>
       <a href="add_Item.php">Add Item</a>
       <a href="delete_Item.php">Delete Item</a>
    </div>
  </div>
<br><br>

<form action="filter.php" method="POST">
<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br> 
<input type="submit" name="search" value="Filter"><br><br>
</center>
</div>
<!--DISPLAY-->  
  <table>
  <tr>
    <th>ITEM ID</th>
    <th>ITEM NAME</th>
    <th>QUANTITY ORDER</th>
	<th>QUANTITY RECEIVED</th>
	<th>UNIT PRICE (RM)</th>
	<th>TOTAL PRICE (RM)</th>
    <th>LOCATION</th>
	<th>DATE ORDER</th>
    <th>DATE ARRIVED</th>
	<th>COMPANY NAME</th>
	<th>COMPANY ADDRESS</th>
    <th>SENDER NAME</th>
	<th>TRUCK PLATE NO</th>
	<th>ACTION</th>
  </tr> 
</div>

<?php

        while ($row = mysqli_fetch_assoc($search_result)){
            ?>
            <tr>
            <td><?= $row['ItemID'];?></td>
            <td><?= $row['itemName'];?></td>
            <td><?= $row['qtorder'];?></td>
            <td><?= $row['qtreceived'];?></td>
            <td><?= $row['unitPrice'];?></td>
            <td><?= $row['total'];?></td>
            <td><?= $row['location'];?></td>
            <td><?= $row['dateOrder'];?></td>
            <td><?= $row['dateArrived'];?></td>
            <td><?= $row['companyName'];?></td>
            <td><?= $row['companyAddress'];?></td>
            <td><?= $row['senderName'];?></td>
            <td><?= $row['truckPlateNo'];?></td>
            <td><a href="editItem.php?ItemID=<?php echo $row['ItemID']; ?>">Edit</a></td>
            </tr>
        <?php
            }
    ?>  
               </table>
        </form>
<div> 
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
<!--FOOTER-->
  <div style="margin-top:140px;" class="footer">
  <p style="color:white;margin-top:25px;">2021 &#169; BING'S CORP</p>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>