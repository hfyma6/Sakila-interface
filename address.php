<!DOCTYPE html>
<html>
<head>	
	<link href="css/table.css" rel="stylesheet">
    <title>Address Table</title>
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
            color :black;
        }
    </style>
</head>
<STYLE>A{text-decoration:none;}</STYLE>
<body>
<header> 
<center>
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
    </header>
</center>
<table>
        <tr>
            <th><font size="5" color="#8961b9">Address Id</font></th>
            <th><font size="5" color="#8961b9">Address</font></th>
            <th><font size="5" color="#8961b9">Address2</font></th>
            <th><font size="5" color="#8961b9">District</font></th>
            <th><font size="5" color="#8961b9">City Id</font></th>
            <th><font size="5" color="#8961b9">Postal Code</font></th>
            <th><font size="5" color="#8961b9">Phone</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
            <th><font size="5"><a href="address_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT address_id,address,address2,district,city_id,postal_code,phone,last_update FROM address";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["address_id"]. "</td><td>".$row["address"]."</td><td>" . $row["address2"]."</td><td>". $row["district"]."</td><td>". $row["city_id"]."</td><td>". $row["postal_code"]."</td><td>".  $row["phone"]."</td><td>".$row["last_update"]."</td></tr>";
        
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