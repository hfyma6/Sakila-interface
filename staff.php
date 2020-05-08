<!DOCTYPE html>
<html>
<head>
		<link href="css/style.css" rel="stylesheet">
    <title>Staff Table</title>
    <style type="text/css">
        table{
            border-collapse: collapse;
            width: 100%;
            color: white;
            font-family: Papyrus;
            font-size: 12.5px;
            text-align:center;
        }
        th{
            
            color :white;
            text-align: center;
        }
    </style>
</head>
<STYLE>A{text-decoration:none;}</STYLE>
<body>
<header> 
<center>
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
  </center>
    </header>
<body>
<table>
        <tr>
            <th><font size="5" color="#8961b9">Staff Id</font></th>
            <th><font size="5" color="#8961b9">First Name</font></th>
            <th><font size="5" color="#8961b9">Last Name</font></th>
            <th><font size="5" color="#8961b9">Address Id</font></th>
            <th><font size="5" color="#8961b9">Email</font></th>
            <th><font size="5" color="#8961b9">Store Id</font></th>
            <th><font size="5" color="#8961b9">Active</font></th>
            <th><font size="5" color="#8961b9">Username</font></th>
            <th><font size="5" color="#8961b9">Password</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
            <th><font size="5" color="#8961b9">Picture</font></th>
			<th><font size="5"><a href="staff_query.php">Edit</a></font></th>
            
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT staff_id,first_name,last_name,address_id,email,store_id,active,username1,password,last_update,picture FROM staff";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["staff_id"]. "</td><td>" .$row["first_name"]."</td><td>" . $row["last_name"]."</td><td>" .$row["address_id"]."</td><td>" . $row["email"]."</td><td>" . $row["store_id"]."</td><td>". $row["active"]."</td><td>" . $row["username1"]."</td><td>". $row["password"]."</td><td>". $row["last_update"]."</td><td>". $row["picture"]."</td></tr>";
        
    }
    echo "</table>";
}
else{
    echo "0 result";
}

$conn-> close();
?>
</table>
</body>
</html>