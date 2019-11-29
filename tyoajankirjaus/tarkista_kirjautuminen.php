<?php
session_start();//aloittaa istunnon
require "../tavara/tkfunktiot.php";
require "../tavara/funktiot.php";
if(!empty($_POST["email"]) && !empty($_POST["salasana"])) {
    $email = $_POST["email"];
    $salasana = $_POST["salasana"];
    $email = putsaa($email);
    $salasana=muunna_salasana($salasana);
    $_SESSION["email"] = $email;
    require "./tavara/yhteys.php";
    $id = hae_id_kannasta($email,$salasana);
    $month = date('m');
    switch($month){
        case "1":
            $month = "Tammikuu";
            break;
        case "2":
            $month = "Helmikuu";
            break;
        case "3":
            $month = "Maaliskuu";
            break;
        case "4":
            $month = "Huhtikuu";
            break;
        case "5":
            $month = "Toukokuu";
            break;
        case "6":
            $month = "Kesäkuu";
            break;
        case "7":
            $month = "Heinäkuu";
            break;
        case "8":
            $month = "Elokuu";
            break;
        case "9":
            $month = "Syyskuu";
            break;
        case "10":
            $month = "Lokakuu";
            break;
        case "11":
            $month = "Marraskuu";
            break;
        case "12":
            $month = "Joulukuu";
            break;
    }
    if(!empty($id)) {
        $_SESSION["oID"] = $id;
        $_SESSION["istuntoid"] = session_id();
        $_SESSION["salasana"]=$salasana;
        $_SESSION["month"]=$month;
        header("Pragma: No-Cache");
        header("Location: etusivu.php?month=$month");
		/*$cookie_name = "tarkistus";
		$cookie_value = "kirjauduttu";
		setrawcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");*/
        die();
    }
    else{
        session_start();
        $_SESSION["email"];
        header("Location:./kirjaudu.php?vaarin=true");
    }
}
else header("Location:./kirjaudu.php?puuttuu=true");
