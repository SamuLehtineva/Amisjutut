<?php include('app_logic.php');
?>
<html lang="fi">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <title>tyoajankirjausjarjestelma</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/css.css">
    <!--<link rel="stylesheet" href="main.css">-->
  </head>
  <body>
<nav class="navbar navbar-inverse">
     <div class="container-fluid">
    <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Työajankirjausjärjestelmä</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">
         </ul>
         <ul class="nav navbar-nav navbar-right">
             <li><a href="http://truudeli7.net/tyoajankirjaus/sivut/rekisteroidy.php">Rekisteröi uusi käyttäjä</a></li>
         </ul>
    </div>
     </div>
</nav>
<div class="content">
<div class="col-sm-2 col-xs- sidenav">
</div>
<?php
$db = mysqli_connect('truudeli7.net', 'truud286', 'nx[h2_SCqZy6', 'truud286_tyoajankirjaus');
$token = $_GET['token'];
//echo $token. "jee";
if(!empty($_POST["new_password"]||$_POST["new_password_c"])){
$new_password = mysqli_real_escape_string($db, $_POST['new_password']);
$new_password_c = mysqli_real_escape_string($db, $_POST['new_password_c']);
/*$new_password = $_POST['new_password'];
$new_password_c = $_POST['new_password_c'];*/
$token = $_POST['token'];
// Grab to token that came from the email link

    if (isset($new_password) && isset($new_password_c)){
        if ($new_password != $new_password_c){
            echo "Salasanat eivät täsmää.";
        }
        else{
            // select email address of user from the password_reset table 
            $sql = "SELECT email FROM password_resets WHERE token='$token'";
            $results = mysqli_query($db, $sql);
            $email = mysqli_fetch_assoc($results)['email'];
        
            $new_password.="puppu";
            $new_password = md5($new_password);
            $sql = "UPDATE to_opettaja SET salasana='$new_password' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            echo "Salasanasi on vaihdettu. <a href=\"../etusivu.php\">Takaisin</a>";
            //header('location: ../index.php');
            
            
        }
    }
    else{
        echo "Molemmat salasanat tarvitaan.";
    }
}
mysqli_close($db);
?>
<div class="col-sm-10 col-xs-10 text-left">
	<form class=\"login-form\" action=new_password.php method='post'>
		<h2 class="form-title">Uusi salasana</h2>
		<!-- form validation messages -->
		<?php include('messages.php'); ?>
		<div class="form-group">
			<label>Uusi salasana</label>
			<input type="password" name="new_password">
		</div>
		<div class="form-group">
			<label>Vahvista uusi salasana</label>
			<input type="password" name="new_password_c">
		</div>
		<div class="form-group">
		    <input type="hidden" name ="token" value="<?php echo $token; ?>"/>
			<input type="submit" name="new_password_submit" class="login-btn" />
		</div>
	</form>
	</div>
</div>
</div>
</body>
</html>
