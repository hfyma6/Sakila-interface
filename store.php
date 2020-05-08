<!DOCTYPE html>
<html>
<head>
		<link href="css/style.css" rel="stylesheet">
    <title>Store Table</title>
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
            <th><font size="5" color="#8961b9">Store Id</font><th>
            <th><font size="5" color="#8961b9">Manager Staff Id</font></th>
            <th><font size="5" color="#8961b9">Address Id</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
            <th><font size="5"><a href="store_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT store_id, manager_staff_id,address_id, last_update FROM store";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["store_id"]. "</td><td>" .$row["manager_staff_id"]."</td><td>". $row["address_id"]. "</td><td>" . $row["last_update"]."</td></tr>";
        
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