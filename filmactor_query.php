<!DOCTYPE Html>
<html>
       
    <head>
    <link href="css/style.css" rel="stylesheet">
        <title>search</title>
</head>
<body>
	
<style>
    .button{
        background-color: #d9c9fe;
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
        background-color: #d9c9fe;
        color: black;  
    }
    input[type=tel ]{
        background-color: #d9c9fe;
        color: black;  
    }

    input[type=number ]{
        background-color: #d9c9fe;
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

    $actor_id="";
    $film_id="";
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
      $posts[0]=$_POST['actor_id'];
      $posts[1]=$_POST['film_id'];
      $posts[2]=$_POST['last_update'];
      
      
       return $posts;
    }

    
    



?>
<center>
    
    <form action ="filmactor_query.php" method="post">
    
    <header>  
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
   </header>
        <br><br>
        <label><font color="white"><strong>ACTOR ID :</strong></font></label>
        <input type="number" name="actor_id"  value="<?php echo $actor_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>FILM ID :</strong></font></label>   
        <input type="number" name="film_id"  value="<?php echo $film_actor;?>"><br><br><br>
        <div>
        <label><font color="white"><strong>LAST UPDATE :</strong></font></label>   
        <input type="tel" name="last_update"  value="<?php echo $last_update;?>"> <br><br><br>
        </div>

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

    $searchquery="SELECT * FROM `film_actor` WHERE actor_id=$data[0] ";
    
    
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
                echo "<td>";echo "actor id"; echo "</td>";
                echo "<td>"; echo"film id"; echo "</td>";
                echo "<td>"; echo"last_update"; echo "</td>";


               echo "<tr>";
               echo "<td>";echo $row['actor_id']; echo"</td>";
               echo "<td>"; echo $row['film_id'] ; echo"</td>";
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
        $insertquery="INSERT INTO `film_actor` (`actor_id`,`film_id`,`last_update`) VALUES ('$data[0]','$data[1]','$data[2]')";
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
        $deletequery="DELETE FROM `film_actor` WHERE `actor_id`=$data[0] ";
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
        $updatequery="UPDATE `film_actor` SET `actor_id`='$data[0]',`film_id`='$data[1]',`last_update`='$data[2]' WHERE `actor_id`='$data[0]'";
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


