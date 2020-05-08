<!DOCTYPE html>
<html>
<head>
		<link href="css/style.css" rel="stylesheet">
    <title>Inventory Table</title>
    <style type="text/css">
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
        }
    </style>
</head>


<body>
    
<header> 
<center>
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
  </center>
    </header>
<table>
        <tr>
            <th><font size="5" color="#8961b9">Inventory Id</font></th>
            <th><font size="5" color="#8961b9">Film Id</font></th>
            <th><font size="5" color="#8961b9">Store Id</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
			<th><font size="5"><a href="inventory_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT inventory_id,film_id,store_id,last_update FROM inventory";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["inventory_id"]. "</td><td>" .$row["film_id"]."</td><td>" . $row["store_id"]."</td><td>" . $row["last_update"]."</td></tr>";
        
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