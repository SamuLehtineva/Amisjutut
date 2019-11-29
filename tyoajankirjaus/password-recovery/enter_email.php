<?php include('app_logic.php'); ?>
<!DOCTYPE html>
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
<div class="col-sm-10 col-xs-10 text-left">
	<form class="login-form" action="enter_email.php" method="post">
		<h2 class="form-title">Vaihda salasana</h2>
		<!-- form validation messages -->
		<?php include('messages.php'); ?>
		<div class="form-group">
			<label>Sähköposti</label>
			<input type="email" name="email">
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Lähetä</button>
		</div>
	</form>
	</div>
</div>
</div>
</body>
</html>