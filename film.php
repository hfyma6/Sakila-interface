<!DOCTYPE html>
<html>
<head>

		<link href="css/style.css" rel="stylesheet">
    <title>Film Table</title>
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
            text-align:center;
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
            <th><font size="5" color="#8961b9">Release Year</font></th>
            <th><font size="5" color="#8961b9">Language Id</font></th>
            <th><font size="5" color="#8961b9">Duration</font></th>
            <th><font size="5" color="#8961b9">Rate</font></th>
            <th><font size="5" color="#8961b9">Length</font></th>
            <th><font size="5" color="#8961b9">Replacement Cost</font></th>
            <th><font size="5" color="#8961b9">Rating</font></th>
            <th><font size="5" color="#8961b9">Special Features</font></th>
            <th><font size="5" color="#8961b9">Last Update</th>
            <th><font size="5"><a href="film_query.php">Edit</a></font></th>

</tr>
<?php

//create connection
$conn= mysqli_connect("localhost","root","","sakila");

//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn-> connect_error);
}

$sql= "SELECT film_id, title, description1,release_year,language_id,rental_duration,rental_rate,length1,replacement_cost,rating,special_features,last_update FROM film";
$result=$conn-> query($sql);

if($result-> num_rows > 0){
    //output data for each row
    while($row= $result-> fetch_assoc()){
        echo "<tr><td>". $row["film_id"]. "</td><td>" .$row["title"]."</td><td>" . $row["description1"]."</td><td>".$row["release_year"]."</td><td>" .$row["language_id"]."</td><td>".$row["rental_duration"]."</td><td>" .$row["rental_rate"]. "</td><td>"  .$row['length1']."</td><td>" .$row['replacement_cost']."</td><td>".$row['rating']."</td><td>" .$row['special_features'] ."</td><td>".$row['last_update']."</td></tr>";

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