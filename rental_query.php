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

    $payment_id="";
    $customer_id ="";
    $staff_id="";
    $rental_id="";
    $amount="";
    $payment_date="";
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
      $posts[0]=$_POST['rental_id'];
      $posts[1]=$_POST['rental_date'];
      $posts[2]=$_POST['inventory_id'];
      $posts[3]=$_POST['customer_id'];
      $posts[4]=$_POST['return_date'];
      $posts[5]=$_POST['staff_id'];
      $posts[6]=$_POST['last_update'];
     
      
      
       return $posts;
    }

    
    



?>
<center>
    
    <form action ="rental_query.php" method="post">
    
    <header>  
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
   </header>
        <br><br>
        <div>
        <label><font color="white"><strong>RENTAL ID :</strong></font></label>
        <input type="number" name="rental_id"  value="<?php echo $rental_id;?>"><br><br><br>
        </div>
        <label><font color="white"><strong>RENTAL DATE :</strong></font></label>
        <input type="number" name="rental_date"  value="<?php echo $rental_date;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>INVENTORY ID :</strong></font></label>   
        <input type="number" name="inventory_id"  value="<?php echo $inventory_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>CUSTOMER ID :</strong></font></label>   
        <input type="number" name="customer_id"  value="<?php echo $customer_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>RETURN DATE :</strong></font></label>   
        <input type="number" name="return_date"  value="<?php echo $return_date;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>STAFF ID :</strong></font></label>
        <input type="number" name="staff_id"  value="<?php echo $staff_id;?>"><br><br><br>
        </div>
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

    $searchquery="SELECT * FROM `rental` WHERE rental_id=$data[0] ";
    
    
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
                echo "<td>";echo "rental id"; echo "</td>";
                echo "<td>"; echo"rental date"; echo "</td>";
                echo "<td>"; echo"inventory id"; echo "</td>";
                echo "<td>"; echo"customer id "; echo "</td>";
                echo "<td>"; echo"return date"; echo "</td>";
                echo "<td>"; echo"staff id"; echo "</td>";
                echo "<td>"; echo"last_update"; echo "</td>";
                


               echo "<tr>";
               echo "<td>";echo $row['rental_id']; echo"</td>";
               echo "<td>"; echo $row['rental_date'] ; echo"</td>";
               echo "<td>"; echo $row['inventory_id'] ; echo"</td>";
               echo "<td>"; echo $row['customer_id'] ; echo"</td>";
               echo "<td>"; echo $row['return_date'] ; echo"</td>";
               echo "<td>";echo $row['staff_id'];  echo"</td>";
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
        $insertquery="INSERT INTO `rental` (`rental_id`,`rental_date`,`inventory_id`,`customer_id`,`return_date`,`staff_id`,`last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
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
        $deletequery="DELETE FROM `rental` WHERE `rental_id`=$data[0] ";
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
        $updatequery="UPDATE `rental` SET `rental_id`='$data[0]',`rental_date`='$data[1]',`inventory_id`='$data[2]',`customer_id`='$data[3]',`return_date`='$data[4]',`staff_id`='$data[5]',`last_update`='$data[6]' WHERE `payment_id`='$data[0]'";
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


