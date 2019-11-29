<?php 
session_start();
$errors = [];
$user_id = "";
require "tkfunktiot.php";
// connect to database
$db = mysqli_connect('truudeli7.net', 'truud286', 'nx[h2_SCqZy6', 'truud286_tyoajankirjaus');
// LOG USER IN
if (isset($_POST['login_user'])) {
  // Get username and password from login form
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_id = htmlentities($user_id);
    $user_id = htmlspecialchars($user_id);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  // validate form
  if (empty($user_id)) array_push($errors, /*"Username or Email is required"*/"Sähköposti on pakollinen");
  if (empty($password)) array_push($errors, "Salasana on pakollinen");

  // if no error in form, log user in
  if (count($errors) == 0) {
    $password.="puppu";
    $password = md5($password);
    //$sql = "SELECT oID AS id, nimi AS username, email AS email, salasana AS password FROM to_opettaja WHERE nimi='$user_id' AND salasana='$password' OR email='$user_id' AND salasana='$password'";
    $sql = "SELECT oID AS id, nimi AS username, email AS email, salasana AS password FROM to_opettaja WHERE email='$user_id' AND salasana='$password'";
    $results = mysqli_query($db, $sql);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $user_id;
      $_SESSION['success'] = "Olet kirjautunut sisään";
      $email = $user_id;
      $salasana = $password;
      $id = hae_id_kannasta($email,$salasana);
      $_SESSION["oID"]  = $id;
      header('location: ../redirect.php');
    }else {
      array_push($errors, "Tietoja väärin");
    }
  }
}

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $email = htmlentities($email);
    $email = htmlspecialchars($email);
    // ensure that the user exists on our system
    $query = "SELECT email FROM to_opettaja WHERE email='$email'";
    $results = mysqli_query($db, $query);

    if (empty($email)) {
        array_push($errors, "Sähköpostisi tarvitaan");
    }else if(mysqli_num_rows($results) <= 0) {
        array_push($errors, "Tuolla sähköpostilla ei ole käyttäjää");
    }
    // generate a unique random token of length 100
    $token = bin2hex(openssl_random_pseudo_bytes(50));
    
    if (count($errors) == 0) {
      // store token in the password-reset database table against the user's email
      $sql = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
      $results = mysqli_query($db, $sql);
    
      // Send email to user with the token in a link they can click on
      $to = $email;
      $subject = "Vaihda salasanasi tyoajankirjaus-sivustolla";
      $msg = "Paina tästä http://truudeli7.net/tyoajankirjaus/password-recovery/new_password.php?token=".$token."&email=".$email." vaihtaaksesi salasanasi";
        $msg = wordwrap($msg,70);
        $headers = "From: info@truudeli7.net";
        mail($to, $subject, $msg, $headers);
        header('location: pending.php?email=' . $email);
      }
    }
    
    /*// ENTER A NEW PASSWORD
    if (isset($_POST['new_password'])) {
      $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
      $new_password_c = mysqli_real_escape_string($db, $_POST['new_password_c']);
    
      // Grab to token that came from the email link
      $token = $_SESSION['token'];
      if (empty($new_password) && empty($new_password_c)) array_push($errors, "Molemmat salasanat ovat pakolliset");
      if ($new_password !== $new_password_c) array_push($errors, "Salasanoissa on eroa");
      if (count($errors) == 0) {
        // select email address of user from the password_reset table 
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];
    
        if (isset($email)) {
          $new_password = md5($new_password);
          $sql = "UPDATE to_opettaja SET salasana='$new_password' WHERE email='$email'";
          $results = mysqli_query($db, $sql);
          echo "Salasana vaihdettu";
          //header('location: ../index.php');
        
      }
      }
}*/
?>