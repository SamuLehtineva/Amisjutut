<?php
session_start();
/*
This page is the main index document. If there is a new component to the site, it needs to be added to the $sallitut array.
Hours spent fixing this: 1
*/


if (isset($_GET["sivu"]))
		$sivu = $_GET["sivu"];
else{
	$sivu = "front";
}
$sallitut = array("front","404","frontpage","login","order","register","form","user_list","hyvaksy","prototype","hylkaa","reset","checkregister","formtest","thanks","dragula");

require "./sup/start.php";
if(in_array($sivu,$sallitut)) {
    
	$polku = "./main/".$sivu.".php";
	require $polku;
}

else {
    $polku = "./main/404.php";
    require $polku;
}
require "./sup/end.php";