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

    $customer_id="";
    $first_name="";
    $last_name="";
    $email="";
    $address_id="";
    $create_date="";
    $last_update="";
    $active="";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    


    try{
        $connect = mysqli_connect($host,$username,$password,$database);
    }catch(Exception $ex){
        echo "error";
    }

    function getPosts()
    {
      $posts=array();
      $posts[0]=$_POST['customer_id'];
      $posts[1]=$_POST['store_id'];
      $posts[2]=$_POST['first_name'];
      $posts[3]=$_POST['last_name'];
      $posts[4]=$_POST['email'];
      $posts[5]=$_POST['address_id'];
      $posts[6]=$_POST['create date'];
      $posts[7]=$_POST['last_update'];
      $posts[8]=$_POST['active'];
      
      
       return $posts;
    }

    
    



?>
<center>
    
    <form action ="customer_query.php" method="post">
    
    <header>  
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
   </header>
        <br><br>
        <div>
        <label><font color="white"><strong>CUSTOMER ID :</strong></font></label>
        <input type="number" name="customer_id"  value="<?php echo $customer_id;?>"><br><br><br>
        </div>
        <label><font color="white"><strong>STORE ID :</strong></font></label>
        <input type="number" name="store_id"  value="<?php echo $store_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>FIRST NAME :</strong></font></label>   
        <input type="text" name="first_name"  value="<?php echo $first_name;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>LAST NAME :</strong></font></label>   
        <input type="text" name="last_name"  value="<?php echo $last_name;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>EMAIL :</strong></font></label>   
        <input type="text" name="email"  value="<?php echo $email;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>ADDRESS ID :</strong></font></label>
        <input type="number" name="address_id"  value="<?php echo $address_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>CREATE DATE :</strong></font></label>   
        <input type="tel" name="create_date"  value="<?php echo $create_date;?>"> <br><br><br>
        </div>    
        <label><font color="white"><strong>LAST UPDATE :</strong></font></label>   
        <input type="tel" name="last_update"  value="<?php echo $last_update;?>"> <br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>ACTIVE :</strong></font></label>
        <input type="number" name="active"  value="<?php echo $active;?>"><br><br><br>
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

    $searchquery="SELECT * FROM `customer` WHERE customer_id=$data[0] ";
    
    
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
                echo "<td>";echo "customer id"; echo "</td>";
                echo "<td>"; echo"store id"; echo "</td>";
                echo "<td>"; echo"first name"; echo "</td>";
                echo "<td>"; echo"last name"; echo "</td>";
                echo "<td>"; echo"email"; echo "</td>";
                echo "<td>"; echo"address id"; echo "</td>";
                echo "<td>"; echo"create date"; echo "</td>";
                echo "<td>"; echo"last_update"; echo "</td>";
                echo "<td>"; echo"active"; echo "</td>";


               echo "<tr>";
               echo "<td>";echo $row['customer_id']; echo"</td>";
               echo "<td>";echo $row['store_id']; echo"</td>";
               echo "<td>"; echo $row['first_name'] ; echo"</td>";
               echo "<td>"; echo $row['last_name'] ; echo"</td>";
               echo "<td>"; echo $row['email'] ; echo"</td>";
               echo "<td>"; echo $row['address_id'] ; echo"</td>";
               echo "<td>"; echo $row['create_date'] ; echo"</td>";
               echo "<td>";echo $row['last_update'];  echo"</td>";
               echo "<td>";echo $row['active'];  echo"</td>";

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
        $insertquery="INSERT INTO `customer` (`customer_id`,`first_name`,`last_name`,`email`,`address_id`,`create_date`,`last_update`,`active`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
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
        $deletequery="DELETE FROM `customer` WHERE `customer_id`=$data[0] ";
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
        $updatequery="UPDATE `customer` SET `customer_id`='$data[0]',`first_name`='$data[1]',`last_name`='$data[2]',`email`='$data[3]',`address_id`='$data[4]',`create_date`='$data[5]',`last_update`='$data[6]',`active`='$data[7]' WHERE `category_id`='$data[0]'";
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


