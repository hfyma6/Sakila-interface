<!DOCTYPE html>
<html>
<head>
	
    <link href="css/table.css" rel="stylesheet">
	<title>Actor Table</title>
    <style>
        table{
            
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
<STYLE>A{text-decoration:none;}
</STYLE>
<body>

<header> 
	<center>
		<h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
	</center>
    </header>
	<center>
</center>

<table>
        <tr>
            <th><font size="5" color="#8961b9">Actor Id</font></th>
            <th><font size="5" color="#8961b9">First Name</font></th>
            <th><font size="5" color="#8961b9">Last Name</font></th>
            <th><font size="5" color="#8961b9">Last Update</font></th>
			<th><font size="5"><a href="actor_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT actor_id,first_name,last_name,last_update FROM actor";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["actor_id"]. "</td><td>".$row["first_name"]."</td><td>" . $row["last_name"]."</td><td>". $row["last_update"]."</td></tr>";
        
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