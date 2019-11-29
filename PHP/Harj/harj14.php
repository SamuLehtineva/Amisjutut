<?php 
$x = 5;
$y = 4; 
echo $x + $y; 
?>
<br>
<?php 
$euro = 100; 
$kurssi = 1.459; 
$dollari = $euro * $kurssi; 
echo "Dollarin kurssi: ",  $kurssi, "<br>"; 
echo "Sinulla on euroja ", $euro, "<br>";  
echo "Dollareita saat: ", $dollari; 
?>
<br>
<?php
define("GREETING", "Welcome to W3Schools.com!"); 

function myTest() { 
    echo GREETING; 
} 
  
myTest(); 
?>
<br>
<?php 
$t = date("H"); 

if($t < 20) { 
    echo "Have a good day!"; 
} else { 
    echo "Have a good night!"; 
}
?>
<br>
<?php 
$t = DATE("H"); 

if ($t < "10") { 
echo "Have a good morning!"; }
 else {
	 if ($t < "20") { 
		echo "Have a good day!"; }
	else { 
		echo "Have a good night!";
}		
} 
?> 
<br>
<?php 
$muuttuja = "toinen"; 
switch($muuttuja) { 
case "eka" : 
echo "eka case"; 
break;
case "toinen" ; 
echo "toka case"; 
break; 
default : 
echo "$default komento "; 
break; 
} 
?> 
<br>
<?php 
$tieto=67; 
$i=0; 
while($i <=19) { 
echo $tieto, "<br>"; 
$tieto++; 
$i++; } 
?>
<br>
<?php 
for ($x = 0; $x <= 10; $x++) { 
    echo "The number is: $x", "<br>";
}  
?>
<br>
<?php 
  if(!empty($_POST["formMovie"]) && !empty($_POST["formName"])) 
  { 
    $varMovie =$_POST ["formMovie"]; 
    $varName =$_POST ["formName"]; 
    echo $varMovie."<br>"; 
    echo $varName; 
  } 

?> 

<form action="./index.php?sivu=harj14&kansio=Harj" method="post"> 
    Which is your favorite movie? 
    <input type="text" name="formMovie" maxlength="50" value="Batman"> 
    What is your name? 
    <input type="name" name="formName" maxlength="50" value="Johny"> 
    <input type="submit" name="formSubmit" value="Submit"> 
</form>
<br>

<!DOCTYPE HTML>   
<html> 
<head> 
<style> 
.error {color: FF0000;} 
</style>
<body>   

<?php 
// define variables and set to empty values 
$nameErr = $emailErr = $genderErr = $websiteErr = ""; 
$name = $email = $gender = $comment = $website = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  if (empty($_POST["name"])) { 
    $nameErr = "Name is required"; 
  } else { 
    $name = test_input($_POST["name"]); 
    // check if name only contains letters and whitespace 
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
      $nameErr = "Only letters and white space allowed";  
    } 
  } 
   
  if (empty($_POST["email"])) { 
    $emailErr = "Email is required"; 
  } 
  else { 
    $email = test_input($_POST["email"]); 
    // check if e-mail address is well-formed 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
      $emailErr = "Invalid email format";  
    } 
  } 
     
  if (empty($_POST["websit"])) { 
    $website = ""; 
  }
 else { 
    $website = test_input($_POST["website"]); 
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL) 
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) { 
      $websiteErr = "Invalid URL";  
    } 
  } 

  if (empty($_POST["comment"])) { 
    $comment = ""; 
  } else { 
    $comment = test_input($_POST["comment"]); 
  } 

  if (empty($_post["gender"])) { 
    $genderErr = "Gender is required"; 
  } else { 
    $gender = test_input($_post["gender"]); 
  } 
} 

function test_input($data) { 
  $data = trim($data); 
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data; 
} 
?> 


<p><span class="error">* required field.</span></p> 
<form action="./index.php?sivu=harj14&kansio=Harj" method="post">   
  Name: <input type="text" name="name" value="<?php echo $name;?>"> 
  <span class="error">* <?php echo $nameErr;?></span> 
  <br><br> 
  E-mail: <input type="text" name="email" value="<?php echo $email;?>"> 
  <span class="error">* <?php echo $emailErr;?></span> 
  <br><br> 
  Website: <input type="text" name="website" value="<?php echo $website;?>"> 
  <span class="error"><?php echo $websiteErr;?></span> 
  <br><br> 
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea> 
  <br><br> 
  Gender: 
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female 
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 
  <span class="error">* <?php echo $genderErr;?></span> 
  <br><br> 
  <input type="submit" name="submit" value="Submit">   
</form> 

<?php 
echo "<h2>Your Input:</h2>"; 
echo $name; 
echo "<br>"; 
echo $email; 
echo "<br>"; 
echo $website; 
echo "<br>"; 
echo $comment; 
echo "<br>"; 
echo $gender; 
?> 

</body> 
</html>
