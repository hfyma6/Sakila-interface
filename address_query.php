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
        background-color:black;
        color:white;
    }

</style>

<?php

    $host="localhost";
    $username="root";
    $password="";
    $database="sakila";

    $address_id="";
    $address="";
    $address2="";
    $district="";
    $city_id="";
    $postal_code="";
    $phone="";
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
      $posts[0]=$_POST['address_id'];
      $posts[1]=$_POST['address'];
      $posts[2]=$_POST['address2'];
      $posts[3]=$_POST['district'];
      $posts[4]=$_POST['city_id'];
      $posts[5]=$_POST['postal_code'];
      $posts[6]=$_POST['phone'];
      $posts[7]=$_POST['last_update'];
      
      
       return $posts;
    }

    
    



?>
<center>
    
    <form action ="address_query.php" method="post">
    
    <header>  
    <h1 class="logo"><font size="40" color="black"><a href="Mainpage.html">SAKILA</a></font></h1>
   </header>
        <br><br>
        <label><font color="white"><strong>ADDRESS ID :</strong></font></label>
        <input type="number" name="address_id"  value="<?php echo $address_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>ADDRESS :</strong></font></label>   
        <input type="text" name="address"  value="<?php echo $address;?>"><br><br><br>
        <div>
        <label><font color="white"><strong>ADDRESS2 :</strong></font></label>   
        <input type="text" name="address"  value="<?php echo $address;?>"><br><br><br>
        <div>
        <label><font color="white"><strong>DISTRICT :</strong></font></label>   
        <input type="text" name="address"  value="<?php echo $address;?>"><br><br><br>
        <div>
        <label><font color="white"><strong>CITY_ID :</strong></font></label>   
        <input type="number" name="city_id"  value="<?php echo $city;?>"><br><br><br>
        <div>
        <label><font color="white"><strong>POSTAL CODE :</strong></font></label>   
        <input type="number" name="postal_code"  value="<?php echo $postal_code;?>"><br><br><br>
        <div>
        <label><font color="white"><strong>PHONE :</strong></font></label>   
        <input type="number" name="phone"  value="<?php echo $phone;?>"><br><br><br>
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

    $searchquery="SELECT * FROM `address` WHERE address_id=$data[0] ";
    
    
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
                echo "<td>";echo "address id"; echo "</td>";
                echo "<td>"; echo"address"; echo "</td>";
                echo "<td>"; echo"address2"; echo "</td>";
                echo "<td>"; echo"district"; echo "</td>";
                echo "<td>"; echo"city_id"; echo "</td>";
                echo "<td>"; echo"postal_code"; echo "</td>";
                echo "<td>"; echo"phone"; echo "</td>";
                echo "<td>"; echo"last_update"; echo "</td>";


               echo "<tr>";
               echo "<td>";echo $row['address_id']; echo"</td>";
               echo "<td>"; echo $row['address'] ; echo"</td>";
               echo "<td>"; echo $row['address2'] ; echo"</td>";
               echo "<td>"; echo $row['district'] ; echo"</td>";
               echo "<td>"; echo $row['city_id'] ; echo"</td>";
               echo "<td>"; echo $row['postal_code'] ; echo"</td>";
               echo "<td>"; echo $row['phone'] ; echo"</td>";
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
        $insertquery="INSERT INTO `address` (`address_id`,`address`,`address2`,`district`,`city_id`,`postal_code`,`phone`,`last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
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
        $deletequery="DELETE FROM `address` WHERE `address_id`=$data[0] ";
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
        $updatequery="UPDATE `category` SET `address_id`='$data[0]',`address`='$data[1]',`address2`='$data[2]',`district`='$data[3]',`city_id`='$data[4]',`postal_code`='$data[5]',`phone`='$data[6]',`last_update`='$data[7]' WHERE `address_id`='$data[0]'";
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


