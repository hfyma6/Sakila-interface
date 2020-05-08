<!DOCTYPE html>
<html>
<body>

<?php
$option = $_POST['tables'];

if ($option == 'actor')
  {
    require('actor.php');
              
  }

if ($option =='address')
  {
    require('address.php');
    
  }
  if ($option =='category')
  {
    require('category.php');
    
  }
  if ($option =='city')
  {
    require('city.php');
    
  }
  if ($option =='country')
  {
    require('country.php');
    
  }
  if ($option =='customer')
  {
    require('customer.php');
    
  }
  if ($option =='film')
  {
    require('film.php');
    
  }
  if ($option =='film_actor')
  {
    require('film_actor.php');
    
  }
  if ($option =='film_category')
  {
    require('film_category.php');
    
  }

  if ($option =='film_text')
  {
    require('film_text.php');
    
  }
  if ($option =='inventory')
  {
    require('inventory.php');
    
  }
  if ($option =='language')
  {
    require('language.php');
    
  }
  if ($option =='payment')
  {
    require('payment.php');
    
  }
  if ($option =='rental')
  {
    require('rental.php');
    
  }
  if ($option =='staff')
  {
    require('staff.php');
    
  }

  if ($option =='store')
  {
    require('store.php');
    
  }
?>

</body>
</html>