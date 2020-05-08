<!DOCTYPE html>
<html>
<head>
		<link href="css/style.css" rel="stylesheet">
    <title>Rental Table</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            color: white;
            font-family: Papyrus;
            font-size: 12.5px;
            text-align:left;
        }
        th{
            
 
            color :white;
            text-align: left;
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
            <th><font size="5" color="#8961b9">Rental Id</font></th>
            <th><font size="5" color="#8961b9">Rental Date</font></th>
            <th><font size="5" color="#8961b9">Inventory Id</font></th>
            <th><font size="5" color="#8961b9">Customer Id</font></th>
            <th><font size="5" color="#8961b9">Return Date</font></th>
            <th><font size="5" color="#8961b9">Staff Id</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
			<th><font size="5"><a href="rental_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT rental_id,rental_date,inventory_id,customer_id,return_date,staff_id,last_update FROM rental";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["rental_id"]. "</td><td>" .$row["rental_date"]."</td><td>" . $row["inventory_id"]."</td><td>" .$row["customer_id"]."</td><td>" .$row["return_date"]."</td><td>" .$row["staff_id"]."</td><td>" . $row["last_update"]."</td></tr>";
        
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