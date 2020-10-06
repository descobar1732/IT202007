<form method="POST">
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required/>
  <label for="p1">Password:</label>
  <input type="password" id="p1" name="password" required/>
  <label for="p2">Confirm Password:</label>
  <input type="password" id="p2" name="confirm" required/>
  <input type="submit" name="register" value="Register"/>
</form>

<?php
if(isset($_POST["register"])){
  $email = null;
  $password = null;
  $confirm = null;
  if(isset($_POST["email"])){
    $email = $_POST["email"];
  
  if(isset($_POST["password"])){
    $password = $_POST["password"];
  }
  if(isset($_POST["confirm"])){
    $confirm = $_POST["confirm"];
  }
  $isValid = true;
  if($password == $confirm){
    echo "Passwords match <br>"; 
  }
  else{
    echo "Passwords don't match<br>";
    $isValid = false}
  if(!isset($email) || !isset($password) || !isset($confirm)){
   $isValid = false; 
  }
  if($isValid){
    $hash = password_hash($password, PASSWORD_BCRYPT);
    echo "<br>Our hash: $hash<br>";
    echo "User registered (not really since we don't have a database setup yet)"; 
  }
  else{
   echo "There was a validation issue"; 
  }
}
?>

