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

    $staff_id="";
    $first_name ="";
    $last_name="";
    $address_id="";
    $store_id="";
    $email="";
    $active="";
    $email="";
    $username1="";
    $password="";
    $last_update="";
    $picture="";
    

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    


    try{
        $connect = mysqli_connect($host,$username,$password,$database);
    }catch(Exception $ex){
        echo "error";
    }

    function getPosts()
    {
      $posts=array();
      $posts[0]=$_POST['staff_id'];
      $posts[1]=$_POST['first_name'];
      $posts[2]=$_POST['last_name'];
      $posts[3]=$_POST['address_id'];
      $posts[4]=$_POST['email'];
      $posts[5]=$_POST['store_id'];
      $posts[6]=$_POST['active'];
      $posts[7]=$_POST['username1'];
      $posts[8]=$_POST['password'];
      $posts[9]=$_POST['last_update'];
      $posts[10]=$_POST['picture'];

     
      
      
       return $posts;
    }

    
    



?>
<center>
    
    <form action ="staff_query.php" method="post">
    
    <header>  
    <h1><font size="40"><a href="Mainpage.html">SAKILA</a></font></h1>
   </header>
        <br><br>
        <div>
        <label><font color="white"><strong>STAFF ID :</strong></font></label>
        <input type="number" name="staff_id"  value="<?php echo $staff_id;?>"><br><br><br>
        </div>
        <label><font color="white"><strong>FIRST NAME :</strong></font></label>
        <input type="text" name="first_name"  value="<?php echo $first_name;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>LAST NAME :</strong></font></label>   
        <input type="text" name="last_name"  value="<?php echo $last_name;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>ADDRESS ID :</strong></font></label>   
        <input type="number" name="address_id"  value="<?php echo $address_id;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>EMAIL :</strong></font></label>   
        <input type="text" name="email"  value="<?php echo $email;?>"><br><br><br>
        </div>
        <div>
        <label><font color="white"><strong>STORE ID :</strong></font></label>
        <input type="number" name="store_id"  value="<?php echo $store_id;?>"><br><br><br>
        </div>
        <label><font color="white"><strong>ACTIVE  :</strong></font></label>   
        <input type="text" name="active"  value="<?php echo $active;?>"> <br><br><br>
        </div>
        <label><font color="white"><strong>USERNAME  :</strong></font></label>   
        <input type="text" name="username1"  value="<?php echo $username1;?>"> <br><br><br>

        <label><font color="white"><strong>PASSWORD  :</strong></font></label>   
        <input type="text" name="password"  value="<?php echo $password;?>"> <br><br><br>

        <label><font color="white"><strong>LAST UPDATE  :</strong></font></label>   
        <input type="tel" name="last_update"  value="<?php echo $last_update;?>"> <br><br><br>

        <label><font color="white"><strong>PICTURE  :</strong></font></label>   
        <input type="url" name="picture"  value="<?php echo $picture;?>"> <br><br><br>
        
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

    $searchquery="SELECT * FROM `staff` WHERE staff_id=$data[0] ";
    
    
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
                echo "<td>";echo "staff id"; echo "</td>";
                echo "<td>"; echo"first name"; echo "</td>";
                echo "<td>"; echo"last name"; echo "</td>";
                echo "<td>"; echo"address id "; echo "</td>";
                echo "<td>"; echo"email"; echo "</td>";
                echo "<td>"; echo"store id"; echo "</td>";
                echo "<td>"; echo"active"; echo "</td>";
                echo "<td>"; echo"username1"; echo "</td>";
                echo "<td>"; echo"password"; echo "</td>";
                echo "<td>"; echo"last update"; echo "</td>";
                echo "<td>"; echo"picture"; echo "</td>";
                


               echo "<tr>";
               echo "<td>";echo $row['staff_id']; echo"</td>";
               echo "<td>"; echo $row['first_name'] ; echo"</td>";
               echo "<td>"; echo $row['last_name'] ; echo"</td>";
               echo "<td>"; echo $row['address_id'] ; echo"</td>";
               echo "<td>"; echo $row['email'] ; echo"</td>";
               echo "<td>";echo $row['store_id'];  echo"</td>";
               echo "<td>";echo $row['active'];  echo"</td>";
               echo "<td>";echo $row['username1'];  echo"</td>";
               echo "<td>";echo $row['password'];  echo"</td>";
               echo "<td>";echo $row['last_update'];  echo"</td>";
               echo "<td>";echo $row['picture'];  echo"</td>";

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
        $insertquery="INSERT INTO `staff` (`staff_id`,`first_name`,`last_name`,`address_id`,`email`,`store_id`,`active`,`username1`,`password`,`last_update`,`picture`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[7]','$data[8]','$data[9]','$data[10]')";
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
        $deletequery="DELETE FROM `staff` WHERE `staff_id`=$data[0] ";
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
        $updatequery="UPDATE `staff` SET `staff_id`='$data[0]',`first_name`='$data[1]',`last_name`='$data[2]',`address_id`='$data[3]',`email`='$data[4]',`store_id`='$data[5]',`active`='$data[6]',`username1`='$data[7]',`password`='$data[8]',`last_update`='$data[9]',`picture`='$data[10]' WHERE `staff_id`='$data[0]'";
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


