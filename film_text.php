<!DOCTYPE html>
<html>
<head>
		<link href="css/style.css" rel="stylesheet">
        <meta charset=UTF-8">
    <title>Film Text Table</title>
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
            <th><font size="5" color="#8961b9">Film Id</font></th>
            <th><font size="5" color="#8961b9">Title</font></th>
            <th><font size="5" color="#8961b9">Description</font></th>
			<th><font size="5"><a href="filmtext_query.php">Edit</a></font></th>
</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT film_id,title,description FROM film_text";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["film_id"]. "</td><td>" .$row["title"]."</td><td>" .  $row["description"]."</td></tr>";
        
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