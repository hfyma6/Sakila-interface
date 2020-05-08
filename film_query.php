<!DOCTYPE Html>
<html>
       
    <head>
		<link href="css/style.css" rel="stylesheet">
        <title>search</title>
</head>
<body>
	
<style>
    .button{
        background-color:#d9c9fe;
        border :none;
        color: black;
        margin: 4px 2px;
    }
    label{
        float: left;
        width: 20em;
        text-align: right;
		padding-right: 0em;
        color: brown;
        
	
    }

    input[type=text ]{
        background-color:#d9c9fe;
        color: black;  
    }
    input[type=tel ]{
        background-color:#d9c9fe;
        color: black;  
    }
    input[type=url ]{
        background-color:#d9c9fe;
        color: black;  
    }

    input[type=number ]{
        background-color:#d9c9fe;
        color: black;  
    }

    table{

        color:white;
    }

</style>

<?php

    $host="localhost";
    $username="root";
    $password="";
    $database="sakila";

    $film_id="";
    $title ="";
    $description1="";
    $release_year="";
    $language_id="";
    $original_language_id="";
    $rental_duration="";
    $rental_rate="";
    $length1="";
    $replacement_cost="";
    $rating="";
    $special_features="";
    $last_update="";
    
    

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    


    try{
        $connect = mysqli_connect($host,$username,$password,$database);
    }catch(Exception $ex){
        echo "error";
    }

    function getPosts()
    {
      $posts=array();
      $posts[0]=$_POST['film_id'];
      $posts[1]=$_POST['title'];
      $posts[2]=$_POST['description1'];
      $posts[3]=$_POST['release_year'];
      $posts[4]=$_POST['language_id'];
      $posts[5]=$_POST['original_language_id'];
      $posts[6]=$_POST['rental_duration'];
      $posts[7]=$_POST['rental_rate'];
      $posts[8]=$_POST['length1'];
      $posts[9]=$_POST['replacement_cost'];
      $posts[10]=$_POST['rating'];
      $posts[11]=$_POST['special_features'];
      $posts[12]=$_POST['last_update'];

     
      
      
       return $posts;
    }

    
    



?>
<center>
    
    <form action ="film_query.php" method="post">
    
    <header>  
    <h1 class="logo"><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
   </header>
        <br><br>
        <div>
        <label><font color="white"><strong>FILM ID :</strong></font></label>
        <input type="number" name="film_id"  value="<?php echo $film_id;?>"><br><br><br>
        </div>
        <label><font color="white"><strong>TITLE  :</strong></font></label>
        <input type="text" name="title"  value="<?php echo $title;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>DESCRIPTION :</strong></font></label>   
        <input type="text" name="description1"  value="<?php echo $description1;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>RELEASE YEAR :</strong></font></label>   
        <input type="number" name="release_year"  value="<?php echo $release_year;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>LANGUAGDE ID :</strong></font></label>   
        <input type="number" name="language_id"  value="<?php echo $language_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>ORIGINAL LANGUAGE ID :</strong></font></label>
        <input type="number" name="original_language_id"  value="<?php echo $original_language_id;?>"><br><br><br>
        </div>
        <label><font color="white"><strong>RENTAL DURATION  :</strong></font></label>   
        <input type="text" name="rental_duration"  value="<?php echo $rental_duration;?>"> <br><br><br>
        </div>
        <label><font color="white"><strong>RENTAL RATE  :</strong></font></label>   
        <input type="number" name="rental_rate"  value="<?php echo $rental_rate;?>"> <br><br><br>

        <label><font color="white"><strong>LENGTH  :</strong></font></label>   
        <input type="number" name="length1"  value="<?php echo $length1;?>"> <br><br><br>

        <label><font color="white"><strong>REPLACEMENT COST  :</strong></font></label>   
        <input type="number" name="replacement_cost"  value="<?php echo $replacement_cost;?>"> <br><br><br>

        <label><font color="white"><strong>RATING  :</strong></font></font></label>   
        <input type="text" name="rating"  value="<?php echo $rating;?>"> <br><br><br>
        
        <label><font color="white"><strong>SPECIAL FEATURES  :</strong></font></label>   
        <input type="text" name="special_features"  value="<?php echo $special_features;?>"> <br><br><br>

        <label><font color="white"><strong>LAST UPDATE  :</strong></font></label>   
        <input type="tel" name="last_update"  value="<?php echo $last_update;?>"> <br><br><br>

        <div>
            <input type="submit"  class=button name="search" value="SEARCH">
            <input type ="submit"  class=button name="insert" value="INSERT">
            <input type ="submit"  class=button name="delete" value="DELETE">
            <input type ="submit" class=button name="update" value="UPDATE"><br><br><br>
        </div>
       
</form>

</center>
<?php

   //search 
if(isset($_POST['search']   ))
{
    

    $data=getPosts();

    $searchquery="SELECT * FROM `film` WHERE film_id=$data[0] ";
    
    
    $search_Result= mysqli_query($connect,$searchquery);
    
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {   
            echo "<br><br><br>";
            echo "<center>";
            echo "<table border=1>";
            
            while($row=mysqli_fetch_array($search_Result))
            {
                
                echo "<tr>";
                echo "<td>";echo "film id"; echo "</td>";
                echo "<td>"; echo"title "; echo "</td>";
                echo "<td>"; echo"description"; echo "</td>";
                echo "<td>"; echo"release year "; echo "</td>";
                echo "<td>"; echo"language id"; echo "</td>";
                echo "<td>"; echo"original language id"; echo "</td>";
                echo "<td>"; echo"rental duration"; echo "</td>";
                echo "<td>"; echo"rental rate"; echo "</td>";
                echo "<td>"; echo"length"; echo "</td>";
                echo "<td>"; echo"replacement cost"; echo "</td>";
                echo "<td>"; echo"rating"; echo "</td>";
                echo "<td>"; echo"special features"; echo "</td>";
                echo "<td>"; echo"last update"; echo "</td>";
                


               echo "<tr>";
               echo "<td>";echo $row['film_id']; echo"</td>";
               echo "<td>"; echo $row['title'] ; echo"</td>";
               echo "<td>"; echo $row['description1'] ; echo"</td>";
               echo "<td>"; echo $row['release_year'] ; echo"</td>";
               echo "<td>"; echo $row['language_id'] ; echo"</td>";
               echo "<td>"; echo $row['original_language_id'] ; echo"</td>";
               echo "<td>";echo $row['rental_duration'];  echo"</td>";
               echo "<td>";echo $row['rental_rate'];  echo"</td>";
               echo "<td>";echo $row['length1'];  echo"</td>";
               echo "<td>";echo $row['replacement_cost'];  echo"</td>";
               echo "<td>";echo $row['rating'];  echo"</td>";
               echo "<td>";echo $row['special_features'];  echo"</td>";
               echo "<td>";echo $row['last_update'];  echo"</td>";

                echo"</tr>";
                
               
                
                
            }
            echo "</table>";
           echo "</center>";
        }else{
            echo "No data for this id";
        }
    }else{
        echo "result error".$ex->getMessage();
    }
}

    //insert
    if(isset($_POST['insert']))
    {
        $data=getPosts();
        $insertquery="INSERT INTO `staff` (`film_id`,`title`,`description1`,`release_year`,`language_id`,`original_language_id`,`rental_duration`,`rental_rate`,`length1`,`replacement_cost`,`rating`,`special_features`,`last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]')";
        try{
            $insert_Result=mysqli_query($connect,$insertquery);

            if($insert_Result)
            {
                if(mysqli_affected_rows($connect)>0)
                {
                    echo "Data inserted";
                }else{
                    echo "Data not inserted";
                }
            }

        }catch(Exception $ex){
            echo "error insert".$ex->getMessage();
        }
    }

    //insert
    if(isset($_POST['delete']))
    {
        $data=getPosts();
        $deletequery="DELETE FROM `film` WHERE `film_id`=$data[0] ";
        try{
            $delete_Result=mysqli_query($connect,$deletequery);

            if($delete_Result)
            {
                if(mysqli_affected_rows($connect)>0)
                {
                    echo "Data deleted";
                }else{
                    echo "Data not deleted";
                }
            }

        }catch(Exception $ex){
            echo "error delete".$ex->getMessage();
        }
    }
    
    //insert
    if(isset($_POST['update']))
    {
        $data=getPosts();
        $updatequery="UPDATE `film` SET `film_id`='$data[0]',`title`='$data[1]',`description1`='$data[2]',`release_year`='$data[3]',`language_id`='$data[4]',`original_language_id`='$data[5]',`rental_duration`='$data[6]',`rental_rate`='$data[7]',`length1`='$data[8]',`replacement_cost`='$data[9]',`rating`='$data[10]',`special_features`='$data[11]' ,`last_update`='$data[12]'WHERE `film_id`='$data[0]'";
        try{
            $update_Result=mysqli_query($connect,$updatequery);

            if($update_Result)
            {
                if(mysqli_affected_rows($connect)>0)
                {
                    echo "Data updated";
                }else{
                    echo "Data not updated";
                }
            }

        }catch(Exception $ex){
            echo "error update".$ex->getMessage();
        }
    }
    

?>



</body>

</html>


