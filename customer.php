<!DOCTYPE html>
<html>
<head>

		<link href="css/style.css" rel="stylesheet">
    <title>Customer Table</title>
    <style>
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

<body>
<header> 
<center>
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
	</center>
 
    </header>
<body>


<table>
        <tr>
            <th><font size="5" color="#8961b9">Customer Id</font></th>
            <th><font size="5" color="#8961b9">Store Id</font></th>
            <th><font size="5" color="#8961b9">First Name</font></th>
            <th><font size="5" color="#8961b9">Last Name</font></th>
            <th><font size="5" color="#8961b9">Email</font></th>
            <th><font size="5" color="#8961b9">Address Id</font></th>
            <th><font size="5" color="#8961b9">Create Date</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
            <th><font size="5" color="#8961b9">Active</font></th>
			<th><font size="5"><a href="customer_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT customer_id,store_id,first_name,last_name,email,address_id,create_date,last_update ,active FROM customer";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["customer_id"]. "</td><td>" .$row["store_id"]."</td><td>" .$row["first_name"]."</td><td>".$row["last_name"]."</td><td>" .$row["email"]."</td><td>"  .$row["address_id"]."</td><td>"  .$row["create_date"]."</td><td>"  .$row["last_update"]."</td><td>" .  $row["active"]."</td></tr>";
        
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